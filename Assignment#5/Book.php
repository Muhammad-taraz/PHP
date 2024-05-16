<?php
class Book
{
    private $name;
    private $author_name;
    private $number_of_pages;
    private $publish_date;
    private $isbn;

    // Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;
    }

    public function setNumberOfPages($number_of_pages)
    {
        $this->number_of_pages = $number_of_pages;
    }

    public function setPublishDate($publish_date)
    {
        $this->publish_date = $publish_date;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    // Display Book details
    public function displayDetails($identifier)
    {
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<b>Book $identifier:</b><br>";
        echo "<b>Name:</b> " . $this->name . "<br>";
        echo "<b>Author:</b> " . $this->author_name . "<br>";
        echo "<b>Pages:</b> " . $this->number_of_pages . "<br>";
        echo "<b>Publish Date:</b> " . $this->publish_date . "<br>";
        echo "<b>ISBN:</b> " . $this->isbn . "<br>";
        echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
    }
}

$book1 = new Book();
$book1->setName("Arabic");
$book1->setAuthorName("Mufti Muneeb-ur-Rehman");
$book1->setNumberOfPages(154);
$book1->setPublishDate("1953-04-15");
$book1->setIsbn("978-0743273565");
$book1->displayDetails(1);

$book2 = new Book();
$book2->setName("Islamiat");
$book2->setAuthorName("Mufti Ibrahim");
$book2->setNumberOfPages(292);
$book2->setPublishDate("2005-05-04");
$book2->setIsbn("978-0061120084");
$book2->displayDetails(2);
