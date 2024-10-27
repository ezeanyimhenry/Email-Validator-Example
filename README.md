# Email Validator Example Project

This project demonstrates how to integrate and use the [Email Validator](https://packagist.org/packages/ezeanyimhenry/email-validator) package to validate email addresses in a PHP web application. The example includes a simple web form where users can submit one or multiple emails for validation, and the results are displayed on a separate page.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
  - [Configuration Options](#configuration-options)
  - [Validating Emails](#validating-emails)
- [Running the Project](#running-the-project)
- [License](#license)

## Installation

1. **Clone this repository**:

    ```bash
    git clone https://github.com/ezeanyimhenry/email-validator-example.git
    cd email-validator-example
    ```

2. **Install dependencies**:

    Ensure you have [Composer](https://getcomposer.org) installed, then run:

    ```bash
    composer install
    ```

3. **Add your Email Validator package** to `composer.json` dependencies:

    ```json
    "require": {
        "ezeanyimhenry/email-validator": "^1.1"
    }
    ```

4. **Run Composer update** to install the Email Validator package:

    ```bash
    composer update
    ```

## Usage

This example provides an interactive form where users can input emails to validate. Below is a breakdown of the key components.

### Configuration Options

The **Email Validator** package can be configured with the following options:

- `checkMxRecords`: Check if the email domain has valid MX records.
- `checkBannedListedEmail`: Flag emails from known banned domains.
- `checkDisposableEmail`: Detect disposable email addresses.
- `checkFreeEmail`: Detect free email providers, such as Gmail, Yahoo, etc.

### Validating Emails

**Single Email Validation**: Use the `validateSingle` method to validate a single email.

**Multiple Email Validation**: To validate multiple emails, pass them as an array to the `validate` method. Each email is validated with results returned for each.

#### Example Code

```php
<?php
require 'vendor/autoload.php';

use EzeanyimHenry\EmailValidator\EmailValidator;

// User-submitted emails (comma-separated)
$emailsInput = $_POST['emails'] ?? '';
$emails = array_map('trim', explode(',', $emailsInput));

$config = [
    'checkMxRecords' => true,
    'checkBannedListedEmail' => true,
    'checkDisposableEmail' => true,
    'checkFreeEmail' => false,
];

$validator = new EmailValidator($config);
$results = $validator->validate($emails);

foreach ($results as $email => $result) {
    echo "Email: $email - ";
    echo $result['isValid'] ? "Valid" : "Invalid ({$result['message']})";
    echo "<br>";
}
```

## Running the Project

1. **Start a PHP server**:

    ```bash
    php -S localhost:8000
    ```

2. **Access the project** in your browser at `http://localhost:8000`. Enter one or more emails (separated by commas) into the form and submit to view the validation results.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for full details.

