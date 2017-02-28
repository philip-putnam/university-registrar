<?php
    class Professor
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
            $GLOBALS['DB']->exec("INSERT INTO professors (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM professors WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $returned_professors = $GLOBALS['DB']->query("SELECT * FROM professors;");

            $professors = [];
            foreach($returned_professors as $professor)
            {
                $name = $professor['name'];
                $id = $professor['id'];
                $new_professor = new Professor($name, $id);
                array_push($professors, $new_professor);
            }
            return $professors;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM professors;");
        }

        static function find($professor_id)
        {
            $professors = Professor::getAll();
            $found_professor = null;

            foreach($professors as $professor)
            {
                $id = $professor->getId();
                if ($id == $professor_id)
                {
                    $found_professor = $professor;
                }
            }
            return $found_professor;
        }

    }

?>
