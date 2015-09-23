<?php
    class Contact {
        private $name;
        private $email;
        private $phone_number;

        function __construct($name, $email, $phone_number) {
            $this->name = $name;
            $this->email = $email;
            $this->phone_number = $phone_number;
        }

        function save()
        {
            array_push($_SESSION['contacts'], $this);
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function getName()
        {
            return $this->name;
        }

        function setEmail($email)
        {
            $this->email = $email;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setPhoneNumber($phone_number)
        {
            $this->phone_number = $phone_number;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        static function getAll()
        {
            return $_SESSION["contacts"];
        }

        static function deleteAll()
        {
            $_SESSION["contacts"] = array();
        }
    }
?>
