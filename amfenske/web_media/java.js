<script type="text/javascript">

    function vidplay() {
       var video = document.getElementById("Video1");
       var button = document.getElementById("play");
       if (video.paused) {
          video.play();
          button.textContent = "||";
       } else {
          video.pause();
          button.textContent = ">";
       }
    }

    function restart() {
        var video = document.getElementById("Video1");
        video.currentTime = 0;
    }

    function skip(value) {
        var video = document.getElementById("Video1");
        video.currentTime += value;
    }      
</script>

</head>
<body>        

<video id="Video1" >
//  Replace these with your own video files. 
     <source src="movie.mp4" type="video/mp4" />
     HTML5 Video is required for this example. 
     <a href="demo.mp4">Download the video</a> file. 
</video>

<div id="buttonbar">
    <button id="restart" onclick="restart();">[]</button> 
    <button id="rew" onclick="skip(-10)">&lt;&lt;</button>
    <button id="play" onclick="vidplay()">&gt;</button>
    <button id="fastFwd" onclick="skip(10)">&gt;&gt;</button>
</div> 