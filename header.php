<!DOCTYPE>
<html>
    <head>
    	<title>Dualconect Inform&aacute;tica</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">	

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="lib/styles.css" rel="stylesheet" media="screen">
        <link href="lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

		<?php
			require 'lib/src.php';
			session_start();
		?>
		
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	    <script src="lib/URI.js"></script>
	    <script src="lib/scripts.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                     
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        
                        <a class="brand" href="home.php"><img src="favicon.ico" style="width:20px; float: left;"/>Dualconect Inform&aacute;tica</a>

                        <div class="nav-collapse collapse pull-right">
                            <center>
                                <ul class="nav">
                                    <?php
					
										session_start();

                                        if ($handle = opendir('.')) 
                                        {
                                            while (false !== ($entry = readdir($handle))) 
                                            {
                                                if ($entry != "." && $entry != ".." && $entry != "header.php"  && $entry != "footer.php"  && $entry != "index.php" && $entry != "home.php" && substr($entry,-4) == '.php' ) 
                                                {
					                                echo '<li class="divider-vertical"></li>';
                                                    echo '<li><a href="'.rawurlencode($entry).'">'.ucfirst(substr(htmlspecialchars($entry),0,-4)).'</a></li>';
                                                }
                                            }
                                            closedir($handle);
                                        } 
                                    ?>
                                </ul>
                            </center>
                        </div>
                     
                    </div>
                </div>
            </div>
