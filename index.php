<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Farmacia Nacimiento</title>
  <link rel="stylesheet" href="styles.css">
  <script src="scripts.js" defer></script>
  <link rel="icon" href="./img/logo_farma.png">
  <meta name=description content="Página web para la farmacia de Nacimiento, en Almería.">
</head>
<body>
  <nav>
    <img src="./img/logo_farma.png" alt="">
    <button class="hamburger" aria-label="Abrir menú"> 
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="nav-links">
      <a href="#presentacion">Presentación</a>
      <a href="#servicios">Servicios</a>
      <a href="#camino">Camino Santiago</a>
      <a href="#horarios">Horarios</a>
      <a href="#guardias">Guardias</a>
      <a href="#ubicacion">Ubicación</a>
      <a href="#contacto">Contacto</a>
    </div>
  </nav>

  <!-- Sección Presentación -->
  <section id="presentacion">
    <h1>La Farmacia de Elena</h1>
    <img src="img/interior.webp" alt="foto interior" id="img_interior" fetchpriority="high">
  </section>

  <!-- Sección Servicios -->
  <section id="servicios">
    <h2 class="titulos">Servicios</h2>
    <div id="total-servicios">
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/medicamento-icon.png" alt="Medicamentos">
            <p>Dispensación de medicamentos</p>
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/parafarmacia-icon.png" alt="Parafarmacia">
            <p>Parafarmacia</p>             
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/dermofarmacia_icon.png" alt="Dermofarmacia">
            <p>Dermofarmacia</p>           
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/cosmetica_icon.png" alt="Cosmética">
            <p>Cosmética</p>            
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/perfume_icon.png" alt="Perfumería">
            <p>Perfumería</p>            
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/bascula_icon.png" alt="Báscula">
            <p>Pesaje</p>            
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/tensiometro-icon.png" alt="Tensiómetro">
            <p>Toma de tensión</p>            
          </div>
          <div class="servicio-card"> 
            <img class="iconos-servicios" src="img/natural-icon.png" alt="Naturales">
            <p>Productos naturales</p>            
          </div>
    </div>
  </section>

  <!-- Sección Camino -->
  <section id="camino" >
    <div>
      <img src="img/logo_mozarabe.webp" id="logo_mozarabe" alt="logo camino mozarabe">
    </div>
    <div>
      <img src="img/sello_farmacia.webp" id="sello_farmacia" alt="sello farmacia">
    </div>
    <div id="camino_content" class="farmacia-card">
      <p>Ubicada en pleno trazado del Camino Mozárabe de Santiago, nuestra farmacia se convierte en una parada imprescindible para el peregrino a su paso por Nacimiento.</p> 
      <p>En este establecimiento no sólo podrá sellar su credencial, sino también encontrar todo lo necesario para proseguir su ruta con seguridad y comodidad.</p>  
      <p> Podrá encontrar vendas, apósitos, desinfectantes, analgésicos, hasta protector solar para las largas jornadas al sol, sin olvidar agua mineral para mantenerse siempre bien hidratado.</p> 
      <p>Un punto de apoyo cercano, pensado para acompañarle en cada paso de su peregrinación. ¡Buen camino!</p>   
    </div>
    
  </section>   

  <!-- Sección Horarios -->
  <section id="horarios" >
    <h2 class="titulos">🕐 Horarios de Apertura</h2>
    <div class="farmacia-card">
      <p>Lunes a Viernes: 10:30 - 14:30 y 17.00 - 20.30<br>
        Sábados: 10:30 - 14:30<br>
        Domingos: Cerrado</p>      
    </div>

  </section>

  <!-- Sección Guardias -->
  <section id="guardias">
    <?php include __DIR__ . "/includes/farmacia-guardia.php"; ?>
    
  </section>
 
 <!-- Sección Ubicacion -->
  <section id="ubicacion">
    <h2 class="titulos">Ubicación</h2>
    <div id="contenido_ubicacion">
      <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!4v1758824186824!6m8!1m7!1sFPk6Wq4C869zyMOhuzkUGA!2m2!1d37.10650291880081!2d-2.650127682500802!3f108.72855677823443!4f-15.20540715300264!5f0.4027069308594921" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <img src="img/mapa.webp" alt="Como llegar" width="850" height="600">
    </div>      
  </section>

  <!-- Sección Contacto -->
  <section id="contacto">
    <h2 class="titulos">Contacto</h2>
    <div>
      <p>📍 Dirección: Calle Granada 12, 04540 Nacimiento, Almería<br>
        📞 Teléfono fijo: <a href="tel:+34950350537">+34 950 350 537</a><br>
        📱 Chat WhatsApp: <a href="tel:+34669691115">+34 669 691 115</a><br>
        🌐 Síguenos en <a href="https://www.facebook.com/share/15dKzfieAV/" target="_blank" style="color:#1877F2;">
      Facebook
      <svg class="icono-social" viewBox="0 0 24 24">
        <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2.2v-2.9h2.2V9.8c0-2.2 1.3-3.4 3.3-3.4.96 0 2 .17 2 .17v2.2h-1.1c-1.1 0-1.5.68-1.5 1.4v1.7h2.6l-.42 2.9h-2.2v7A10 10 0 0 0 22 12z"/>
      </svg>
    </a>, <a href="https://www.instagram.com/lafarmaciadeelena" target="_blank" style="color:#E4405F;">
      Instagram
      <svg class="icono-social" viewBox="0 0 24 24">
        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.9a1.4 1.4 0 1 1-2.8 0 1.4 1.4 0 0 1 2.8 0z"/>
      </svg>
    </a><br>
            ❗Disponemos de canal de <a href="https://whatsapp.com/channel/0029VbBj3mxCsU9Y37Xntq0t" target="_blank" style="color:#25D366;">
      WhatsApp
      <svg class="icono-social" viewBox="0 0 24 24">
        <path d="M20 4.5A11.9 11.9 0 0 0 12.1 2C5.5 2 2 6.5 2 12c0 2.1.6 4 1.6 5.7L2 22l4.5-1.5A10 10 0 0 0 12 22c6.6 0 10-4.5 10-10 0-2.8-.9-5.3-2-7.5zM12 20a8 8 0 0 1-4-1l-.3-.2-2.7.9.9-2.6-.2-.3A8 8 0 1 1 12 20zm4.2-5.5c-.2-.1-1.2-.6-1.4-.7-.2-.1-.4-.1-.6.1-.2.2-.7.7-.8.8-.1.1-.3.1-.5 0s-.9-.3-1.7-1c-.6-.5-1-1.2-1.1-1.4-.1-.2 0-.3.1-.4.1-.1.2-.3.3-.4.1-.1.2-.2.2-.4s0-.3-.1-.4c-.1-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 2s.8 2.4.9 2.6c.1.2 1.5 2.3 3.7 3.2.5.2.9.3 1.2.4.5.2 1 .2 1.3.1.4-.1 1.2-.5 1.4-1 .2-.5.2-.9.1-1-.1-.1-.3-.2-.5-.3z"/>
      </svg>
    </a> para todos nuestros anuncios y novedades. 
      </p>
       <form action="https://formspree.io/f/mjkaknan" method="POST" id="form_contacto" novalidate>
          <p> ✉️ ¿Alguna consulta?</p>

          <label>
            Nombre:
            <input type="text" id="nombre" name="nombre" required>
            <span class="error-msg" id="error-nombre"></span>
          </label>

          <label>
            Correo:
            <input type="email" id="email" name="email" required>
            <span class="error-msg" id="error-email"></span>
          </label>

          <label>
            Mensaje:
            <textarea
              id="mensaje"
              name="message"
              maxlength="1000"
              required
            ></textarea>
            <span class="error-msg" id="error-mensaje"></span>
          </label>

          <!-- Honeypot anti-spam -->
          <input type="text" name="_gotcha" style="display:none">

          <button type="submit" id="btn-enviar">Enviar</button>

          <div id="mensaje-exito" style="display:none;">
            ✅ ¡Mensaje enviado correctamente! Te responderemos pronto.
          </div>

          <div id="mensaje-error" style="display:none;">
            ❌ Hubo un error al enviar el mensaje. Por favor, intenta de nuevo.
          </div>
        </form>
    </div>
  </section>
  <footer>
    <p>&copy; 2025 Farmacia Nacimiento. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
