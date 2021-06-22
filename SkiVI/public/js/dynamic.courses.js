function getCourseInfo(id, root) {
    var courseId = id;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(e) {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != null) {
                generateDOMInfo(this.responseText, root);
            } else {
                alert(this.responseText);
            }
        }
    };
    xhttp.open("GET", root + "course/course__id/" + courseId, true);
    xhttp.send();
}

function generateDOMInfo(JSONResponse, root) {
    // document.getElementById("learning").remove();

    courseDetails = JSON.parse(JSONResponse);
    if (courseDetails.length != 0) {

        var contentSection = document.createElement("section");
        contentSection.id = "learning";
        contentSection.className = "learning";

        //    document.body.appendChild(contentSection);

        var courseTitle = document.createElement("h1");
        courseTitle.id = "course-title";
        courseTitle.class = "course-title";
        courseTitle.innerText = courseDetails["title"];
        var splashArt = document.createElement("div");
        //   splashArt.id = "splash-art";
        splashArt.classList.add("splash-art");

        var courseImage = document.createElement("img");
        //   courseImage.id = "course-image";
        //   courseImage.className = "course-image";
        courseImage.alt = courseDetails["image"];
        courseImage.src = root + "Images/" + courseDetails["image"];

        var courseDescription = document.createElement("div");
        //   courseDescription.id = "course-author";
        courseDescription.className = "course-description";
        courseDescription.innerText = courseDetails["description"];

        var courseStats = document.createElement("div");
        //   courseStats.id = "course-details";
        courseStats.className = "course-details";

        var courseTime = document.createElement("i");
        //   courseTime.id = "course-time";
        courseTime.className = "fa fa-clock";

        var courseTimeSpan = document.createElement("span");
        courseTimeSpan.innerText = courseDetails["duration"] + " Min.";

        var courseDif = document.createElement("i");
        //   courseDif.id = "course-dif";
        courseDif.className = "fa fa-brain";

        var courseDifSpan = document.createElement("span");
        courseDifSpan.innerText = courseDetails["difficulty"];

        var courseParts = document.createElement("i");
        //   courseParts.id = "course-parts";
        courseParts.className = "fa fa-puzzle-piece";
        var coursePartsSpan = document.createElement("span");
        coursePartsSpan.innerText = courseDetails["parts"] + " Part(s)";

        var courseExperience = document.createElement("i");
        //   courseExperience.id = "course-experience";
        courseExperience.className = "fa fa-paint-brush";
        var courseExperienceSpan = document.createElement("span");
        courseExperienceSpan.innerText = courseDetails["experience"];
        var parts = document.createElement("h1");
        parts.innerText = "Lesson parts:";

        var lessons = document.createElement("div");
        lessons.className = "course-parts";

        contentSection.appendChild(courseTitle);

        splashArt.appendChild(courseImage);
        contentSection.appendChild(splashArt);

        contentSection.appendChild(courseDescription);

        courseTime.appendChild(courseTimeSpan);
        courseDif.appendChild(courseDifSpan);
        courseParts.appendChild(coursePartsSpan);
        courseExperience.appendChild(courseExperienceSpan);

        courseStats.appendChild(courseTime);
        courseStats.appendChild(document.createElement("br"));
        courseStats.appendChild(courseDif);
        courseStats.appendChild(document.createElement("br"));
        courseStats.appendChild(courseParts);
        courseStats.appendChild(document.createElement("br"));
        courseStats.appendChild(courseExperience);
        courseStats.appendChild(document.createElement("br"));

        contentSection.appendChild(courseStats);

        contentSection.appendChild(parts);

        document.getElementById("navMenu").after(contentSection);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(e) {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != null) {
                    var jsonarr = JSON.parse(this.responseText);

                    var partDiv = [];
                    var partImg = [];
                    var partDivv = [];
                    var partSpan = [];
                    var partH = [];

                    for (let i = 0; i < jsonarr.lessons.length; i++) {
                        partDiv[i] = document.createElement("div");
                        partDiv[i].classList.add("part");
                        partImg[i] = document.createElement("img");
                        partImg[i].id = "lesson_image_" + i;
                        partImg[i].classList.add("lesson--image");
                        partImg[i].src = root + "Images/" + jsonarr.lessons[i].image + ".jpg";
                        partImg[i].alt = jsonarr.lessons[i].name;
                        partImg[i].onclick = function() { showModal("lesson_" + i) };
                        partDivv[i] = document.createElement("div");
                        partDivv[i].id = "lesson_" + i;
                        partDivv[i].classList.add("modal--part");
                        partSpan[i] = document.createElement("span");
                        partSpan[i].id = "close_" + i;
                        partSpan[i].classList.add("close--button");
                        partSpan[i].innerText = "x";
                        partSpan[i].style.position = "fixed";
                        partSpan[i].style.zIndex = 2;
                        partSpan[i].onclick = function() { hideModal("lesson_" + i) };
                        partH[i] = document.createElement("h1");
                        partH[i].innerText = jsonarr.lessons[i].name;
                        partDivv[i].appendChild(partSpan[i]);
                        partDivv[i].appendChild(partH[i]);
                        for (var key in jsonarr.lessons[i].lesson_steps) {
                            if (key.substr(0, 3) == "img") {
                                var part = document.createElement("img");
                                part.classList.add("learning--image");
                                part.src = root + "Images/" + jsonarr.lessons[i].lesson_steps[key] + ".jpg";
                                partDivv[i].appendChild(part);
                            } else {
                                var part = document.createElement("p");
                                part.classList.add("learning--p");
                                part.innerText = jsonarr.lessons[i].lesson_steps[key];
                                partDivv[i].appendChild(part);
                            }
                        }
                        var empty = document.createElement("p");
                        empty.innerText = " ";
                        partDivv[i].appendChild(empty);
                        partDiv[i].appendChild(partImg[i]);
                        partDiv[i].appendChild(partDivv[i]);
                        lessons.appendChild(partDiv[i]);
                    }
                    contentSection.appendChild(lessons);
                } else {
                    alert(this.responseText);
                }
            }
        };
        var ajax = "../../../microservices/" + courseDetails["category"] + "microservice/api/product/getCourseLessons.php?id=" + courseDetails["ID"];
        xhttp.open("GET", ajax, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send();

    } else {
        document.location.href = root + "course/no__id/";
    }

    //    document.getElementById("learning").appendChild(contentSection);
}

function showModal($id) {
    var modal = document.getElementById($id);
    modal.style.display = "block";
}

function hideModal($id) {
    var modal = document.getElementById($id);
    modal.style.display = "none";
}