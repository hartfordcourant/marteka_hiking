
var players = [],   // array to hold players
    player,
    APIModules,
    videoPlayer,
    experienceModule; 
    
    function myTemplateLoaded(experienceID) {
      APIModules = brightcove.api.modules.APIModules;
      // Add each player's id to the players array
      players.push(experienceID);     
    }
    function onTemplateReady(event) {
      // Add a PLAY event handler to each player
      player = brightcove.api.getExperience(event.target.experience.id);
      videoPlayer = player.getModule(APIModules.VIDEO_PLAYER);
      // Wrap handler in anonymous function
      videoPlayer.addEventListener(brightcove.api.events.MediaEvent.PLAY, function(event) {onPlay(event);});
      changeTitle();
    }
    function onPlay(event) {
      var id = event.target.experience.id;   
      // Loop through the players array, and stop the others
      for (var i = 0; i < players.length; i++) {
        if (players[i] != id) {
          var player = brightcove.api.getExperience(players[i]);
          var videoPlayer = player.getModule(brightcove.api.modules.APIModules.VIDEO_PLAYER);
          videoPlayer.pause(true);
        }
      }
    }
    function changeTitle(){
      var video_player = player.getModule(APIModules.VIDEO_PLAYER);
      var content_module = player.getModule(APIModules.CONTENT);
      
      video_player.getCurrentVideo(function (videoDTO) {
        videoDTO.displayName = "";
        content_module.updateMedia(videoDTO, function (newVideoDTO) { });
      });

    }
    function onMediaBegin(event) {
      //do something when it begins
    }
    function onMediaComplete(event) {
       //do something when finished
    }