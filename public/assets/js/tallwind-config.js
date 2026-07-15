tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      "colors": {
        // Identidad Principal y Acentos (Rojos y Cafés)
        "primary": "#b7102a",
        "primary-container": "#db313f",
        "primary-fixed": "#ffdad8",
        "primary-fixed-dim": "#ffb3b1",
        "inverse-primary": "#ffb3b1",
        "surface-tint": "#bb152c",
        
        "secondary": "#8e4e14",
        "secondary-container": "#ffab69",
        "secondary-fixed": "#ffdcc4",
        "secondary-fixed-dim": "#ffb780",
        
        // Tonos Terciarios (Verdes para estados como "Servido" o éxito)
        "tertiary": "#00685d",
        "tertiary-container": "#008376",
        "tertiary-fixed": "#8cf5e4",
        "tertiary-fixed-dim": "#6fd8c8",

        // Fondos y Contenedores Base (Estilo claro/cálido "Sabor y Brasa")
        "background": "#faf9f5",
        "surface": "#faf9f5",
        "surface-bright": "#faf9f5",
        "surface-dim": "#dbdad6",
        "surface-variant": "#e3e2df",
        
        // Capas y jerarquías de contenedores (Tarjetas de pedidos, filas del carrito)
        "surface-container-lowest": "#ffffff",
        "surface-container-low": "#f4f4f0",
        "surface-container": "#efeeea",
        "surface-container-high": "#e9e8e4",
        "surface-container-highest": "#e3e2df",
        
        // Elementos Inversos (Para componentes en modo oscuro o contrastes fuertes)
        "inverse-surface": "#2f312e",
        "inverse-on-surface": "#f2f1ed",

        // Colores de contraste para Textos (On-...)
        "on-background": "#1b1c1a",
        "on-surface": "#1b1c1a",
        "on-surface-variant": "#5b403f",
        "on-primary": "#ffffff",
        "on-primary-container": "#fffbff",
        "on-primary-fixed": "#410007",
        "on-primary-fixed-variant": "#92001c",
        "on-secondary": "#ffffff",
        "on-secondary-container": "#783d01",
        "on-secondary-fixed": "#2f1400",
        "on-secondary-fixed-variant": "#6f3800",
        "on-tertiary": "#ffffff",
        "on-tertiary-container": "#f4fffb",
        "on-tertiary-fixed": "#00201c",
        "on-tertiary-fixed-variant": "#005048",

        // Bordes y Líneas divisorias
        "outline": "#8f6f6e",
        "outline-variant": "#e4bebc",

        // Estados de Alerta o Errores (Botones de eliminar en Carrito/Pedidos)
        "error": "#ba1a1a",
        "error-container": "#ffdad6",
        "on-error": "#ffffff",
        "on-error-container": "#93000a"
      },
      "borderRadius": {
        "DEFAULT": "0.25rem",
        "sm": "0.375rem",
        "md": "0.5rem",      // Ideal para botones pequeños
        "lg": "0.5rem",      // Mantenido por compatibilidad
        "xl": "0.75rem",     // Usado en tarjetas de productos y platos
        "2xl": "1rem",       // Para modales y hojas inferiores
        "full": "9999px"     // Para botones circulares y avatares
      },
      "spacing": {
        "xs": "4px",
        "base": "8px",
        "sm": "12px",
        "gutter": "16px",
        "md": "24px",
        "lg": "48px",
        "margin-mobile": "16px",  // Margen lateral en teléfonos
        "margin-desktop": "64px"  // Margen lateral en pantallas grandes
      },
      "fontFamily": {
        "headline-xl": ["Plus Jakarta Sans"],
        "headline-lg": ["Plus Jakarta Sans"],
        "headline-md": ["Plus Jakarta Sans"],
        "body-lg": ["Plus Jakarta Sans"],
        "body-md": ["Plus Jakarta Sans"],
        "price-display": ["Plus Jakarta Sans"],
        "label-lg": ["Plus Jakarta Sans"]
      },
      "fontSize": {
        // Títulos principales de las pantallas
        "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
        "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "700"}],
        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
        
        // Textos informativos y descripciones
        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
        
        // Precios y etiquetas de botones
        "price-display": ["20px", {"lineHeight": "24px", "fontWeight": "700"}],
        "label-lg": ["14px", {"lineHeight": "20px", "fontWeight": "600"}]
      }
    },
  },
}