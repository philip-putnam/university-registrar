<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost:8889;dbname=university_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    require_once 'src/Course.php';
    require_once 'src/Student.php';
    require_once 'src/Professor.php';

    class ProfessorTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $name = "John Wilkins";
            $id = 123;
            $professor = new Professor($name, $id);

            //Act
            $result = $professor->getId();

            //Assert
            $this->assertEquals(123, $result);
        }

        function test_getName()
        {
            //Arrange
            $name = "John Wilkins";
            $id = 123;
            $new_professor = new Professor($name, $id);

            //Act
            $result = $new_professor->getName();

            //Assert
            $this->assertEquals("John Wilkins", $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "John Wilkins";
            $id = 123;
            $new_name = "Susan Wilkins";
            $new_professor = new Professor($name, $id);

            //Act
            $new_professor->setName($new_name);
            $result = $new_professor->getName();

            //Assert
            $this->assertEquals("Susan Wilkins", $result);
        }
    }

?>
