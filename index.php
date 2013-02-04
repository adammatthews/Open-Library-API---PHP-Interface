<?php
require_once("grab.php");
?>
<html>
<head>
</head>

<body>
<?php 
if(!empty($_GET["ISBN"])){	
	$isbn = $_GET["ISBN"];

	$book = new Book($isbn);
	echo $book->getTitle() ."<br />";
	echo $book->getSubTitle() ."<br />";
	echo "<img src=".$book->getLargeCover()." /><br />";
	echo $book->getPublishDate()."<br />";
	echo $book->getPublisherName();
}
?>


<form action="index.php" method="GET">
	<input type="text" name="ISBN">
	<input type="submit" value="Get Book Details">
</form>


</body>
</html>