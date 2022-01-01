function menu(){

  var hamburger = document.querySelector(".hamburger");

  var menu = document.querySelector(".menu");
  
  hamburger.addEventListener("click", function() {
    
    hamburger.classList.toggle("is-active");
    menu.classList.toggle("is-active");
  });
  
}


function onSelectImage(event){
  let reader = new FileReader();
  reader.onload = function(e){
      let preview = document.getElementById("preview");
      preview.src = e.target.result;
  }

  reader.readAsDataURL(event.target.files[0]);
}

document.addEventListener('DOMContentLoaded', (event) =>{

  console.log("DOM loaded");
  let upload = document.getElementById("upload");
  upload.addEventListener("change", onSelectImage);

});