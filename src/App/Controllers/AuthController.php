<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../../PHPMailer/src/Exception.php';
require __DIR__ . '/../../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../PHPMailer/src/SMTP.php';

class AuthController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private UserService $userService
  ) {
  }

  public function registerView()
  {
    echo $this->view->render("register.php");
  }

  public function register()
  {
    $this->validatorService->validateRegister($_POST);

    $this->userService->isEmailTaken($_POST['email']);
      $mail = new PHPMailer(true);

      try {
          //Enable verbose debug output
          $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

          //Send using SMTP
          $mail->isSMTP();

          //Set the SMTP server to send through
          $mail->Host = 'smtp.gmail.com';

          //Enable SMTP authentication
          $mail->SMTPAuth = true;

          //SMTP username
          $mail->Username = 'altynbek290697@gmail.com';

          //SMTP password
          $mail->Password = 'tetkmlmuirvbzwwj';

          //Enable TLS encryption;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

          //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
          $mail->Port = 587;
          //Recipients
          $mail->setFrom('altynbek290697@gmail.com', 'localhost');
          //Add a recipient
          $mail->addAddress('altyn_312@mail.ru', 'Yo');
          //Set email format to HTML
          $mail->isHTML(true);
          $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

          $mail->Subject = 'Email verification';
          $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

          $mail->send();
//          $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
//
//          // connect with database
//          $conn = mysqli_connect("localhost:8889", "root", "root", "test");
//
//          // insert in users table
//          $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
//          mysqli_query($conn, $sql);
//          header("Location: email-verification.php?email=" . $email);
              $this->userService->create($_POST);
    redirectTo('/');

      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

  }

  public function loginView()
  {
    echo $this->view->render("login.php");
  }

  public function login()
  {
    $this->validatorService->validateLogin($_POST);

    $this->userService->login($_POST);

    redirectTo('/');
  }

  public function logout()
  {
    $this->userService->logout();

    redirectTo('/login');
  }
}
