function getUploadedImage(){
let myCanvas = document.getElementById("my_canvas");
let myContext = myCanvas.getContext("2d");
let $source = $_FILES['image'];
let img = new Image();
img.src = $source;
img.onload = () => {
  myContext.drawImage(img, 0, 0);
  }
}

function getWebcamStream(){
var video = document.querySelector("#webcam_box");

if (navigator.mediaDevices.getUserMedia) {
  const stream = navigator.mediaDevices.getUserMedia({
      video: {width: 500, height: 500},
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

  myContext.save();
  myContext.translate(500, 0);
  myContext.scale(-1, 1);
  myContext.drawImage(myVideo, 0, 0);
  myContext.restore();
  

}

function getSticker($data){
let sCanvas = document.getElementById("sticker_canvas1");
let sContext = sCanvas.getContext("2d");
let sticker = new Image();
sticker.src = $data;
sticker.onload = () => {
  sContext.drawImage(sticker, 0, 0);
  }
}