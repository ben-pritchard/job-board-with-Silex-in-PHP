<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";
    require_once __DIR__."/../src/JobPosting.php";

    session_start();
    if (empty($_SESSION['jobs'])) {
        $_SESSION['jobs'] = array();
        $_SESSION['contacts'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function() {

        // JobPosting::deleteAll();
        // Contact::deleteAll();

        // Can I surround this code in an if statement so it only shows when a form was filled out?
        $title = $_GET["title"];
        $description = $_GET["description"];
        $contact_name = $_GET["contact_name"];
        $contact_email = $_GET["contact_email"];
        $contact_phone = $_GET["contact_phone"];

        $contact = new Contact($contact_name, $contact_email, $contact_phone);
        $contact->save();

        $job_posting = new JobPosting($title, $description, $contact);
        $job_posting->save();

        $output = "";

        foreach(JobPosting::getAll() as $job) {
            $output = $output.
                "<p>Title: ".$job->getTitle().
                "<ul>
                    <li>Description: ".$job->getDescription()."</li>
                    <li>Contact Name: ".$job->getContact()->getName()."</li>
                </ul>
                </p>";
        }

        $output = $output."<a href='/post_job' class='btn'>Post a new job</a>";

        return $output;
    });

    $app->get("/post_job", function() {
        return "
            <html>
                <head>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                    <title>Post your job</title>
                </head>
                <body>
                    <div class='container'>
                        <h1>Enter job details:</h1>
                        <form action='/'>
                            <div class='form-group'>
                                <label for='title'>Title</label>
                                <input id='title' name='title' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='description'>Description</label>
                                <input id='description' name='description' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='contact_name'>Contact Name</label>
                                <input id='contact_name' name='contact_name' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='contact_email'>Contact Email</label>
                                <input id='contact_email' name='contact_email' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='contact_phone'>Contact Phone</label>
                                <input id='contact_phone' name='contact_phone' type='text'>
                            </div>
                            <button type='submit' class='btn-success'>Post Job</button>
                        </form>
                    </div>
                </body>
            </html>
        ";
    });

    return $app;
?>
