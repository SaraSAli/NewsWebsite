<?php include('./messages.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>contact us</title>
  <link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
  <form method="post" action="contactUs.php" id="contact_form">
  	<h1>contact us</h1>
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>" required="required">
	  <?php if (isset($email_error)): ?>
	  	<span><?php echo $email_error; ?></span>
	  <?php endif ?>
  	</div>
  	<div <?php if (isset($name)): ?> class="form_error" <?php endif ?> >
      <input type="text" name="name" placeholder="name" value="<?php echo $name; ?>" required="required">
      <?php if (isset($name_error)): ?>
      	<span><?php echo $name_error; ?></span>
      <?php endif ?>
  	</div>
  	<div>
  		<input type="tel" name ="phone" placeholder="phone" max="11" value="<?php echo $phone; ?>" required="required">
  	</div>
      <div class="row">     
      <div class="textarea">    
        <textarea id="comment" name="comment" placeholder="Write something.." ></textarea>    
      </div>    
    </div>    
		<div >
			<button type="submit" name="send" id="send" >Send</button>
		</div>
		<p>
			 <button > <a href ="./website.php"> Go back to website </a> </button>
		</p>
  </form>
  
      </body>
</html>