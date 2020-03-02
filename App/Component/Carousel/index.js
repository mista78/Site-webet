

const createDiv = n => document.createElement(n);
const container = document.querySelectorAll(".slideshow-container");
container.forEach(item => {
  var slideIndex = 1;
  const numSlide = createDiv("div");
  const prev = createDiv("a");
  const next = createDiv("a");
  prev.classList.add("prev");
  next.classList.add("next");
  prev.innerHTML = "&#10094;";
  next.innerHTML = "&#10095;";
  numSlide.classList.add("numbertext");
  item.appendChild(prev); 
  item.appendChild(next); 
  item.appendChild(numSlide); 
  const showSlides = n => {
    var i;
    const slides = item.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    numSlide.innerHTML = slideIndex + " / " + slides.length;
    slides[slideIndex-1].style.display = "block"; 
  }
  const plusSlides = n => showSlides(slideIndex += n);
  const currentSlide = n => showSlides(slideIndex = n);
  prev.addEventListener('click', () => plusSlides(-1));
  next.addEventListener('click', () => plusSlides(1));
  showSlides(slideIndex);
});