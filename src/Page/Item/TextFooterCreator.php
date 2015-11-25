<?php
namespace TygrolewGmail\Page\Item;

class TextFooterCreator implements IFooterCreator
{
  private $author;
  private $year;
  private $footer;
  private $footerContent;

  public function __construct($author = null, $year = null)
  {
    $this->author = $author;
    $this->year = $year;
    $this->createFooter();
  }

  public function getFooter()
  {
    return $this->footer;
  }

  protected function createFooter()
  {
    $this->createFooterContent();
    $this->footer = "<hr/>\n<div>" . $this->footerContent . "</div>\n";
  }

  protected function createFooterContent()
  {
    if ($this->year !== null) {
      $year = $this->year;
    }
    else {
      $year = date("Y"); // current year
    }
    if ($this->author !== null) {
      $this->footerContent = "&copy; " . $year . " ". $this->author;
    }
    else {
      $this->footerContent = "Footer";
    }
  }
}
