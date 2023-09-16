const priceRange = document.getElementById("priceRange");
const priceValue = document.getElementById("priceValue");
const expandBtn = document.querySelector("[data-expand]");
const filterCon = document.querySelectorAll("[data-filter-container] > div");

priceValue.innerHTML = priceRange.value;
priceRange.oninput = function () {
  priceValue.innerHTML = this.value;
};
const priceRange2 = document.querySelector("[data-range2]");
const priceValue2 = document.querySelector("[data-value2]");
priceValue2.innerHTML = priceRange2.value;
priceRange2.oninput = function () {
  priceValue2.innerHTML = this.value;
};

expandBtn.addEventListener("click", () => {
  filterCon.forEach((e) => {
    filterCon[0] != e && e.classList.toggle("hidden");
  });
  setTimeout(
    filterCon.forEach((e) => {
      filterCon[0] != e && e.classList.toggle("opacity-100");
    }),
    100
  );
  expandBtn.classList.toggle("exp");
  expandBtn.classList.contains("exp")
    ? (expandBtn.innerText = "Collaps")
    : (expandBtn.innerText = "Expand");
});


















