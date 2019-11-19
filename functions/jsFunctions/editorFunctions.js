function getUploadedImage(){
let myCanvas = document.getElementById("my_canvas");
let MyContext = myCanvas.getContext("2d");
let img = new Image();
img.src = "./gallery/42.png";
img.onload = () => {
  MyContext.drawImage(img, 0, 0);
  }
}

function getWebcamImage(){
  
}