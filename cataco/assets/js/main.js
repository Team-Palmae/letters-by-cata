const openNav = document.querySelector(".toggle-icon-open"),
    closeNav = document.querySelector(".toggle-icon-close");
openNav.addEventListener("click", () => {
    document.querySelector("nav").classList.toggle("show-nav");
}),
    closeNav.addEventListener("click", () => {
        document.querySelector("nav").classList.toggle("show-nav");
    });
const filterToggle = document.querySelector(".filter-toggle"),
    filtersContainer = document.querySelector(".filters"),
    horSpan = document.querySelector(".horizontal-filter"),
    vertSpan = document.querySelector(".vertical-filter");
filterToggle.addEventListener("click", () => {
    horSpan.classList.toggle("open"), vertSpan.classList.toggle("open"), filtersContainer.classList.toggle("showfilters");
}),
    (window.onload = function () {
        document.getElementById("signup");
    }),
    signup.addEventListener("click", function (e) {
        showPopupSmart11420(!0), e.preventDefault();
    });

// const other = document.querySelector("span.wpcf7-form-control-wrap.your-subject");
const other = document.querySelector(".other-input");

function otherChecked() {
    if (document.querySelector("input[value=Other]").checked) {
        other.classList.add('selected');
        console.log("Hello");
    } else {
        other.classList.remove('selected');
    }
}