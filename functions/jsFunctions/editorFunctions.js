function userBaseImage(files){  
let myCanvas = document.getElementById("my_canvas");
let myContext = myCanvas.getContext("2d");

const file = files;

let img = new Image();
img.src = window.URL.createObjectURL(file);
img.onload = () => {
  myContext.drawImage(img, 0, 0, img.width, img.height, 0, 0, myCanvas.width, myCanvas.height);
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

function getSticker(data){
let sCanvas = document.getElementById("sticker_canvas");
let sContext = sCanvas.getContext("2d");
let sticker = new Image();
sticker.src = data;
sticker.onload = () => {
  sContext.drawImage(sticker, 0, 0, sCanvas.width/2, sCanvas.height/2);
  }
}

//compare canvas dataurl to blank canvas dataurl

function isCanvasBlank(canvas) {
  const blank = document.createElement('canvas');

  blank.width = canvas.width;
  blank.height = canvas.height;

  return canvas.toDataURL() === blank.toDataURL();
}

//undisable button if both canvases have content

function checkCanvas(){

  let canvas = document.getElementById('my_canvas');
  let scanvas = document.getElementById('sticker_canvas');

  if (isCanvasBlank(canvas) || isCanvasBlank(scanvas))
  {
    return 0;
  }

  else{
    document.getElementById("submit_image").disabled = false;
  }

}

function getImageDataUrl(){
  let myCanvas = document.getElementById("my_canvas");
  let imageDataUrl = encodeURIComponent(myCanvas.toDataURL());
 
  let sCanvas = document.getElementById("sticker_canvas");
  let stickerDataUrl = encodeURIComponent(sCanvas.toDataURL());

  let url = "imagedata=" + imageDataUrl + "&stickerdata=" + stickerDataUrl;
  let ajax = new XMLHttpRequest();
  ajax.open('POST', 'functions/editorFunctions.php');
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  ajax.send(url);

	if (ajax.status < 300) {
		// What do when the request is successful
		console.log('success!');
	} else {
		// What do when the request fails
    console.log('Something went wrong!');
	}
window.location.reload();
}
