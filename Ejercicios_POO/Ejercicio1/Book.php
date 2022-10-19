<?php

class Book extends ReadingMaterial 
{
    private $chapter;
    private $author;

    public function __construct($capitulo,$author,$title,$pages,$price,$publisher)
    {
        $this->chapter=$capitulo;
        $this->author=$author;
        parent::__construct($title,$pages,$price,$publisher);
    }

    public function get_Chapter()
    {
            return $this->chapter;
    }

    public function set_Chapter($chapter)
    {
        $this->chapter=$chapter;
    }

    public function get_Author()
    {
        return $this->author;
    }

    public function set_Author($author)
    {
        $this->author=$author;
    }
}

?>