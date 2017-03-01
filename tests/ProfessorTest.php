<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    // $server = 'mysql:host=localhost:8889;dbname=university_test';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);
    //
    // require_once 'src/Course.php';
    // require_once 'src/Student.php';
    // require_once 'src/Professor.php';
    //
    // class ProfessorTest extends PHPUnit_Framework_TestCase
    // {
    //     protected function tearDown()
    //     {
    //         Professor::deleteAll();
    //         Student::deleteAll();
    //         Course::deleteAll();
    //     }
    //
    //     function test_getId()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $id = 123;
    //         $professor = new Professor($name, $id);
    //
    //         //Act
    //         $result = $professor->getId();
    //
    //         //Assert
    //         $this->assertEquals(123, $result);
    //     }
    //
    //     function test_getName()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //
    //         //Act
    //         $result = $professor->getName();
    //
    //         //Assert
    //         $this->assertEquals("John Wilkins", $result);
    //     }
    //
    //     function test_setName()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $new_name = "Susan Wilkins";
    //         $professor = new Professor($name);
    //
    //         //Act
    //         $professor->setName($new_name);
    //         $result = $professor->getName();
    //
    //         //Assert
    //         $this->assertEquals("Susan Wilkins", $result);
    //     }
    //
    //     function test_save()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         //Act
    //         $result = Professor::getAll();
    //
    //         //Assert
    //         $this->assertEquals([$professor], $result);
    //
    //     }
    //
    //     function test_getAll()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         $name2 = "Susan Smith";
    //         $professor2 = new Professor($name2);
    //         $professor2->save();
    //
    //         $name3 = "Jill Hill";
    //         $professor3 = new Professor($name3);
    //         $professor3->save();
    //
    //         //Act
    //         $result = Professor::getAll();
    //
    //         //Assert
    //         $this->assertEquals([$professor, $professor2, $professor3], $result);
    //
    //     }
    //
    //     function test_deleteAll()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         //Act
    //         Professor::deleteAll();
    //         $result = Professor::getAll();
    //
    //         //Assert
    //         $this->assertEquals([], $result);
    //
    //     }
    //
    //     function test_find()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         $name2 = "Susan Smith";
    //         $professor2 = new Professor($name2);
    //         $professor2->save();
    //
    //         $name3 = "Jill Hill";
    //         $professor3 = new Professor($name3);
    //         $professor3->save();
    //
    //         //Act
    //         $result = Professor::find($professor2->getId());
    //
    //         //Assert
    //         $this->assertEquals($professor2, $result);
    //     }
    //
    //     function test_delete()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         $name2 = "Susan Smith";
    //         $professor2 = new Professor($name2);
    //         $professor2->save();
    //
    //         $name3 = "Jill Hill";
    //         $professor3 = new Professor($name3);
    //         $professor3->save();
    //
    //         //Act
    //         $professor->delete();
    //         $result = Professor::getAll();
    //
    //         //Assert
    //         $this->assertEquals([$professor2, $professor3], $result);
    //     }
    //
    //     function test_addStudent()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         $student_name = "Sally Smith";
    //         $enrollment_date = '2015-09-25';
    //         $sally = new Student($student_name, $enrollment_date);
    //         $sally->save();
    //
    //         //Act
    //         $professor->addStudent($sally);
    //         $result = $professor->getStudents();
    //
    //         //Assert
    //         $this->assertEquals([$sally], $result);
    //     }
    //
    //     function test_getStudent()
    //     {
    //         //Arrange
    //         $name = "John Wilkins";
    //         $professor = new Professor($name);
    //         $professor->save();
    //
    //         $course = new Course('math');
    //         $course->addStudent($rodger);
    //
    //         $student_name3 = "Rodger Bleh";
    //         $enrollment_date3 = '2015-09-25';
    //         $rodger = new Student($student_name3, $enrollment_date3);
    //         $rodger->save();
    //
    //         //Act
    //         $professor->addStudent($sally);
    //         $professor->addStudent($bobby);
    //         $professor->addStudent($rodger);
    //         $result = $professor->getStudents();
    //
    //         //Assert
    //         $this->assertEquals([$sally, $bobby, $rodger], $result);
    //     }
    // }

?>
