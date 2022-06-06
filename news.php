
    <?php include('./templates/header.php');?>
    <?php include('./config.php');?>
    <h3>
        TOP NEWS 
    </h3>
        <div class="content">
           
            <?php
 $query = "select * from articles where category_id =1 ";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $article_id = $row["id"]; 
    $article_title = $row["title"]; 
    $article_category = $row["category_id"]; 
    $desc = $row["description"]; 
    $img = $row["image"]; 
    echo "
<div class='card'>
<a href='details.php?id= $article_id'>
<img src='./uploaded_img/$img'>
</a>  
  <div class='text-content'>
    <span class='card-title'><strong>$article_title</strong></span>
  </div>
</div> 
        ";
  }}
?>
