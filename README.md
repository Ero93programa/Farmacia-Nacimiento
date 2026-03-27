🏥 Farmacia Nacimiento - Sitio Web Profesional

Sitio web completo en producción para farmacia con sistema automático de consulta de farmacias de guardia del COF Almería.


📝 Sobre el proyecto
Farmacia Nacimiento es un proyecto real desarrollado para una farmacia en Nacimiento, Almería. El sitio web está actualmente en producción y proporciona información sobre servicios, horarios, ubicación y un sistema automático de consulta de farmacias de guardia.

🎯 Problema resuelto
Los pacientes necesitaban saber qué farmacia estaba de guardia sin tener que consultar manualmente cada día la web del Colegio Oficial de Farmacéuticos. El cliente requería una solución automatizada que se actualizara sin intervención manual.

💡 Solución implementada
Sistema de web scraping que consulta automáticamente el COF Almería cada 24 horas, extrae la información de farmacias de guardia de la comarca, y la muestra en un formato limpio y accesible con caché inteligente para optimizar el rendimiento.

✨ Características principales

✅ Consulta automática de farmacias de guardia desde el COF Almería
✅ Sistema de caché inteligente (actualización cada 24h)
✅ Diseño responsive adaptado a móviles, tablets y desktop
✅ Grid de servicios con iconos personalizados
✅ Formulario de contacto con validación JavaScript y backend
✅ Integración con redes sociales (Facebook, Instagram, WhatsApp)
✅ Mapa interactivo con Google Maps
✅ Fondo parallax con efectos visuales
✅ Menú hamburguesa responsive para móviles


🛠️ Stack tecnológico

Frontend

HTML5 - Estructura semántica
CSS3 - Grid, Flexbox, animaciones, parallax
JavaScript (Vanilla) - Validación de formularios, interactividad

Backend

PHP 8.x - Lógica de servidor
cURL - Peticiones HTTP
DOMDocument/XPath - Parsing de HTML
Web Scraping - Extracción de datos del COF

APIs y Servicios

Google Maps API - Mapa interactivo
Formspree - Gestión de formulario de contacto
COF Almería - Fuente de datos de farmacias de guardia


📂 Estructura del proyecto
web_farmacia/
├── index.php                  # Página principal
├── styles.css                 # Estilos personalizados
├── scripts.js                 # JavaScript de validación e interactividad
├── .gitignore                 # Archivos excluidos de Git
├── README.md                  # Este archivo
├── img/                       # Recursos gráficos
│   ├── logo_farma.png        # Logo de la farmacia
│   ├── interior.jpg          # Foto del interior
│   ├── panoramica1.png       # Imagen de fondo parallax
│   ├── fondo.jpg             # Fondo sección servicios
│   ├── fondo2.jpg            # Fondo sección guardias
│   ├── mapa.png              # Imagen indicaciones
│   └── *-icon.png            # Iconos de servicios
└── includes/
    ├── farmacia-guardia.php  # Script de consulta COF
    ├── cacert.pem            # Certificado SSL (no incluido en Git)
    └── guardia_datos.json    # Caché de datos (generado automáticamente)

🚀 Instalación y configuración
Requisitos previos

PHP 8.0 o superior
Extensiones PHP: curl, dom, libxml
Servidor web (Apache/Nginx) o XAMPP/WAMP para desarrollo

Pasos de instalación

Clonar el repositorio

bash   git clone https://github.com/tu-usuario/farmacia-web.git
   cd farmacia-web

Descargar certificado SSL
Descarga cacert.pem desde curl.se/docs/caextract.html y colócalo en la carpeta /includes/
Configurar servidor web
Configura el document root hacia la carpeta del proyecto
Configurar permisos

bash   chmod 755 includes/
   chmod 644 includes/farmacia-guardia.php

Personalizar datos
Edita index.php para cambiar:

Información de contacto (teléfonos, dirección)
Enlaces de redes sociales
URL de Google Maps
Endpoint de Formspree
Horarios de apertura


Configurar Formspree

Crea cuenta en formspree.io
Crea un nuevo formulario
Reemplaza el action del formulario en index.php con tu endpoint


🔧 Características técnicas destacadas
Web Scraping de formularios ASP.NET
El mayor desafío técnico fue realizar scraping de la web del COF Almería, que usa formularios ASP.NET con:

VIEWSTATE dinámico - Estado del formulario que cambia en cada petición
EVENTVALIDATION - Token de validación de eventos
Gestión de cookies - Necesaria para mantener la sesión

Solución implementada:

GET inicial para obtener VIEWSTATE y cookies
Parsing del HTML con DOMDocument/XPath
POST con todos los campos del formulario (incluyendo campos ocultos)
Extracción de resultados y estructuración de datos

Sistema de caché JSON
Para optimizar el rendimiento y reducir la carga al servidor del COF:

Cache de datos (no HTML) en formato JSON
TTL de 24 horas (configurable)
Generación de HTML fresco en cada carga desde los datos en caché
Actualización automática tras expiración

Validación de formularios
Doble capa de validación:

Cliente (JavaScript): Validación en tiempo real mientras el usuario escribe
Servidor (PHP): Sanitización con htmlspecialchars() para prevenir XSS
Honeypot: Campo oculto para detectar bots
Rate limiting: Prevención de spam con Formspree


📱 Responsive Design
El sitio está optimizado para todos los dispositivos:

Desktop (>1024px): Layout completo con 3 columnas en servicios
Tablet (768-1024px): 2 columnas en servicios
Móvil (<768px): 1 columna, menú hamburguesa, elementos apilados

Técnicas utilizadas:

CSS Grid con auto-fit para servicios
Flexbox para layouts flexibles
Media queries para breakpoints
background-attachment: fixed para efecto parallax


🔒 Seguridad implementada

✅ Sanitización de inputs con htmlspecialchars()
✅ Validación de datos en cliente y servidor
✅ Honeypot anti-spam en formularios
✅ Exclusión de archivos sensibles en .gitignore
✅ Rate limiting via Formspree
✅ Verificación SSL con cacert.pem


🎨 Diseño y UX
Paleta de colores

Verde principal: #1b5e20 (farmacia/salud)
Verde acento: #4caf50 (botones, bordes)
Blanco/gris claro: Fondos y textos

Efectos visuales

Parallax en imagen de fondo
Secciones semi-transparentes con backdrop-filter: blur()
Animaciones hover en tarjetas
Transiciones suaves en navegación
Menú hamburguesa con animación


📊 Mejoras futuras
Ideas para próximas iteraciones:

 Panel de administración para editar contenido
 Sistema de citas online
 Chat en vivo con WhatsApp Business API
 Blog de consejos de salud
 Integración con sistema de inventario
 PWA (Progressive Web App) para instalación en móviles


🤝 Contribuciones
Este es un proyecto en producción para un cliente real. Si encuentras bugs o tienes sugerencias de mejora, siéntete libre de:

Abrir un Issue
Proponer mejoras mediante Pull Request
Contactarme directamente

📄 Licencia
Este código está disponible bajo licencia MIT para fines educativos y de portfolio. El diseño y contenido visual son propiedad de La Farmacia de Elena.

👨‍💻 Desarrollador
Eric Robles

💼 LinkedIn: https://www.linkedin.com/in/eric-robles-ortu%C3%B1o-042923120/
🐙 GitHub: https://github.com/Ero93programa
📧 Email: eric_ps2@hotmail.com


🙏 Agradecimientos

La Farmacia de Nacimiento - Por confiar en este proyecto
COF Almería - Por proporcionar los datos de farmacias de guardia
Formspree - Gestión de formularios
Bootstrap - Framework CSS
