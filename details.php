<style type="text/css">
    body{
        height: 90%;
    }
</style>
<?php 

	include('config.php');

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM articles WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$article = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<?php include('./templates/header.php');?>



<div class="">
    <?php if($article){ ?>
        <h4><?php echo $article['title']; ?></h4>
        <img src="./uploaded_img/<?php echo $article['image'];?>" >
        <h4><?php echo $article['description']; ?></h4>

        <?php }?>
        
	</div>
    
    <?php include('./templates/footer.php');?>

