<?php 
/**
*	Use the Open Library API to return details stored by the service for use. 
*	
*	@Author Adam Matthews
*	@Date 4/2/2013
*	
*	Contact Email: am559@kent.ac.uk
*
*	Usage: $book = new Book('ISBN');
*		   $book->getTitle()
*	
*/
class Book{
	
	protected $ol;
	protected $isbn;
	
	function __construct($book_isbn){
		$result = file_get_contents('http://openlibrary.org/api/books?bibkeys=ISBN:'.$book_isbn.'&format=json&jscmd=data');
		$this->ol = json_decode($result, TRUE);			
		$this->isbn = $book_isbn;
	}
		
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
	public function getLargeCover(){
		return $this->ol["ISBN:".$this->isbn]["cover"]["large"];	
	}
	
	/**
	*	Return publish date. 
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getPublishDate(){
		return $this->ol["ISBN:".$this->isbn]["publish_date"];	
	}
	
	/**
	*	Return publisher name
	*	@Author Adam Matthews
	*	@Date	4/2/13
	*/
	public function getPublisherName(){
		//@TODO This doesnt work yet - fix it.
		Return $this->ol["ISBN:".$this->isbn]["publishers"]["name"];	
	}

}
?>