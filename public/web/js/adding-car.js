const nextBtn = document.querySelector("[data-next-btn]");
const steps = document.querySelectorAll("[data-step]");

const priceRange3 = document.querySelector("[data-range3]");
const priceValue3 = document.querySelector("[data-value3]");

const form = document.querySelectorAll("[data-form-container]>div");
const mobileHeadLines = document.querySelectorAll(
  "[data-mobile-headlines]>div"
);

const recommendedPrice = document.querySelector("[data-recommended-price]");

priceValue3.innerHTML = priceRange3.value;
priceRange3.oninput = function () {
  priceValue3.innerHTML = this.value;
  recommendedPrice.innerHTML = (this.value * 1) / 400;
};

let stepNumber = 1;
nextBtn.addEventListener("click", () => {
  if (stepNumber < form.length) {
    ++stepNumber;
    form[stepNumber - 2].classList.toggle("hidden");
    form[stepNumber - 1].classList.toggle("hidden");

    mobileHeadLines[stepNumber - 2].classList.toggle("hidden");
    mobileHeadLines[stepNumber - 1].classList.toggle("hidden");

    steps[stepNumber - 2].classList.toggle("bg-main-red");
    steps[stepNumber - 2].classList.toggle("md:bg-gray-100");
    steps[stepNumber - 2].classList.toggle("text-white");
    steps[stepNumber - 2].classList.toggle("bg-white");

    steps[stepNumber - 1].classList.toggle("bg-main-red");
    steps[stepNumber - 1].classList.toggle("md:bg-gray-100");
    steps[stepNumber - 1].classList.toggle("text-white");
    steps[stepNumber - 1].classList.toggle("bg-white");

    stepNumber === form.length && (nextBtn.innerHTML = "Finish");
  } else {
    window.location.replace("storePageUrl");
  }
});

// ـــــــــــــــــــــــــــــــــــــــــ

var map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 27.837684, lng: 35.591004 }, // set the map's initial center
    zoom: 6, // set the map's initial zoom level
  });
}

function confirmLocation() {
  var location = map.getCenter(); // get the map's center as the selected location
  console.log(location.lat(), location.lng()); // log the latitude and longitude to the console
}
