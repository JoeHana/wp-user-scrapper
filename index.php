<?php
function trailingslashit( $string ) {
	return untrailingslashit( $string ) . '/';
}

function untrailingslashit( $string ) {
	return rtrim( $string, '/\\' );
}

$path  		= trailingslashit(dirname($_SERVER['REQUEST_URI']));
$baseurl 	= 'http://' . $_SERVER['SERVER_NAME'] . $path;

$scriptUrl 	= $baseurl . 'comp/scrapper.js';
$serverUrl 	= $baseurl . 'comp/api.php';

$script 	= "javascript:(function(){var%20s=document.createElement('script');s.setAttribute('src','". $scriptUrl . "');s.setAttribute('data-url', '".$serverUrl."');document.getElementsByTagName('body')[0].appendChild(s);})();";

$version	= 'v1.0';
?>

<!DOCTYPE html>

<html class="no-js" lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Scrapper by ANEX</title>
                
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <!-- make it responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
                
        <!-- loading the css -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
        
        <link rel='stylesheet' id='2014-style-css'  href='http://anex.at/wp-content/themes/2014/style.css?ver=1.0.0' type='text/css' media='screen' />
        <script type='text/javascript' src='http://anex.at/wp-includes/js/jquery/jquery.js?ver=1.11.0'></script>
        <script type='text/javascript' src='http://anex.at/wp-content/themes/2014/library/assets/js/jquery.stellar.min.js?ver=0.6.1'></script>
        <script type='text/javascript' src='http://anex.at/wp-content/themes/2014/library/assets/js/init.js?ver=1.0.0'></script>
        
        <style>
		.btn-bookmarklet {
			font-size: 1.25em;
			position: relative;
			cursor: move;
			color: #fff;
			text-decoration: none;
			background: rgba(0,0,0,0.5);
			padding: 20px 100px;
			margin: 10px 0;
			display: inline-block;
			
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			-ms-border-radius: 3px;
			-o-border-radius: 3px;
			border-radius: 3px;
		}
		</style>
        
    </head>
            
    <body>
    	
        <!-- HEADER >> START -->
        <?php /*?><section id="header">
        
        	<!-- LOGO >> START -->
        	<div id="logo">
                <a href="http://anex.at" title="Back to ANEX">
                	<img src="http://anex.at/wp-content/themes/2014/content/images/logo.png" alt="ANEX LOGO" />
                </a>
            </div>
        	<!-- LOGO >> END -->
            
        </section><?php */?>
        <!-- HEADER >> END -->
                
        <!-- BODY >> START -->
        <section id="body">
                
            <div class="intro">
                  <h1>SCRAPPER</h1>
                  <h3>a handy tool to scrap a wordpress user table into JSON Format</h3>
                  <!--
                  <small>generated files get saved <a href="http://scrapper.anex.at/data">here</a></small>
                  <br>
                  <br>
                  -->
                  <a class="btn-bookmarklet" href="<?php echo $script ?>">Scrapper <?php echo $version ?></a>
                  <br>
                  <small>Drag the link above into your bookmarks bar</small>
            </div>
            
        </section>
        <!-- BODY >> END -->

        <!-- FOOTER >> START -->
        <section id="footer">
        
			<div class="copyright">
                
            	<a href="">ANEX</a>&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp;&nbsp;&copy; 2008 - 2014&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp;&nbsp;All Rights Reserved<!-- - <a href="http://anex.at/wp-content/uploads/2013/10/anex-agb.pdf">AGB</a> - <a href="https://plus.google.com/117711560159882468283" rel="publisher">Google+</a>-->
            </div>
            
        </section>
        <!-- FOOTER >> END -->
                
    </body>

</html>