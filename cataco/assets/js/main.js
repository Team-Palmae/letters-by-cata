// Hamburger Menu
const openNav = document.querySelector('.toggle-icon-open');
const closeNav = document.querySelector('.toggle-icon-close');

openNav.addEventListener('click', () => {
    document.querySelector('nav').classList.toggle('show-nav');
});

closeNav.addEventListener('click', () => {
    document.querySelector('nav').classList.toggle('show-nav');
});

// Mailing List Popup
window.onload = function () {
    var signup = document.getElementById("signup");
}

signup.addEventListener("click", function(evt){
    javascript:showPopupSmart11420(true);
    evt.preventDefault();
});

//Contact Page Other popup
const other = document.querySelector('span.wpcf7-form-control-wrap.your-subject');
other.classList.add("hidden");

document.querySelector('.wpcf7-list-item.last').addEventListener("click", function(){
	if(other.classList.contains("hidden")){
		other.classList.remove("hidden");
	}else{
		other.classList.add("hidden");
	}
});