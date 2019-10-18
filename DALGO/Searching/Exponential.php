<?php
namespace Searching;

class Exponential{
  private $size;
  private $element;

  public function __construct($element){
    $this->element = $element;
  }

  public function isExist(iterable  $collection, $pos = false): int{
    $this->size = sizeof($collection) - 1;
    $i = 1;
    
    while($i <= $this->size && $collection[$i] <= $this->element)
      $i *= 2;

    return $this->binarySearch($collection, $i/2, min($i, $this->size), $pos);
  }

  private function binarySearch($collection, $first, $last, $pos){
    if($collection[$last] >= $this->element){
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
    return -1;
  }

}

//Find exist value with Binary search

$arr = [1,2,3,4,5,6,7,8,9];
$findElem = new Exponential(15);
echo $findElem->isExist($arr);