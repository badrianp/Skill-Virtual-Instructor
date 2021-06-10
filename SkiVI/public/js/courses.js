function getCourseCategory(categ) {
    var category = categ;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(e) {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "not connected") {
                generateDOM(this.responseText);
                // alert(this.responseText);
            } else {
                document.location.replace("../php/Profile.php"); // Aici nu stiu la ce se refera? probabil pagina de login sau ceva?
            }
        }
    };
    xhttp.open("GET", "../php/show__courses.php?category=" + category, true);
    xhttp.send();
}

function generateDOM(JSONResponse) {

    document.getElementById("content-div").remove();

    var contentdiv = document.createElement("div");
    contentdiv.id = "content-div";
    contentdiv.className = "content-div";

    document.body.appendChild(contentdiv);
    courseDetails = JSON.parse(JSONResponse);

    var i = 0;

    while (i < courseDetails.length) {

        var courseDiv = document.createElement("div");
        courseDiv.id = courseDetails[i]["category"];
        courseDiv.className = "course-div hide";
        var courseTitle = document.createElement("h4");
        courseTitle.id = "course-title";
        courseTitle.class = "course-title";
        courseTitle.innerHTML = courseDetails[i]["title"];
        var href = document.createElement("a");
        href.href = 2 //link ul catre pagina in care se afla cursul, aici cred ca trebuie dinamic si el gen /courses?id=id_curs sau asa ceva nu?
        var courseImage = document.createElement("img");
        courseImage.id = "course-image";
        courseImage.className = "course-image";
        courseImage.src = "../images/" + courseDetails[i]["image"];
        var courseAuthor = document.createElement("h4");
        courseAuthor.id = "course-author";
        courseAuthor.className = "course-author";
        courseAuthor.innerHTML = courseDetails[i]["author"];

        href.appendChild(courseImage);

        courseDiv.appendChild(courseTitle);
        courseDiv.appendChild(href);
        courseDiv.appendChild(courseAuthor);

        document.getElementById("content-div").appendChild(courseDiv);
        i++;
    }
}