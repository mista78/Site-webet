
const container = __(".slideshow-container");
container.forEach(item => {
  var slideIndex = 1;
  const numSlide = createDiv("div");
  const containerDot = createDiv("div");
  const prev = createDiv("a");
  const next = createDiv("a");
  const slides =  elSelectAll(item, ".mySlides");
  containerDot.classList.add("dotContainer");
  prev.classList.add("prev");
  next.classList.add("next");
  prev.innerHTML = "&#10094;";
  next.innerHTML = "&#10095;";
  numSlide.classList.add("numbertext");
  console.log(Array.from(slides))
  Array.from(slides).forEach((el,i) => {
    const dot = createDiv("div");
    dot.classList.add("dot");
    dot.style.right = (20 * i) + "px";
    containerDot.appendChild(dot);
    item.appendChild(containerDot);
  })
  item.appendChild(prev); 
  item.appendChild(next); 
  item.appendChild(numSlide); 
  const dots = elSelectAll(item, ".dot");
  const showSlides = n => {
    var i;
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    numSlide.innerHTML = slideIndex + " / " + slides.length;
    slides[slideIndex-1].style.display = "block";
    dots.forEach(t => t.classList.remove("active"));
    dots[slideIndex-1].className += " active"; 
  }
  const plusSlides = n => showSlides(slideIndex += n);
  const currentSlide = n => showSlides(slideIndex = n);
  prev.addEventListener('click', () => plusSlides(-1));
  next.addEventListener('click', () => plusSlides(1));
  setInterval(() => plusSlides(1), 3000);
  dots.forEach((n,i) => n.addEventListener('click', () => currentSlide(i+1)));
  showSlides(slideIndex);
});