<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_article'])){

   $title = mysqli_real_escape_string($conn, $_POST['title']);
   $category_id = $_POST['category_id'];
   $description = $_POST['description'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_title = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $date = date("Y-m-d");


   $select_article_title = mysqli_query($conn, "SELECT title FROM `articles` WHERE title = '$title'") or die('query failed');

   if(mysqli_num_rows($select_article_title) > 0){
      $message[] = 'article title already added';
   }else{
      $add_article_query = mysqli_query($conn, "INSERT INTO `articles`(title, category_id, image, description, date) 
                  VALUES('$title', '$category_id', '$image', ' $description',' $date ')") or die('query failed');

      if($add_article_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_title, $image_folder);
            $message[] = 'article added successfully!';
         }
      }else{
         $message[] = 'article could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `articles` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `articles` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_articles.php');
}

if(isset($_POST['update_article'])){

   $update_a_id = $_POST['update_a_id'];
   $update_title = $_POST['update_title'];
   $update_category_id = $_POST['update_category_id'];

   mysqli_query($conn, "UPDATE `articles` SET title = '$update_title', category_id = '$update_category_id' WHERE id = '$update_a_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_title = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `articles` SET image = '$update_image' WHERE id = '$update_a_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_title, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_articles.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>articles</title>

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="add-articles">

   <h1 class="title">read articles</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add article</h3>
      <input type="text" name="title" class="box" placeholder="enter article title" required>
      <input type="number" min="0" name="category_id" class="box" placeholder="enter article category_id" required>
      <input type="text" name="description" class="box" placeholder="enter article description" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add article" name="add_article" class="btn">
   </form>

</section>

<!-- show articles  -->

<section class="show-articles">

   <div class="box-container">

      <?php
         $select_articles = mysqli_query($conn, "SELECT * FROM `articles`") or die('query failed');
         if(mysqli_num_rows($select_articles) > 0){
            while($fetch_articles = mysqli_fetch_assoc($select_articles)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_articles['image']; ?>" alt="">
         <div class="title"><?php echo $fetch_articles['title']; ?></div>
         <div class="category_id">
            <?php 
            if($fetch_articles['category_id'] == 1){
               echo "Fun"; 
            }?></div>
         <a href="admin_articles.php?update=<?php echo $fetch_articles['id']; ?>" class="option-btn">update</a>
         <a href="admin_articles.php?delete=<?php echo $fetch_articles['id']; ?>" class="delete-btn" onclick="return confirm('delete this article?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no articles added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-article-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `articles` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_a_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_title" value="<?php echo $fetch_update['title']; ?>" class="box" required placeholder="enter article title">
      <input type="number" name="update_category_id" value="<?php echo $fetch_update['category_id']; ?>" min="0" class="box" required placeholder="enter article category_id">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_article" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-article-form").style.display = "none";</script>';
      }
   ?>

</section>

</body>
</html>