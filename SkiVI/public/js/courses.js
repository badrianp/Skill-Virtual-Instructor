function getCourses(category, root) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function (e) {
      if (this.readyState == 4 && this.status == 200) {
         if (this.responseText != null)
            generateDOM(this.responseText, root, category);
         else alert(this.responseText);
      }
   };
   xhttp.open("GET", root + "course/category/" + category, true);
   xhttp.send();
}

function generateDOM(JSONResponse, root = "", category) {
   var contentdiv = document.createElement("div");
   contentdiv.id = "content-div";
   contentdiv.className = "content-div";

   document.querySelector("main").appendChild(contentdiv);
   courseDetails = JSON.parse(JSONResponse);

   var i = 0;

   while (i < courseDetails.length) {
      var courseId = document.createElement("data");
      courseId.value = courseDetails[i]["ID"];
      courseId.style = "display: none";

      var courseDiv = document.createElement("div");
      courseDiv.id = courseDetails[i]["category"];
      courseDiv.classList.add("course-div");

      var courseTitle = document.createElement("h4");
      courseTitle.id = "course-title";
      courseTitle.classList.add("course-title");
      courseTitle.innerText = courseDetails[i]["title"];

      var href = document.createElement("a");
      href.href = root + "course/example/" + courseId.value; //link ul catre pagina in care se afla cursul, aici cred ca trebuie dinamic si el gen /courses?id=id_curs sau asa ceva nu?

      var courseImage = document.createElement("img");
      courseImage.id = "course-image";
      courseImage.className = "course-image";
      courseImage.src = root + "Images/" + courseDetails[i]["image"];
      courseImage.alt = courseDetails[i]["image"];

      var courseAuthor = document.createElement("h4");
      courseAuthor.id = "course-author";
      courseAuthor.className = "course-author";
      courseAuthor.innerText = courseDetails[i]["author"];

      href.appendChild(courseImage);

      courseDiv.appendChild(courseTitle);
      courseDiv.appendChild(href);
      courseDiv.appendChild(courseAuthor);
      courseDiv.appendChild(courseId);

      document.getElementById("content-div").appendChild(courseDiv);
      i++;
   }

   if (i == 0) {
      document.location.href = root + "course/no__category/" + category;
   }
}
