<?php
namespace Searching;

class Jump{
  private $size;
  private $element;

  public function __construct($element){
    $this->element = $element;
  }

  public function isExist(iterable  $collection, $pos = false): int{
    $this->size = sizeof($collection);

    $first = 0;
    $last = sqrt($this->size);

    while(isset($collection[$last]) && $collection[$last] <= $this->element && $last < $this->size){
      $first = $last;
      $last +=  sqrt($this->size);
      if($last > $this->size - 1 )
        $last = $this->size;
    }

    for($i = $first; $i < $last; $i++){
      if($collection[$i] == $this->element)
        return $pos ? $i : 1;
    }

    return -1;
  }

}

//Find exist value with Jump search

$arr = [1,2,3,4,5,6,7,8,9];
$findElem = new Jump(7);
echo $findElem->isExist($arr, true);