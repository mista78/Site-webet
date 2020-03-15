const container = __(".slideshow-container");
container.forEach(item => {
  var slideIndex = 1;
  const numSlide = createDiv("div");
  const containerDot = createDiv("div");
  const prev = createDiv("a");
  const next = createDiv("a");
  const slides = elSelectAll(item, ".mySlides");
  let pageWidth = window.innerWidth || document.body.clientWidth;
  let treshold = Math.max(1, Math.floor(0.01 * (pageWidth)));
  let touchstartX = 0;
  let touchstartY = 0;
  let touchendX = 0;
  let touchendY = 0;
  const limit = Math.tan(45 * 1.5 / 180 * Math.PI);
  slides.forEach(item => {

    item.addEventListener('mouseover', e => {
      slides.forEach(elem => elem.removeAttribute('draggable'));
      item.setAttribute('draggable', 'true');
    });

    item.addEventListener("dragstart", e => {
      touchstartX = e.screenX;
      touchstartY = e.screenY;

    }, false);

    item.addEventListener("dragend", e => {
      touchendX = e.screenX;
      touchendY = e.screenY;
      handleGesture(event);
    }, false);

    item.addEventListener("touchstart", e => {
      touchstartX = e.changedTouches[0].screenX;
      touchstartY = e.changedTouches[0].screenY;
    }, false);

    item.addEventListener("touchend", e => {
      touchendX = e.changedTouches[0].screenX;
      touchendY = e.changedTouches[0].screenY;
      handleGesture(event);
    }, false);

  });

  function handleGesture(e) {
    let x = touchendX - touchstartX;
    let y = touchendY - touchstartY;
    let xy = Math.abs(x / y);
    let yx = Math.abs(y / x);
    if (Math.abs(x) > treshold || Math.abs(y) > treshold) {
      if (yx <= limit) {
        if (x < 0) {
          plusSlides(1);
        } else {
          plusSlides(-1);
        }
      }
    }
  };

  containerDot.classList.add("dotContainer");
  prev.classList.add("prev");
  next.classList.add("next");
  prev.innerHTML = "&#10094;";
  next.innerHTML = "&#10095;";
  numSlide.classList.add("numbertext");
  console.log(Array.from(slides))
  Array.from(slides).forEach((el, i) => {
    const dot = createDiv("div");
    dot.classList.add("dot");
    dot.style.right = (20 * i) + "px";
    containerDot.appendChild(dot);
    item.appendChild(containerDot);
  });
  item.appendChild(prev);
  item.appendChild(next);
  item.appendChild(numSlide);
  const dots = elSelectAll(item, ".dot");
  const showSlides = n => {
    var i;
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    numSlide.innerHTML = slideIndex + " / " + slides.length;
    slides[slideIndex - 1].style.display = "block";
    dots.forEach(t => t.classList.remove("active"));
    dots[slideIndex - 1].className += " active";
  }
  const plusSlides = n => showSlides(slideIndex += n);
  const currentSlide = n => showSlides(slideIndex = n);
  prev.addEventListener('click', () => plusSlides(-1));
  next.addEventListener('click', () => plusSlides(1));
  // setInterval(() => plusSlides(1), 3000);
  dots.forEach((n, i) => n.addEventListener('click', () => currentSlide(i + 1)));
  showSlides(slideIndex);
});