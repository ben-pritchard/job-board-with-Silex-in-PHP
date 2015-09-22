<?php
    class Contact {
        private $name;
        private $email;
        private $phone_number;

        function setName($name) {
            $this->name = $name;
        }

        function getName($name) {
            $this->name = $name;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function getEmail($email) {
            $this->email = $email;
        }

        function setPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }

        function getPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }
    }
?>
