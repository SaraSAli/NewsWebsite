
    <?php include('./templates/header.php');?>
    <?php include('./config.php');?>
    <h3>
        TOP NEWS THIS WEEK
    </h3>
        <div class="content">
           
            <?php
 $query = "select * from articles";
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
<a href='details.php?id=$article_id'>
<img src='./uploaded_img/$img'>
</a>  
  <div class='text-content'>
    <span class='card-title'><strong>$article_title</strong></span>
  </div>
</div> 
        ";
  }}
?>


        </div>
    <div class="products2">
        <div class="hello">
        <h2>
            in case you missed it
        </h2>
        <div class="product1" id="huge">
            <img src="images/new9.jpg">
            <a href="#clicka">Proin interdum, ante ut sollicitudin commodo, tellus quam sagittis libero, at semper mauris velit a velit. Phasellus commodo turpis et lacinia posuere.</a>
        </div>
        <div class="product1">
            <img src="images/new11.jpg">
            <a href="#clicka" >Proin interdum, ante ut sollicitudin commodo, tellus quam sagittis libero, at semper mauris velit a velit.</a>
        </div>
        <div class="product1">
            <img src="images/new10.jpg">
            <a href="#clicka">Proin interdum, ante ut sollicitudin commodo, tellus quam sagittis libero, at semper mauris velit a velit. </a>
        </div>
    </div>
</div>
    <div class="blog">
        <h2>watch the reels</h2>
        <div class="posts">
        <div class="section" id="haaa">
            <iframe allowfullscreen="" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/r3hgsAXbvWc" width="100%" height="240px"></iframe>
                <div class="ari">
                    <h3 class="mm">on joe biden vs obama</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                    <a href="#" class="mhmm">
                        READ MORE <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
        </div>
    </div>
    <div class="posts">
        <div class="section">
            <iframe width="100%" height="240px" src="https://www.youtube.com/embed/YPJzjG-EjuE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="ari">
                    <h3 class="mm">what a nice gentleman</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                    <a href="#" class="mhmm">
                        READ MORE <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
        </div>
    </div>
    <div class="posts">
        <div class="section">
            <iframe allowfullscreen="" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/XB5HtKtGijY" width="100%" height="240px"></iframe>
                <div class="ari">
                    <h3 class="mm">corona varus...</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                    <a href="#" class="mhmm">
                        READ MORE <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
        </div>
    </div>
</div> 
<div class="blog">
    <div class="posts">
    <div class="section" id="haaa">
        <iframe allowfullscreen="" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/NWIToNmwuR4" width="100%" height="240px"></iframe>
            <div class="ari">
                <h3 class="mm">the WHITE house?!</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                <a href="#" class="mhmm">
                    READ MORE <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
    </div>
</div>
<div class="posts">
    <div class="section">
        <iframe width="100%" height="240px" src="https://www.youtube.com/embed/4XHmD7WLe-E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="ari">
                <h3 class="mm">who was in paris, mr trump?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                <a href="#" class="mhmm">
                    READ MORE <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
    </div>
</div>
<div class="posts">
    <div class="section">
        <iframe allowfullscreen="" allow="autoplay; encrypted-media" src="https://www.youtube.com/embed/BJ_Y5NZEEKM" width="100%" height="240px"></iframe>
            <div class="ari">
                <h3 class="mm">the culprit</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ea, quis magnam deserunt eius incidunt repellat molestiae.</p>
                <a href="#" class="mhmm">
                    READ MORE <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
    </div>
</div>
</div> 

<?php include('./templates/footer.php');?>