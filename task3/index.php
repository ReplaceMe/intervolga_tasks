<?php
	echo "<style>
	.comment {
  width: 15em;
  top: 50%;
  left: 50%;
  border: 1px solid #333;
  box-shadow: 8px 8px 5px #444;
  padding: 8px 12px;
  background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
}
</style>";

	require_once 'includes/connect.php';

	$table = $link->query("SELECT * FROM `comments`");
	$comments = $table->fetch_all();

	foreach($comments as $comment)
	{
		
		echo  "<div class = 'comment'><p><h5>{$comment[1]}({$comment[3]}): </h5> {$comment[2]}   </p></div>";

		echo "<br>";
		echo "<br>";
	}

?> 
<!DOCTYPE html> <html lang="en">
 <head> 
   <meta charset="utf-8">
   <title>Comments</title> 
   <link rel="stylesheet" href="assets/css/main.css"> 
</head> 
<body> 

   <form action="includes/add_to_table.php" method="post"> 
   <label>Name</label>
      <input type="text" name="name" placeholder="Input your name"> 
      <label>Comment</label> 
      <textarea name="message" style="width: 400px; height: 100px;" placeholder="Input your comment"></textarea>
      <button type="submit">Add</button> 
        </form>
    </body>
</html>
