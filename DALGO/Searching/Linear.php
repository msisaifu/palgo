<?php
namespace Searching;

class Linear{
  private $size;
  private $element;

  public function __construct($element){
    $this->element = $element;
  }

  public function isExist(iterable  $collection): int{
    $this->size = sizeof($collection);
    for($i = 0; $i<$this->size; $i++){
      if($collection[$i] == $this->element){
        return 1;
      }
    }
    return -1;
  }

  public function isExistK(iterable  $collection, $strict = false): int{
    foreach ($collection as $key => $value) {
      if($strict){
        if($key === $this->element){
          return 1;
        }
      }else{
        if($key == $this->element){
          return 1;
        }
      }
    }
    return -1;
  }
}

//Find exist value from associative array

$arr = ['a' => 'hello', 'b' => 'find'];
$findElem = new Linear('a');
$findElem->isExistK($arr);

//Find exist value from indexing array

$arr = [1,5,7,8,9,4];
$findElem = new Linear(4);
$findElem->isExistK($arr);





