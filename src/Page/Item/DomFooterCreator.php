<?php
namespace TygrolewGmail\Page\Item;

class DomFooterCreator implements IFooterCreator
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

    $dom  = new \DOMDocument();
    $frag = $dom->createDocumentFragment();
    $frag->appendXML('<hr/>');
    $div  = $dom->createElement('div');
    $text = $dom->createTextNode( $this->footerContent );
    $attr = $dom->createAttribute('class');
    $attr->value = "footer";
    $div->appendChild($text);
    $div->appendChild($attr);
    $frag->appendChild($div);
    $dom->appendChild($frag);

    $this->footer = $dom->saveHTML();
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
      $this->footerContent = "© " . $year . " ". $this->author;
    }
    else {
      $this->footerContent = "Footer";
    }
  }
}
