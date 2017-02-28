<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    $server = 'mysql:host=localhost:8889;dbname=university_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    require_once 'src/Student.php';
    require_once 'src/Course.php';

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Course::deleteAll();
            Student::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $id = 42;
            $robert = new Student($name, $enrollment_date, $id);

            //Act
            $result = $robert->getId();

            //Assert
            $this->assertEquals(42, $result);
        }

        function test_getName()
        {
            //Arrange
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);

            //Act
            $result = $robert->getName();

            //Assert
            $this->assertEquals('Robert Smith', $result);
        }
        //
        function test_setName()
        {
            //Arrange
            $name = "Robert Smith";
            $new_name = "Bob Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);

            //Act
            $robert->setName($new_name);
            $result = $robert->getName();

            //Assert
            $this->assertEquals('Bob Smith', $result);
        }

        function test_save()
        {
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals($robert, $result[0]);
        }

        function test_getAll()
        {
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            $name2 = "Bill Jones";
            $bill = new Student($name2, $enrollment_date);
            $bill->save();

            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$robert, $bill], $result);
        }

        function test_deleteAll()
        {
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            $name2 = "Bill Jones";
            $bill = new Student($name2, $enrollment_date);
            $bill->save();

            //Act
            Student::deleteAll();
            $result = Student::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_delete()
        {
            //Arrange
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            $name2 = "Bill Jones";
            $bill = new Student($name2, $enrollment_date);
            $bill->save();

            //Act
            $robert->delete();
            $result = Student::getAll();

            //Assert
            $this->assertEquals($bill, $result[0]);
        }

        function test_find()
        {
            //Arrange
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            $name2 = "Bill Jones";
            $bill = new Student($name2, $enrollment_date);
            $bill->save();

            //Act
            $result = Student::find($bill->getId());

            //Assert
            $this->assertEquals($bill, $result);
        }

        function test_addCourse()
        {
            //Arrange
            $name = "Robert Smith";
            $enrollment_date = '0000-00-00';
            $robert = new Student($name, $enrollment_date);
            $robert->save();

            $name = "HIST100";
            $new_course = new Course($name);
            $new_course->save();

            //Act
            $robert->addCourse($new_course);
            $result = $robert->getCourse();

            //Assert
            $this->assertEquals([$new_course], $result);
        }
    }


?>
