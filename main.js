document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".dot");
  const prev = document.querySelector(".slider-btn.prev");
  const next = document.querySelector(".slider-btn.next");

  if (slides.length > 0 && dots.length === slides.length && prev && next) {
    let index = 0;

    function show(i) {
      if (i < 0) i = slides.length - 1;
      if (i >= slides.length) i = 0;

      slides.forEach(s => s.classList.remove("active"));
      dots.forEach(d => d.classList.remove("active"));

      slides[i].classList.add("active");
      dots[i].classList.add("active");
      index = i;
    }

    prev.addEventListener("click", () => show(index - 1));
    next.addEventListener("click", () => show(index + 1));
    dots.forEach((d, i) => d.addEventListener("click", () => show(i)));
  }
});



  function isEmailValid(email) {
    return email.includes("@") && email.includes(".");
  }

  function showError(el, msg) {
    if (el) el.textContent = msg;
  }

  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      const email = document.getElementById("loginEmail");
      const pass = document.getElementById("loginPassword");
      const err = document.getElementById("loginError");

      showError(err, "");

      if (!email || !isEmailValid(email.value.trim())) {
        e.preventDefault();
        showError(err, "Enter a valid email.");
        return;
      }

      if (!pass || pass.value.trim().length < 6) {
        e.preventDefault();
        showError(err, "Password must be at least 6 characters.");
        return;
      }
    });
  }

 
  const registerForm = document.getElementById("registerForm");
  if (registerForm) {
    registerForm.addEventListener("submit", (e) => {
      const user = document.getElementById("registerUsername");
      const email = document.getElementById("registerEmail");
      const p1 = document.getElementById("registerPassword");
      const p2 = document.getElementById("registerConfirmPassword");
      const err = document.getElementById("registerError");

      showError(err, "");

      if (!user || user.value.trim().length < 3) {
        e.preventDefault();
        showError(err, "Username must be at least 3 characters.");
        return;
      }

      if (!email || !isEmailValid(email.value.trim())) {
        e.preventDefault();
        showError(err, "Enter a valid email.");
        return;
      }

      if (!p1 || p1.value.trim().length < 6) {
        e.preventDefault();
        showError(err, "Password must be at least 6 characters.");
        return;
      }

      if (!p2 || p1.value !== p2.value) {
        e.preventDefault();
        showError(err, "Passwords do not match.");
        return;
      }
    });
  }


  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
      const name = document.getElementById("contactName");
      const email = document.getElementById("contactEmail");
      const msg = document.getElementById("contactMessage");
      const err = document.getElementById("contactError");

      showError(err, "");

      if (!name || name.value.trim().length < 2) {
        e.preventDefault();
        showError(err, "Name must be at least 2 characters.");
        return;
      }

      if (!email || !isEmailValid(email.value.trim())) {
        e.preventDefault();
        showError(err, "Enter a valid email.");
        return;
      }

      if (!msg || msg.value.trim().length < 10) {
        e.preventDefault();
        showError(err, "Message must be at least 10 characters.");
        return;
      }
    });
  }


  const form = document.getElementById("contactForm");
  if (form) {
    form.addEventListener("submit", (e) => {
      const name = document.getElementById("contactName").value.trim();
      const email = document.getElementById("contactEmail").value.trim();
      const msg = document.getElementById("contactMessage").value.trim();
      const err = document.getElementById("contactError");

      let text = "";
      if (name.length < 2) text = "Name must be at least 2 characters.";
      else if (!email.includes("@")) text = "Email is not valid.";
      else if (msg.length < 10) text = "Message must be at least 10 characters.";

      if (text) {
        e.preventDefault();
        err.textContent = text;
        err.style.color = "#ff6b6b";
      } else {
        err.textContent = "";
      }
    });
  }