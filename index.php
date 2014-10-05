<?php
require_once("openlibraryapi.php");
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
	echo "<img src=".$book->getCover("medium")." /><br />";
	echo $book->getPublishDate()."<br />";
	echo $book->getPublisherName() ."<br />";
	echo $book->getOpenLibraryID() ."<br />";
	echo $book->getISBN_13() ."<br />";
	echo $book->getISBN_10() ."<br />";
	echo $book->getAuthorName() ."<br />";


}
?>


<form action="index.php" method="GET">
	<input type="text" name="ISBN">
	<input type="submit" value="Get Book Details">
</form>


</body>
</html>