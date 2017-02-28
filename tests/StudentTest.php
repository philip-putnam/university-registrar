<?php
    require_once 'src/Student.php';

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            //Arrange
            $name = "Robert Smith";
            $id = 42;
            $robert = new Student($name, $id);

            //Act
            $result = $robert->getId();

            //Assert
            $this->assertEquals(42, $result);
        }
    }


?>
