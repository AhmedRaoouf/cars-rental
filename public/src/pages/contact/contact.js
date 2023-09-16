let menuButton = document.querySelector("[data-menu-button]");
let menu = document.querySelector("[data-menu]");

menuButton.addEventListener("click", () => {
  ChangeDisplay.toggleMenu();
  ChangeDisplay.animateMenuButton();
});

class ChangeDisplay {
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
    menuButton.classList.toggle("child:bg-main-dark");
    menuButton.classList.toggle("child:bg-white");

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
