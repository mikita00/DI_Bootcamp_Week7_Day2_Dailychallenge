<?php
/**
 * You are given a User class with the methods that set and get the user name and age.
 * Add code to the setName() method that throws the exception whenever the user’s name is shorter than 3 letters.
 * Add code to the setAge() method that throws the exception whenever the user’s age is less than or equal to zero.
 * In the test() method, feed the class with this nested array:
 * Write a foreach loop (like the one we’ve already used in this chapter) that feeds the array to the class and handles the exceptions by echoing the custom error messages as well as the file path in which the exception was thrown.
 * Ben is 4 years old. Eva is 28 years old. Error: The name should be at least 3 characters long in the file: /usercode/main.php. Error: The age cannot be zero or less in the file: /usercode/main.php. Sue is 1 years old.
 * 
 */

class User {
    private $name;
    private $age;
  
    public function setName($name) {

      $name = trim($name);
      $this -> name = $name;

      if ( strlen($this -> name) < 3 ) {

        throw new Exception ("The name should be at least 3 characters long");

      }

     
    }
  
    public function setAge($age) {

      $age = (int)$age;
      $this -> age = $age;
      
      if (( ($this -> age) <= 0 ) ) {

        throw new Exception ("The age cannot be zero or less");

      }

    }
  
    public function getName() {

      return $this -> name;

    }
  
    public function getAge() {

      return $this -> age;

    }


  }

  
  
  function test()
  {
    $dataForUsers = array(
      array("Ben",4),
      array("Eva",28),
      array("li",29),
      array("Catie","not yet born"),
      array("Sue",1.5)
  );

  $usersClass = new User;

  foreach( $dataForUsers as $element){
    try {
      $name = $element[0];
      $age = $element[1];

      $usersClass -> setName($name);
      $usersClass -> setAge($age);

      echo $usersClass -> getName()." is ".$usersClass -> getAge()." years old \n\n";


    }catch (Exception $e ){

      echo $e -> getMessage().' in the file '.$e -> getFile()."\n\n";
      
    }
    
  }

  }

  test()

?>