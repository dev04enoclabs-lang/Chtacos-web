window.OfflineManager = {
    storageKey: 'chtacos_offline_orders',

    // Guarda un pedido en localStorage
    saveOrder: function(orderData) {
        let pendingOrders = JSON.parse(localStorage.getItem(this.storageKey)) || [];
        orderData.local_timestamp = new Date().toISOString(); // Para saber cuándo se creó
        orderData.sync_status = 'pending';
        
        pendingOrders.push(orderData);
        localStorage.setItem(this.storageKey, JSON.stringify(pendingOrders));
        
        console.log("Pedido guardado localmente:", orderData);
    },

    // Obtiene los pedidos pendientes
    getPendingOrders: function() {
        return JSON.parse(localStorage.getItem(this.storageKey)) || [];
    },

    // Limpia los pedidos ya sincronizados
    clearOrders: function() {
        localStorage.removeItem(this.storageKey);
    },

    // Intenta enviar los pedidos al servidor
    syncOrders: async function() {
        const pendingOrders = this.getPendingOrders();
        
        if (pendingOrders.length === 0) return;
        if (!navigator.onLine) return; // Si sigue sin red, cancela

        try {
            const response = await fetch('/api/pedidos/sincronizar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ orders: pendingOrders })
            });

            if (response.ok) {
                this.clearOrders();
                console.log("Sincronización exitosa");
                // Opcional: disparar un evento global para que las vistas se actualicen
                window.dispatchEvent(new Event('ordersSynced'));
            }
        } catch (error) {
            console.error("Error al sincronizar con el servidor:", error);
        }
    },

    // Inicializa los "escuchadores" de red
    init: function() {
        window.addEventListener('online', () => {
            console.log("Conexión recuperada. Sincronizando...");
            this.syncOrders();
        });

        // Intentar sincronizar al cargar cualquier página (por si cerraron el navegador sin red)
        document.addEventListener('DOMContentLoaded', () => {
            this.syncOrders();
        });
    }
};

// Arrancar el manager
window.OfflineManager.init();