function getCourseInfo(id) {
    var courseId = id;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(e) {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "not connected") {
                generateDOMInfo(this.responseText);
                // alert(this.responseText);
            } else {
                document.location.replace("../php/Profile.php"); // Aici nu stiu la ce se refera? probabil pagina de login sau ceva?
            }
        }
    };
    xhttp.open("GET", "../course/example/" + courseId, true);
    xhttp.send();
}

function generateDOMInfo(JSONResponse) {

    document.getElementById("learning").remove();

    var contentdiv = document.createElement("section");
    contentdiv.id = "learning";
    contentdiv.className = "learning";

    document.body.appendChild(contentdiv);

    courseDetails = JSON.parse(JSONResponse);

    var courseTitle = document.createElement("h1");
    courseTitle.id = "course-title";
    courseTitle.class = "course-title";
    courseTitle.innerHTML = courseDetails["title"];

    var splashArt = document.createElement("div");
    splashArt.id = "splash-art";
    splashArt.class = "splash-art";

    var courseImage = document.createElement("img");
    courseImage.id = "course-image";
    courseImage.className = "course-image";
    courseImage.src = "../Images/" + courseDetails["image"];

    var courseDescription = document.createElement("div");
    courseDescription.id = "course-author";
    courseDescription.className = "course-author";
    courseDescription.innerHTML = courseDetails["description"];

    var courseStats = document.createElement("div");
    courseStats.id = "course-details";
    courseStats.class = "course-details";

    var courseTime = document.createElement("i");
    courseTime.id = "course-time";
    courseTime.class = "fa fa-clock";
    var courseTimeSpan = document.createElement("span");
    courseTimeSpan.innerHTML = courseDetails["duration"] + " Mins";

    var courseDif = document.createElement("i");
    courseDif.id = "course-dif";
    courseDif.class = "fa fa-brain";
    var courseDifSpan = document.createElement("span");
    courseDifSpan.innerHTML = courseDetails["difficulty"];

    var courseParts = document.createElement("i");
    courseParts.id = "course-parts";
    courseParts.class = "fa fa-puzzle-piece";
    var coursePartsSpan = document.createElement("span");
    coursePartsSpan.innerHTML = courseDetails["parts"] + " Part(s)";

    var courseExperience = document.createElement("i");
    courseExperience.id = "course-experience";
    courseExperience.class = "fa fa-puzzle-piece";
    var courseExperienceSpan = document.createElement("span");
    courseExperienceSpan.innerHTML = courseDetails["experience"];

    var parts = document.createElement("h1");
    parts.innerHTML = "Lesson parts: "

    // Aici ar trebui cred apel la microserviciul ce ofera detaliile la curs

    contentdiv.appendChild(courseTitle);

    splashArt.appendChild(courseImage);
    contentdiv.appendChild(splashArt);

    contentdiv.appendChild(courseDescription);

    courseTime.appendChild(courseTimeSpan);
    courseDif.appendChild(courseDifSpan);
    courseParts.appendChild(coursePartsSpan);
    courseExperience.appendChild(courseExperienceSpan);

    courseStats.appendChild(courseTime);
    courseStats.appendChild(courseDif);
    courseStats.appendChild(courseParts);
    courseStats.appendChild(courseExperience);

    contentdiv.appendChild(courseStats);

    contentdiv.appendChild(parts);

    document.getElementById("learning").appendChild(contentdiv);
}