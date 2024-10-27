<?php
namespace App\Controller;

use EzeanyimHenry\EmailValidator\EmailValidator;
use Router\Router;

class HomeController
{
    public function form()
    {
        require 'views/form.php';
    }

    public function validateEmail()
    {
        $email = $_POST['email'] ?? '';

        // Instantiate the EmailValidator
        $validator = new EmailValidator();

        // Validate the email
        $result = $validator->validate($email);

        // Check if the email is valid
        if ($result['isValid']) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = "The email '$email' is valid.";
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = $result['message'];
        }

        // Redirect to the result page to display the validation result
        $router = new Router();
        $router->redirect('/result');
    }

    public function result()
    {
        require 'views/result.php';
    }
}