<?php

/* ***************************************** *
 * //LI = Login Code, remove when published
 * ***************************************** */

require_once('config/config.php');
//require_once('../login/translations/en.php');
//require_once('../login/libraries/PHPMailer.php');

require_once('classes/Database.php');
$db = new Database();

//check what page we're on 

$path = $_SERVER['REQUEST_URI'];
$file = basename($path);
$file = basename($path, ".php");

//get story data from database

$sql = "SELECT * FROM longform_stories WHERE p2p_slug = 'hc-fake-phd-california-southern-university-matthew-kauffman-20150326'";
$story_info = $db->getData($sql);

$p2p_slug = $story_info[0]['p2p_slug']; 

//get content items from p2p

include_once("classes/p2pRead.php");

$story = getContentItem($p2p_slug);
$seotitle = $story->content_item->seotitle;
$seokey = $story->content_item->seo_keyphrase;
$seodesc = $story->content_item->seodescription;
$story_arr = array();
$story_arr = explode("<p>", str_replace("</p>", "", $story->content_item->body));
array_shift($story_arr);

?>

<?php include("layouts/header.htm"); ?>
    
  <body>
    	
  	<!-- ******************************************* -->
    <!-- Navigation                                  -->
    <!-- ******************************************* -->
  	
  	<div data-trb-thirdpartynav></div>

    <!-- ******************************************* -->
    <!-- Loading Page                                -->
    <!-- ******************************************* -->

    <!--<div id="loading-page">
      <div id="credits" class="hsContainer">
          <div class="hsContent">
              <div class="headlines">
                  <img id="interlock-logo" src="img/icons/hc-interlock-logo.svg">
                  <br/>
                  <p class="label">Multimedia</p>
                  <p class="loading-head"><?php echo $story_info[0]['main_head']; ?></p>
                  <p class="loading-note">Loading</p>
                  <img id="loading-image" src="img/icons/loading.gif">
              </div>
          </div>
      </div>
    </div>-->
  	
  	<!-- ******************************************* -->
    <!-- User Alert                                  -->
    <!-- ******************************************* -->

  	<!--<div id="user-alert">
  		<p><a id="remove-alert"><span class="glyphicon glyphicon-remove-circle"></span></a> This multimedia presentation is best viewed using a <a href="http://browsehappy.com/" target="_blank">modern web browser</a> on a laptop or desktop computer.</p>
  	</div>-->

    <!--[if lt IE 9]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <div id="skrollr-body">

     		<!-- ******************************************* -->
      	<!-- Cover                                       -->
      	<!-- ******************************************* -->
		
  			<?php //include("chapters/chapter_0.htm"); ?>
  		    
  		  <!-- ******************************************* -->
  	    <!-- Body                                        -->
  	    <!-- ******************************************* -->
  	
        <div class="container-fluid">
    			
          <?php include("chapters/chapter_1.htm"); ?>

    		</div> 	
    			<!-- ******************************************* -->
    	    <!-- Credits                                     -->
    	    <!-- ******************************************* -->
    			
    			<?php //include("chapters/chapter_2.htm"); ?>
        
    </div> 
    <!-- ******************************************* -->
    <!-- Analytics                                  -->
    <!-- ******************************************* -->
  	
  	<?php //include_once("layouts/analyticstracking.htm") ?>

    <!-- ******************************************* -->
	  <!-- Page scripts                                -->
	  <!-- ******************************************* -->
		
		<?php include("layouts/scripts.htm"); ?>
    </body>
</html>
