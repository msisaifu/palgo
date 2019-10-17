<?php
namespace Searching;

class Binary{
  private $size;
  private $element;

  public function __construct($element){
    $this->element = $element;
  }

  public function isExist(iterable  $collection, $pos = false): int{
    $this->size = sizeof($collection) - 1;

    $first = 0;
    $last = $this->size - 1;
    $middle = ($first+$last)/2;

    while($first <= $last){
      
      if($collection[$middle] == $this->element)
        return $pos ? $middle : 1;
      elseif($collection[$middle] < $this->element)
        $first = $middle + 1;
      else
        $last = $middle -1;

      $middle = ($first+$last)/2;
    }
    return -1;
  }

}

//Find exist value with Binary search

$arr = [1,2,3,4,5,6,7,8,9];
$findElem = new Binary(8);
echo $findElem->isExist($arr);

$arr = ['a', 'b', 'c', 'd'];
$findElem = new Binary('c');
echo $findElem->isExist($arr);
