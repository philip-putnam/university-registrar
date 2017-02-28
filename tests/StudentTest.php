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

        function test_getName()
        {
            //Arrange
            $name = "Robert Smith";
            $robert = new Student($name);

            //Act
            $result = $robert->getName();

            //Assert
            $this->assertEquals('Robert Smith', $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "Robert Smith";
            $new_name = "Bob Smith";
            $robert = new Student($name);

            //Act
            $robert->setName($new_name);
            $result = $robert->getName();

            //Assert
            $this->assertEquals('Bob Smith', $result);
        }
    }


?>
