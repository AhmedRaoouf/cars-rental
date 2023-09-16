let slides = document.querySelectorAll("[data-slides] img");
let dots = document.querySelectorAll("[data-dots] span");
let menuButton = document.querySelector("[data-menu-button]");
let menu = document.querySelector("[data-menu]");

const leftArrow = document.querySelector("[data-prev]");
const rightArrow = document.querySelector("[data-next]");

dots.forEach((e) => {
  e.addEventListener("click", () => {
    [...dots].map((ae) => {
      if (ae === e) slideNum = [...dots].indexOf(ae);
    });
  });
});
leftArrow.addEventListener("click", () => {
  let changeSlide = new ChangeDisplay();
  changeSlide.prev();
  console.log(slideNum);
});
rightArrow.addEventListener("click", () => {
  let changeSlide = new ChangeDisplay();
  changeSlide.next();
  console.log(slideNum);
});
menuButton.addEventListener("click", () => {
  ChangeDisplay.toggleMenu();
  ChangeDisplay.animateMenuButton();
});

let slideNum = 0;

let slideshow = () => {
  slides.forEach((s) => {
    s.className = "slide opacity-0";
  });
  slides[Math.floor(slideNum)].classList.remove("opacity-0");
  dots.forEach((d) => {
    d.className = "bg-white";
  });
  dots[Math.floor(slideNum)].className = "bg-sub-amber";

  slideNum += 0.2;
  Math.floor(slideNum) === slides.length ? (slideNum = 0) : 0;

  setTimeout(slideshow, 1000);
};
slideshow();

class ChangeDisplay {
  prev() {
    Math.floor(slideNum) < 2
      ? (slideNum = slides.length - 1)
      : (slideNum -= 1.2);
  }
  next() {
    Math.floor(slideNum) === slides.length - 1
      ? (slideNum = 0)
      : (slideNum += 1);
  }
  static toggleMenu() {
    setTimeout(() => {
      menu.classList.toggle("left-full");
      menu.classList.toggle("left-0");
    }, 100);
    menu.classList.toggle("hidden");
  }
  static animateMenuButton() {
    this.disableScrolling();

    menuButton.classList.toggle("relative");

    menuButton.firstElementChild.classList.toggle("rotate-45");
    menuButton.firstElementChild.classList.toggle("absolute");
    menuButton.firstElementChild.classList.toggle("top-0");
    menuButton.firstElementChild.classList.toggle("left-0");

    menuButton.children[1].classList.toggle("opacity-0");

    menuButton.lastElementChild.classList.toggle("-rotate-45");
    menuButton.lastElementChild.classList.toggle("absolute");
    menuButton.lastElementChild.classList.toggle("top-0");
    menuButton.lastElementChild.classList.toggle("left-0");
  }
  static disableScrolling() {
    document.body.classList.toggle("m-0");
    document.body.classList.toggle("h-full");
    document.body.classList.toggle("overflow-hidden");
  }
}
