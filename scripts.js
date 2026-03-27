
    document.addEventListener("DOMContentLoaded", () => {
      const navLinks = document.querySelector(".nav-links");
      const hamburger = document.querySelector(".hamburger");
      const links = document.querySelectorAll(".nav-links a");
      const sections = document.querySelectorAll("section");

      //  Abrir/cerrar menú hamburguesa
      hamburger.addEventListener("click", () => {
        navLinks.classList.toggle("active");
        hamburger.classList.toggle("active"); 
      });

      //  Cerrar menú al hacer clic en un enlace
      links.forEach(link => {
        link.addEventListener("click", () => {
          navLinks.classList.remove("active");
          hamburger.classList.remove("active"); // Cerrar en x
        });
      });

      // Resaltar enlace activo al hacer scroll
      window.addEventListener("scroll", () => {
        let current = "";

        sections.forEach(section => {
          const sectionTop = section.offsetTop - 80; // margen superior
          if (pageYOffset >= sectionTop) {
            current = section.getAttribute("id");
          }
        });

        links.forEach(link => {
          link.classList.remove("active");
          if (link.getAttribute("href") === `#${current}`) {
            link.classList.add("active");
          }
        });
      });
    });

//Formulario

// Formulario contacto con validación JS + envío normal a Formspree
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form_contacto");
  const btnEnviar = document.getElementById("btn-enviar");
  const mensajeExito = document.getElementById("mensaje-exito");
  const mensajeError = document.getElementById("mensaje-error");

  const campos = {
    nombre: {
      input: document.getElementById("nombre"),
      error: document.getElementById("error-nombre"),
      validar: v => {
        if (v.length < 2) return "El nombre debe tener al menos 2 caracteres";
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(v)) return "Solo letras";
        return null;
      }
    },
    email: {
      input: document.getElementById("email"),
      error: document.getElementById("error-email"),
      validar: v =>
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)
          ? null
          : "Email no válido"
    },
    mensaje: {
      input: document.getElementById("mensaje"),
      error: document.getElementById("error-mensaje"),
      validar: v =>
        v.length < 10
          ? "El mensaje debe tener al menos 10 caracteres"
          : null
    }
  };

  // Validación en tiempo real
  Object.values(campos).forEach(campo => {
    campo.input.addEventListener("input", () => {
      const error = campo.validar(campo.input.value.trim());
      if (error) {
        campo.error.textContent = error;
        campo.error.style.display = "block";
        campo.input.classList.add("invalido");
      } else {
        campo.error.style.display = "none";
        campo.input.classList.remove("invalido");
      }
    });
  });

  // Validación final antes de enviar
  form.addEventListener("submit", e => {
    let hayErrores = false;

    Object.values(campos).forEach(campo => {
      const valor = campo.input.value.trim();
      const error = campo.validar(valor);
      if (error) {
        campo.error.textContent = error;
        campo.error.style.display = "block";
        campo.input.classList.add("invalido");
        hayErrores = true;
      }
    });

    if (hayErrores) {
      e.preventDefault(); // ⛔ NO enviar a Formspree
      mensajeError.style.display = "block";
      mensajeExito.style.display = "none";
      return;
    }

    // ✅ Dejar que el formulario se envíe normalmente
    btnEnviar.disabled = true;
    btnEnviar.textContent = "Enviando...";
  });
});
