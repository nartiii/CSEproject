const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");
const prevBtn = document.querySelector(".slider-btn.prev");
const nextBtn = document.querySelector(".slider-btn.next");

let currentSlide = 0;


function showSlide(index) {
  if (index < 0) {
    index = slides.length - 1;
  }
  if (index >= slides.length) {
    index = 0;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active");
    dots[i].classList.remove("active");
  }

  slides[index].classList.add("active");
  dots[index].classList.add("active");

  currentSlide = index;
}

prevBtn.addEventListener("click", function () {
  showSlide(currentSlide - 1);
});

nextBtn.addEventListener("click", function () {
  showSlide(currentSlide + 1);
});

for (let i = 0; i < dots.length; i++) {
  dots[i].addEventListener("click", function () {
    showSlide(i);
  });
}
