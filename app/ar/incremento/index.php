<?php 


?>
<script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/dev/aframe/build/aframe-ar.js"></script>
<script src="https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>

<style>
  .button {
    background-color: black; 
    border: none;
    color: white;
    padding: 7px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
    border: 2px solid rgba(9, 148, 28, 0.541);
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    

  }
  
  </style>

<div style='position: fixed; top: 10px; width:100%; text-align: center; z-index: 1;'>
      <button class="button" id="btn1">Sonido</button>

    <button class="button" id="btn2">Detener Sonido</button>
    <button class="button" id="btn3">Detener Video</button>
    <button class="button" id="btn4">Reproducir</button>
   
  </div>
  
<body>
<meta name="apple-mobile-web-app-capable" content="yes">
<a-scene embedded arjs="debugUIEnabled: false;" vr-mode-ui="enabled: false">   

<a-assets>
  <video id="mivideo" crossOrigin="anonymous" playsinline webkitplaysinline autoplay controls muted src='./videos/2.mp4'></video>  
  <video id="mivideo" crossOrigin="anonymous" playsinline webkitplaysinline autoplay controls muted src='./videos/1.mp4'></video>  
</a-assets>

    <a-marker preset="hiro" id="#mivideo">
      <a-video src="#mivideo" position="0 0 0" scale="3 2 2" rotation="270 0 0" ></a-video>
    </a-marker>
  

    <a-marker preset="kanji" id="#mivideo">  
     <a-video src="#mivideo" position="0 0 0" scale="3 2 2" rotation="270 0 0" ></a-video>
    </a-marker>
   
    <a-entity camera></a-entity>
</a-scene>
</body>



<script> 
var m = document.querySelector("a-marker")
  
m.addEventListener("markerFound", (e)=>{
      console.log(m.id)
      var reg = document.createTextNode("cont");
     var v = document.querySelector('#mivideo').play();
   

})
      m.addEventListener("markerLost", (e)=>{
      console.log("marcador perdido")
      var v = document.querySelector('#mivideo').pause();
  
})


document.getElementById("btn1").addEventListener("click", (e)=>{

  var v = document.querySelector('#mivideo').muted=false;
})
document.getElementById("btn2").addEventListener("click", (e)=>{

  var v = document.querySelector('#mivideo').muted=true;
})
document.getElementById("btn3").addEventListener("click", (e)=>{

  var v = document.querySelector('#mivideo').pause();
})
document.getElementById("btn4").addEventListener("click", (e)=>{

  var v = document.querySelector('#mivideo').play();
})


     </script>