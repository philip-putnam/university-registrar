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

    class CourseTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Course::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $name = "HIST100";
            $id = 123;
            $new_course = new Course($name, $id);

            //Act
            $result = $new_course->getId();

            //Assert
            $this->assertEquals(123, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "HIST100";
            $id = 123;
            $new_name = "SPAN200";
            $new_course = new Course($name, $id);

            //Act
            $new_course->setName($new_name);
            $result = $new_course->getName();

            //Assert
            $this->assertEquals("SPAN200", $result);
        }

        function test_save()
        {
            //Arrange
            $name = "HIST100";
            $new_course = new Course($name);
            $new_course->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals($new_course, $result[0]);
        }
    }
?>
