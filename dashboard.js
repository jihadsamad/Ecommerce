function openCity(evt, cityName) {
  
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  var defaultBtn = document.getElementById("default-btn");
  var imagePriview = document.getElementById("imagePreview");

  defaultBtn.addEventListener("change", function(event){
      if(event.target.files.length == 0){
          return;
      }
      var temUrl = URL.createObjectURL(event.target.files[0]);
      imagePriview.src=temUrl;
  });