const signUpBtn = document.querySelector("[data-sign-up]");
const signInBtn = document.querySelector("[data-sign-In]");
const signInCon = document.querySelector("[data-sign-article]");
//const signUpCon = document.querySelector("[data-sign-up-article]");
const signUpCard = document.querySelector("[data-sign-in-card]");
const signInCard = document.querySelector("[data-sign-up-card]");

const blackBg = document.querySelector("[data-black-bg]");

signInBtn.addEventListener("click", () => {
  let showSignInPage = new ChangeDisplay();
  showSignInPage.showSignPage(signInBtn);
});
blackBg.addEventListener("click", () => {
  let showSignInPage = new ChangeDisplay();
  showSignInPage.showSignPage(signInBtn);
});

class ChangeDisplay {
  showSignPage(card) {
    signInCon.classList.toggle("hidden");
    blackBg.classList.toggle("hidden");
    setTimeout(() => {
      signInCon.classList.toggle("opacity-0");
      blackBg.classList.toggle("opacity-0");
    }, 100);
  }
}
