function openNavMenu() {
    var x = document.getElementById("navMenu");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}