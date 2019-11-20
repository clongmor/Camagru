function getUploadedImage(){
let myCanvas = document.getElementById("my_canvas");
let myContext = myCanvas.getContext("2d");
let img = new Image();
img.src = "./gallery/42.png";
img.onload = () => {
  myContext.drawImage(img, 0, 0);
  }
}

function getWebcamStream(){
var video = document.querySelector("#webcam_box");

if (navigator.mediaDevices.getUserMedia) {
  const stream = navigator.mediaDevices.getUserMedia({
      video: true,
      audio: false
    })
    .then(function(stream) {
      window.stream = stream;
      video.srcObject = stream;
    })
    .catch(function(err) {
      console.log("No Webcam Found!");
    });
}
}


function getWebcamImage(){
  let myVideo = document.getElementById("webcam_box");
  let myCanvas = document.getElementById("my_canvas");
  let myContext = myCanvas.getContext("2d");
  
  snap.addEventListener("click", function() {
    myContext.drawImage(myVideo, videowidth, videoheight);
});
}