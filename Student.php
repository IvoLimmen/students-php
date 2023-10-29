<?php

class Student {
  protected string $name;
  protected $courses;

  public function __construct(string $name) {
    $this->name = $name;
    $this->courses = [];
  }

  public function name() {
    return $this->name;
  }

  public function addGrade($course, $grade) {
    $c = null;
    foreach ($this->courses as $object) {
      if ($object->name() === $course) {
          $c = $object;
      }
    }

    if ($c == null) {
      $c = new Course(name: $course);
      array_push($this->courses, $c);
    }

    $c->addGrade($grade);
  }

  public function totals() {
    $count = count($this->courses);
    $keys = array_keys($this->courses);
    echo "Grades for ".$this->name;
    for($i = 0; $i < $count; $i++) {
      $this->courses[$keys[$i]]->total();
    }      
  }
}  

?>
