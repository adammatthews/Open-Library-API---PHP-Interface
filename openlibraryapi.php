<?php 
/**
*	Use the Open Library API to return details stored by the service for use. 
*	
*	@Author Adam Matthews
*	@Date 16/2/2013 (13/3/13)
*	
*	Contact Email: am559@kent.ac.uk
*
*	Usage: $book = new OpenLibrary();
*		   $book->getTitle()
*	
*/
class OpenLibrary{
	
	protected $ol;
	protected $isbn;
	
	function __construct($book_isbn){

	}
	
	/**
	* Set the ISBN to initiate the call to OL
	**/
	function setISBN($book_isbn){	
		$result = file_get_contents('http://openlibrary.org/api/books?bibkeys=ISBN:'.$book_isbn.'&format=json&jscmd=data');
		$this->ol = json_decode($result, TRUE);			
		$this->isbn = $book_isbn;
		
	}
	
	/*
	* Functions for returning publisher details
	*/
	
	/**
	*	Return publisher name
	*	@Author Adam Matthews
	*	@Date	16/2/13
	*/
	public function getPublisherName(){
		//@TODO This doesnt work yet - fix it.
		Return $this->ol["ISBN:".$this->isbn]["publishers"][0]["name"];	
	}	
	
	/**
	*	Return publish date. 
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getPublishDate(){
		return $this->ol["ISBN:".$this->isbn]["publish_date"];	
	}
	
	/*
	* Functions for returning identifiers
	*/
	
	/**
	*	Return OpenLibrary ID
	*	@Author Adam Matthews
	*	@Date	16/2/13
	*/
	public function getOpenLibraryID(){
		Return $this->ol["ISBN:".$this->isbn]["identifiers"]["openlibrary"][0];
	}
	
	/**
	*	Return ISBN 13
	*	@Author Adam Matthews
	*	@Date	16/2/13
	*/
	public function getISBN_13(){
		Return $this->ol["ISBN:".$this->isbn]["identifiers"]["isbn_13"][0];
	}
	
	/**
	*	Return ISBN 10
	*	@Author Adam Matthews
	*	@Date	16/2/13
	*/
	public function getISBN_10(){
		Return $this->ol["ISBN:".$this->isbn]["identifiers"]["isbn_10"][0];
	}
	
	/*
	* Functions for returning title and author and cover details
	*/
	
		
	/**
	*	Return Book title
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getTitle(){
		return $this->ol["ISBN:".$this->isbn]["title"];	
	}

	/**
	*	Return Book sub title
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getSubTitle(){
		return $this->ol["ISBN:".$this->isbn]["subtitle"];	
	}
	
	/**
	*	Return Book Large Cover URL. 
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getCover($size){
		if($size == "small")
			return $this->ol["ISBN:".$this->isbn]["cover"]["small"];
		if($size == "medium")
			return $this->ol["ISBN:".$this->isbn]["cover"]["medium"];	
		if($size == "large")
			return $this->ol["ISBN:".$this->isbn]["cover"]["large"];
		//if no matching size specified return an error
		return "Please use small, medium or large for getCover()";
	}
	
	/**
	*	Return Author name
	*	@Author Adam Matthews
	*	@Date	16/2/13
	*/
	public function getAuthorName(){
		return $this->ol["ISBN:".$this->isbn]["authors"][o]["name"];	
	}
}
?>