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
        $emailsInput = $_POST['emails'] ?? [];
        $emails = array_map('trim', explode(',', $emailsInput));

        //adding config is optional
        $config = [
            'checkMxRecords' => true,
            'checkBannedListedEmail' => true,
            'checkDisposableEmail' => true,
            'checkFreeEmail' => false,
        ];

        // Instantiate the EmailValidator
        $validator = new EmailValidator($config);

        // Validate the email
        $results = $validator->validate($emails);

        // Prepare results in session for display on result page
        $_SESSION['email_validation_results'] = []; // Initialize results array in session
        foreach ($results as $email => $result) {
            $_SESSION['email_validation_results'][] = [
                'email' => $email,
                'status' => $result['isValid'] ? 'success' : 'error',
                'message' => $result['isValid'] ? "The email '$email' is valid." : "'$email' - ".$result['message']
            ];
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