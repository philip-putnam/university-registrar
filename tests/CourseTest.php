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

        function test_getAll()
        {
            //Arrange
            $name = "HIST100";
            $new_course = new Course($name);
            $new_course->save();

            $name2 = "SPAN200";
            $new_course2 = new Course($name2);
            $new_course2->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$new_course, $new_course2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "HIST100";
            $new_course = new Course($name);
            $new_course->save();

            //Act
            Course::deleteAll();
            $result = Course::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "HIST100";
            $id = 1;
            $new_course = new Course($name, $id);
            $new_course->save();

            $name2 = "SPAN200";
            $id2 = 2;
            $new_course2 = new Course($name2, $id2);
            $new_course2->save();

            //Act
            $result = Course::find($new_course->getId());

            //Assert
            $this->assertEquals($new_course, $result);
        }
    }
?>
