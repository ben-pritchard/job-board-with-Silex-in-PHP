<?php
    require_once __DIR__."/../vendor/autoload.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
            <html>
                <head>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                    <title>Home</title>
                </head>
                <body>
                    <div class='container'>
                        <a href='/post_job' class='btn'>Post a job</a>
                    </div>
                </body>
            </html>
        ";
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
                        </form>
                    </div>
                </body>
            </html>
        ";
    });

    return $app;
?>
