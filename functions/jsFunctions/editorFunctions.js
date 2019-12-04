function userBaseImage(files){  
let myCanvas = document.getElementById("my_canvas");
let myContext = myCanvas.getContext("2d");

const file = files;
console.log(file);

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

function getSticker($data){
let sCanvas = document.getElementById("sticker_canvas1");
let sContext = sCanvas.getContext("2d");
let sticker = new Image();
sticker.src = $data;
sticker.onload = () => {
  sContext.drawImage(sticker, 0, 0);
  }
}

function getImageDataUrl(){
  let myCanvas = document.getElementById("my_canvas");
  let imageDataUrl = encodeURIComponent(myCanvas.toDataURL());
 
  let sCanvas = document.getElementById("sticker_canvas1");
  let stickerDataUrl = encodeURIComponent(sCanvas.toDataURL());

  let url = "imagedata=" + imageDataUrl + "&stickerdata=" + stickerDataUrl;
  //console.log(url);
  let ajax = new XMLHttpRequest();
  ajax.open('POST', 'functions/editorFunctions.php');
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  ajax.onreadystatechange = function() {
    console.log(ajax.responseText);
 }

  ajax.send(url);
  
 
    // Process our return data
    console.log(ajax.status);
	if (ajax.status < 300) {
		// What do when the request is successful
		console.log('success!', ajax);
	} else {
		// What do when the request fails
		console.log('The request failed!');
	}

	// Code that should run regardless of the request status
	console.log('This always runs...');
}
