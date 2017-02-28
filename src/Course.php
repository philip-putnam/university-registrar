<?php
    class Course
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO courses (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses;");
            $courses = array();

            foreach($returned_courses as $course) {
                $name = $course['name'];
                $id = $course['id'];
                $new_course = new Course($name, $id);
                array_push($courses, $new_course);
            }

            return $courses;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses;");
            $GLOBALS['DB']->exec("DELETE FROM students_courses;");
        }

        static function find($search_id)
        {
            $found_course = null;
            $courses = Course::getAll();

            foreach($courses as $course) {
                $course_id = $course->getId();
                if ($course_id == $search_id) {
                    $found_course = $course;
                }
            }

            return $found_course;
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM students_courses WHERE id = {$this->getId()};");
        }

        function addStudent($new_student)
        {
            $GLOBALS['DB']->exec("INSERT INTO students_courses (student_id, course_id) VALUES ({$new_student->getId()}, {$this->getId()});");
        }

        function getStudent()
        {
            $query = $GLOBALS['DB']->query("SELECT student_id FROM students_courses WHERE course_id = {$this->getId()};");
            $returned_student_ids = $query->fetchAll(PDO::FETCH_ASSOC);
            $students = array();

            foreach($returned_student_ids as $id) {
                $student_id = $id['student_id'];
                $result = $GLOBALS['DB']->query("SELECT * FROM students WHERE id = {$student_id};");

                $name = $result[0]['name'];
                $enrollment_date = $result[0]['enrollment_date'];
                $id = $result[0]['id'];
                $new_student = new Student($name, $enrollment_date, $id);
                array_push($students, $new_student);
            }

            return $students;
        }
    }

?>
