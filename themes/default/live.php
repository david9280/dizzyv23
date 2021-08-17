<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING); ?></title>
    <?php
include "layouts/header/meta.php";
include "layouts/header/css.php";
include "layouts/header/javascripts.php";
?>
<?php
if ($agoraStatus == '1') {?>
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/agora.js"></script>
<link href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/video-js.css" rel="stylesheet" />

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/videojs-ie8.min.js"></script>
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/videoa.js"></script>
<script type="text/javascript">
function RunLiveAgora(channelName,DIV_ID) {
var agoraAppId = '<?php echo $agoraAppID; ?>';
var token = null;
var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'});
client.init(agoraAppId, function () {
client.setClientRole('audience', function() {
}, function(e) {
});

client.join(token, channelName, 0, function(uid) {
}, function(err) {
});
}, function (err) {
});
client.on('stream-added', function (evt) {

var stream = evt.stream;
var streamId = stream.getId();
client.subscribe(stream, function (err) {
});
});
client.on('stream-subscribed', function (evt) {
var remoteStream = evt.stream;
remoteStream.play(DIV_ID);
$('#player_'+remoteStream.getId()).addClass('embed-responsive-item');
});
}
</script>
<?php }?>
</head>
<body>
<?php include "layouts/header/header.php";?>
    <?php
if ($liveType == 'free') {
	include "layouts/live/freeLive.php";
} else {
	include "layouts/live/paidLive.php";
}
?>
<?php if ($liveCreator == $userID) {?>
<script type="text/javascript">
var rand = <?php echo rand(1111111, 9999999); ?>;
function ready() {
	  startAgoraBroadcast();
	  getMedia()
	    .then(str => {
	      stream     = str;
	      //set cam feed to video window so user can see self.
	      let vidWin = document.getElementsByTagName('video')[0];
	      if (vidWin) {
	        $('#basic-stream').removeClass('hidden');
	        vidWin.srcObject = stream;
	      }
	    })
	    .catch(e => {
	      $('#remote-media').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.27,2L2,3.27L4.73,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16C16.2,18 16.39,17.92 16.54,17.82L19.73,21L21,19.73M21,6.5L17,10.5V7A1,1 0 0,0 16,6H9.82L21,17.18V6.5Z" fill="currentColor"></path></svg> getUserMedia Error: '+e+'</div>');
	    });
	}
var agoraAppId = '<?php echo $agoraAppID; ?>'; // set app id
var channelName = '<?php echo $liveChannel; ?>'; // set channel name
// create client instance
var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'}); // h264 better detail at a higher motion
var mainStreamId; // reference to main stream

var cameraVideoProfile = '720p_6'; // 960 × 720 @ 30fps  & 750kbs

// keep track of streams
var localStreams = {
  uid: rand,
  camera: {
    camId: '',
    micId: '',
    stream: {}
  }
};

// keep track of devices
var devices = {
  cameras: [],
  mics: []
}

var externalBroadcastUrl = '';

// default config for rtmp
var defaultConfigRTMP = {
  width: 640,
  height: 360,
  videoBitrate: 400,
  videoFramerate: 15,
  lowLatency: false,
  audioSampleRate: 48000,
  audioBitrate: 48,
  audioChannels: 1,
  videoGop: 30,
  videoCodecProfile: 100,
  userCount: 0,
  userConfigExtraInfo: {},
  backgroundColor: 0x000000,
  transcodingUsers: [],
};

function getCameraDevices() {
  console.log("Checking for Camera Devices.....")
  client.getCameras (function(cameras) {
    devices.cameras = cameras; // store cameras array
    cameras.forEach(function(camera, i){
      //var name = camera.label.split('(')[0];
      var name = camera.label;
      var optionId = 'camera_' + i;
      var deviceId = camera.deviceId;
      if(i === 0 && localStreams.camera.camId === ''){
        localStreams.camera.camId = deviceId;
      }
      $('#camera-list').append('<a class="dropdown-item pointer" id="' + optionId + '">' + name + '</a>');
    });
    $('#camera-list a').click(function(event) {
      var index = event.target.id.split('_')[1];
      changeStreamSource (index, "video");
    });
  });
}

function getMicDevices() {
  console.log("Checking for Mic Devices.....")
  client.getRecordingDevices(function(mics) {
    devices.mics = mics; // store mics array
    mics.forEach(function(mic, i){
      //var name = mic.label.split('(')[0];
      var name = mic.label;
      var optionId = 'mic_' + i;
      var deviceId = mic.deviceId;
      if(i === 0 && localStreams.camera.micId === ''){
        localStreams.camera.micId = deviceId;
      }
      if(name.split('Default - ')[1] != undefined) {
        name = '[Default Device]' // rename the default mic - only appears on Chrome & Opera
      }
      $('#mic-list').append('<a class="dropdown-item pointer" id="' + optionId + '">' + name + '</a>');
    });
    $('#mic-list a').click(function(event) {
      var index = event.target.id.split('_')[1];
      changeStreamSource (index, "audio");
    });
  });
}
function changeStreamSource (deviceIndex, deviceType) {
  console.log('Switching stream sources for: ' + deviceType);
  var deviceId;
  var existingStream = false;
  
  if (deviceType === "video") {
    deviceId = devices.cameras[deviceIndex].deviceId
  }

  if(deviceType === "audio") {
    deviceId = devices.mics[deviceIndex].deviceId;
  }

  localStreams.camera.stream.switchDevice(deviceType, deviceId, function(){
    console.log('successfully switched to new device with id: ' + JSON.stringify(deviceId));
    // set the active device ids
    if(deviceType === "audio") {
      localStreams.camera.micId = deviceId;
    } else if (deviceType === "video") {
      localStreams.camera.camId = deviceId;
    } else {
      console.log("unable to determine deviceType: " + deviceType);
    }
  }, function(){
    console.log('failed to switch to new device with id: ' + JSON.stringify(deviceId));
  });
}
// set log level:
// -- .DEBUG for dev
// -- .NONE for prod
AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.DEBUG);

// init Agora SDK
function startAgoraBroadcast() {
	client.init(agoraAppId, function () {
	  console.log('AgoraRTC client initialized');
	  joinChannel(); // join channel upon successfull init
	}, function (err) {
	  console.log('[ERROR] : AgoraRTC client init failed', err);
	});
}
startAgoraBroadcast();
// client callbacks
client.on('stream-published', function (evt) {
  console.log('Publish local stream successfully');
});

// when a remote stream is added
client.on('stream-added', function (evt) {
  console.log('new stream added: ' + evt.stream.getId());
});

client.on('stream-removed', function (evt) {
  var stream = evt.stream;
  stream.stop(); // stop the stream
  stream.close(); // clean up and close the camera stream
  console.log("Remote stream is removed " + stream.getId());
});

//live transcoding events..
client.on('liveStreamingStarted', function (evt) {
  console.log("Live streaming started");
});

client.on('liveStreamingFailed', function (evt) {
  console.log("Live streaming failed");
});

client.on('liveStreamingStopped', function (evt) {
  console.log("Live streaming stopped");
});

client.on('liveTranscodingUpdated', function (evt) {
  console.log("Live streaming updated");
});

// ingested live stream
client.on('streamInjectedStatus', function (evt) {
  console.log("Injected Steram Status Updated");
  console.log(JSON.stringify(evt));
});

// when a remote stream leaves the channel
client.on('peer-leave', function(evt) {
  console.log('Remote stream has left the channel: ' + evt.stream.getId());
});

// show mute icon whenever a remote has muted their mic
client.on('mute-audio', function (evt) {
  console.log('Mute Audio for: ' + evt.uid);
});

client.on('unmute-audio', function (evt) {
  console.log('Unmute Audio for: ' + evt.uid);
});

// show user icon whenever a remote has disabled their video
client.on('mute-video', function (evt) {
  console.log('Mute Video for: ' + evt.uid);
});

client.on('unmute-video', function (evt) {
  console.log('Unmute Video for: ' + evt.uid);
});

// join a channel
function joinChannel() {
  var token = generateToken();
  var userID = 0; // set to null to auto generate uid on successfull connection

  // set the role
  client.setClientRole('host', function() {
    console.log('Client role set as host.');
  }, function(e) {
    console.log('setClientRole failed', e);
  });


  // client.join(token, 'allThingsRTCLiveStream', 0, function(uid) {
  client.join(token, channelName, userID, function(uid) {
      createCameraStream(uid, {});
      localStreams.uid = uid; // keep track of the stream uid
  }, function(err) {
      console.log('[ERROR] : join channel failed', err);
  });
}

// video streams for channel
function createCameraStream(uid, deviceIds) {
  console.log('Creating stream with sources: ' + JSON.stringify(deviceIds));

  var localStream = AgoraRTC.createStream({
    streamID: uid,
    audio: true,
    video: true,
    screen: false
  });
  localStream.setVideoProfile(cameraVideoProfile);

  // The user has granted access to the camera and mic.
  localStream.on("accessAllowed", function() {
    if(devices.cameras.length === 0 && devices.mics.length === 0) {
      console.log('[DEBUG] : checking for cameras & mics');
      getCameraDevices();
      getMicDevices();
    }
    console.log("accessAllowed");
  });
  // The user has denied access to the camera and mic.
  localStream.on("accessDenied", function() {
    console.log("accessDenied");
  });

  localStream.init(function() {
    console.log('getUserMedia successfully');
    $('#main_live_video').html('')
    localStream.play('main_live_video'); // play the local stream on the main div
    // publish local stream

    client.publish(localStream, function (err) {
      console.log('[ERROR] : publish local stream error: ' + err);
    });

    localStreams.camera.stream = localStream; // keep track of the camera stream for later
  }, function (err) {
    console.log('[ERROR] : getUserMedia failed', err);
  });
}

// use tokens for added security
function generateToken() {
  return null; // TODO: add a token generation
}
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
if (!navigator.getUserMedia) {
  //alert('Sorry, this browser does not support webRTC.');
} 

function getMedia() {
  return new Promise((resolve, reject) => {

    let constraints = {audio: true, video: true};
    navigator.mediaDevices.getUserMedia(constraints)
      .then(str => {
        resolve(str);
		$('#remote-media h3').addClass('hidden');
        $('#remote-media .liv_vid_cont .filtvid').html('<div style="width: 100%; height: 100vh; position: relative; background-color: black; overflow: hidden;"><video  id="basic-stream" class="hidden videostream" style="width: 100%; height: 100vh; position: relative; transform: rotateY(180deg); object-fit: cover;" autoplay="" muted="" playsinline=""></video></div>');
      }).catch(err => {
      $('#remote-media h3').text('Could not get Media: '+err);
      reject(err);
    })
  });
}

if (navigator.getUserMedia) {
  ready();
}
</script>
<?php } else {?>
<script type="text/javascript">
RunLiveAgora("<?php echo $liveChannel; ?>","post_live_video");
</script>
<?php }?>
<script type="text/javascript">
$(document).ready(function(){
  $("body").on("click",".camera_choose", function(){ 
     if(!$(".camListOpen")[0]){
        $(".camList").addClass("camListOpen");
     }else{
        $(".camList").removeClass("camListOpen");
     }
  });
  $("body").on("mouseup touchend", function(e) {
        /*e.preventDefault();*/
        var listCont = $('.camList');
        if (!listCont.is(e.target) && listCont.has(e.target).length === 0) {
            $(listCont).removeClass('camListOpen');
        } 
    });
});
</script>
</body>
</html>