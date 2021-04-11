var modal = document.getElementsByClassName("modal--part");
var images = document.getElementsByClassName("lesson--image");
var span = document.getElementsByClassName("close--button");


span[0].onclick = function() {
    modal[0].style.display = "none";
}
span[1].onclick = function() {
    modal[1].style.display = "none";
}
images[0].onclick = function() {
    modal[0].style.display = "block";
    span[0].style.display = "block";
};
images[1].onclick = function() {
    modal[1].style.display = "block";
    span[1].style.display = "block";
};

document.addEventListener("keyup", function() {
    for (var i = 0; i < modal.length; i++) {
        modal[i].style.display = "none";
    }
})