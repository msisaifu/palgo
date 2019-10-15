<?php
namespace Searching;

class Interpolation{
  private $size;
  private $element;

  public function __construct($element){
    $this->element = $element;
  }

  public function isExist(iterable  $collection, $pos = false): int{
    $this->size = sizeof($collection);

    $first = 0;
    $last = $this->size - 1;

    while($first <= $last){
      $position =(int) ($first + ((($last-$first)/($collection[$last] - $collection[$first])) * ($this->element-$collection[$first])));

      if($collection[$position] == $this->element)
        return $pos ? $position : 1;
      else
        if($collection[$position] < $this->element)
          $first = $position + 1;
        else
          $last = $position -1;
    }
    return -1;
  }

}

//Find exist value with Interpolation search

$arr = [1,2,3,4,5,6,7,8,9];
$findElem = new Interpolation(7);
echo $findElem->isExist($arr, true);