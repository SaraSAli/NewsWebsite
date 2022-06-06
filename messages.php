<style type="text/css">
  .card {
    margin: 100px auto;
    width:500px;
    height:100px;
    text-align: center;
    margin-bottom: 10px; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  color:#2b2b2b ;
  padding:15px;
  background-color:#e7e7e7;
  border-radius: 15px;
}
body{
    background-image: linear-gradient(19deg, #141313 0%, #4d4dde 100%);
    color:white;
}
button{
    background-color: #5380A7;
    color:white;
    border-radius: 15px;
    margin:20px;
    border:none;
    padding:10px;

}
a{
    text-decoration: none;
    color:white;

}
a:visited{
    color:white;

}
</style>
<?php 

 include('./config.php');
 $email=$name=$phone ='';
  if (isset($_POST['send'])) {
  	
  	$email = $_POST['email'];
    $name = $_POST['name'];
  	$phone = $_POST['phone'];
    $comment = $_POST['comment'];

    
    $query = "INSERT INTO message (email, name, phone,comment) 
      	    	  VALUES ('$email', '$name', '$phone' ,'$comment')";
    $results = mysqli_query($conn, $query);
           echo ' <body>
           <div class="card">thanks we will contact you! <br> <button > <a href ="./website.php">Go back to website </a> </div>   </body>';
           exit();
  	}

      
  
?>