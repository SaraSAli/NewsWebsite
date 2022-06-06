<?php


define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 6;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }


?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAS - Homepage</title>
    <link rel="stylesheet" href="./css/website.css">
    
</head>

<header class ="header">
<div class="flex">

        <a href="admin_page.php" class="logo">SAS <span>Website</span></a>
        <div class="content">     

            <a class="active" href="<?php echo url_for('./website.php'); ?>">Home</a>
            <a href="<?php echo url_for('./news.php'); ?>">News</a>
            <a href="<?php echo url_for('./sports.php'); ?>">Sports</a>
            <a href="<?php echo url_for('./contactUs.php'); ?>">Contact us</a> 
            <a href="<?php echo url_for('./about.php'); ?>">    About us</a> 
        
            
    <?php session_start(); if( isset($_SESSION['user_email']) && !empty($_SESSION['user_email'] ) ){?>
<?php }else{ ?>
    <a href="<?php echo url_for('./login.php'); ?>" class="spa">Login </a>
    <a href="<?php echo url_for('./register.php'); ?>" class="spa">Sign up</a> 
    <?php } ?>

        </div>
</div>
</header>