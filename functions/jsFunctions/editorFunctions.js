function getUploadedImage(){
let myCanvas = document.getElementById("my_canvas");
let myContext = myCanvas.getContext("2d");
let img = new Image();
img.src = "./gallery/42.png";
img.onload = () => {
  myContext.drawImage(img, 0, 0);
  }
}
function getWebcamImage(){
  let myCanvas = document.getElementById("my_canvas");
  let myContext = myCanvas.getContext("2d");
  snap.addEventListener("click", function() {
    myContext.drawImage(video, 0, 0, 640, 480);
});
}