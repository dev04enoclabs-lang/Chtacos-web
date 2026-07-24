const CACHE_NAME = 'chtacos-v1';

const STATIC_ASSETS = [
    '/',
    '/menu',
    '/orders',
    '/offline.html',
    
    // Archivos CSS
    '/assets/css/menu.css',
    '/assets/css/cart.css',
    '/assets/css/orders.css',
    
    // Archivos JS
    '/assets/js/menu.js',
    '/assets/js/cart.js',
    '/assets/js/orders.js',
    '/assets/js/offline-menager.js', // Con tu nombre exacto de archivo
    '/assets/js/tailwind-config.js',
    
    // Imágenes y recursos
    '/assets/img/loading.jpg',
    '/favicon.ico'
];

// 1. Instalación: Guarda todos tus CSS, JS y Vistas en caché
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(STATIC_ASSETS).catch((err) => {
                console.warn('Algunos recursos no se pudieron almacenar en caché al inicio:', err);
                return cache.add('/offline.html');
            });
        })
    );
    self.skipWaiting();
});

// 2. Activación: Limpia versiones viejas del caché
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.filter((key) => key !== CACHE_NAME).map((key) => caches.delete(key))
            );
        })
    );
    self.clients.claim();
});

// 3. Intercepción de Peticiones
self.addEventListener('fetch', (event) => {
    // Solo interceptamos peticiones GET (no peticiones POST de compras)
    if (event.request.method !== 'GET') return;

    event.respondWith(
        fetch(event.request)
            .then((networkResponse) => {
                // Si hay internet, actualizamos el archivo en caché en segundo plano
                if (networkResponse && networkResponse.status === 200) {
                    const responseClone = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, responseClone);
                    });
                }
                return networkResponse;
            })
            .catch(async () => {
                // SI NO HAY RED O FORZAS CON CTRL + F5 SIN INTERNET:
                
                // A) Si el archivo estático (CSS/JS/Img) está en caché, lo entrega
                const cachedResponse = await caches.match(event.request);
                if (cachedResponse) {
                    return cachedResponse;
                }

                // B) Si intenta recargar una página HTML (/menu, /orders) y no hay red:
                if (event.request.headers.get('accept')?.includes('text/html')) {
                    const cachedPage = await caches.match(event.request);
                    return cachedPage || caches.match('/offline.html');
                }
            })
    );
});