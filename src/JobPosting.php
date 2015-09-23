<?php
    class JobPosting {
        private $title;
        private $description;
        private $Contact;

        function __construct($title, $description, $Contact) {
            $this->title = $title;
            $this->description = $description;
            $this->Contact = $Contact;
        }

        function save()
        {
            array_push($_SESSION['jobs'], $this);
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function getTitle() {
            return $this->title;
        }

        function setDescription($description) {
            $this->description = $description;
        }

        function getDescription() {
            return $this->description;
        }

        function setContact($contact) {
            $this->contact = $contact;
        }

        function getContact() {
            return $this->Contact;
        }

        static function getAll()
        {
            return $_SESSION["jobs"];
        }

        static function deleteAll()
        {
            $_SESSION['jobs'] = array();
        }
    }
?>
