
<?php
    date_default_timezone_set('Africa/Cairo');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAS - Homepage</title>
    <link rel="stylesheet" href="website.css">
</head>
<body>

<div style="text-align: center;">
        <video class="video" src="projectvid.MOV" width="500" heigth="300" controls=""> </video>
</div>
</body>
</html>


<?php
echo "<form>

        <input type='hidden' name='uid' value='Anonymous'>
        <input type='hidden' name='date' value= ' " .date(' Y-m-d H:i:s '). " '> 
        <textarea name='message' ></textarea><br>
        <button name='submit' type='submit' >Commment</button>
        
        </form> ";
?>
