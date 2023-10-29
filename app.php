<?php
  require 'Course.php';
  require 'Student.php';

  function help() {
    echo "Grading system\n";
    echo "add-student [name] - Add student\n";
    echo "select-student [name] - Select a student\n";
    echo "add-grade [course] [grade] - Add a grade for a course for the current selected student\n";
    echo "end - Stop the program\n";
  }

  $student = null;
  $students = [];

  while (true) {

    echo "Input command:";
    $command = trim(fgets(STDIN));

    if ($command == "") {
      echo "Please enter a valid command\n";
      help();
    }
    if ($command == "help") {
      help();
    }
    if ($command == "end" || $command == "quit") {
      break;
    }
    if (str_starts_with($command, "add-student")) {
      $name = trim(substr($command, 11));
      $student = new Student(name: $name);
      array_push($students, $student);
    }
    if (str_starts_with($command, "select-student")) {
      $name = $trim(substr($command, 14));
      $student = null;
      foreach ($students as $object) {
        if ($object->name() === $course) {
            $student = $object;
        }
      }

      if ($student == null) {
        echo "Student ".$name." is selected\n";        
      } else {
        echo "Student ".$name." is not found\n";
      }
    }
    if (str_starts_with($command, "add-grade")) {
      $argPart = trim(substr($command, 9));
      $args = explode(" ", $argPart);

      if ($student == null) {
        echo "No student selected\n";
      } else {
        $student->addGrade(course: $args[0], grade: $args[1]);
      }
    }
  }

  $count = count($students);
  $keys = array_keys($students);

  for($i = 0; $i < $count; $i++) {
    $students[$keys[$i]]->totals();
  }      

  // $s = new Student(name: "Ivo");
  // $s->addGrade("Math", 7);
  // $s->addGrade("Math", 4);

  // $s->addGrade("Bio", 6);
  // $s->addGrade("Bio", 4);
  // $s->addGrade("Bio", 8);

  // echo $s -> totals();
?>
