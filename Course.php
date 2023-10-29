<?php

class Course {
  protected string $name;
  protected $grades = array();

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function name() {
    return $this->name;
  }

  public function addGrade(float $grade) {
    array_push($this->grades, $grade);
  }

  public function total() {
    $total = array_sum($this->grades);
    $size = count($this->grades);
    $avg = $total / $size;
    echo $this->name." - ".$size." exams - ".$avg." avg\n";
  }
}  

?>
