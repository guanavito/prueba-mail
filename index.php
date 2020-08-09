<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- start header div -->
  <div id="header">
    <h3>NETTUTS > Sign up</h3>
  </div>
  <!-- end header div -->

  <!-- start wrap div -->
  <div id="wrap">

    <!-- start php code -->
    <?php
    if (isset($_POST['name']) && !empty($_POST['name']) and (isset($_POST['email']) && !empty($_POST['email']))) {
      // Form Submited
      $name = $_POST['name']; // Turn our post into a local variable
      $email = $_POST['email']; // Turn our post into a local variable
    }

    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';

    $msqli =  new mysqli('localhost', 'root', '');
    $msqli->select_db('emailuser');


    // Return Success - Valid Email
    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';

    $hash = md5(rand(0, 1000)); // Generate random 32 character hash and assign it to a local variable.
    // Example output: f4552671f8909587cf485ea990207f3b

    $password = rand(1000, 5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
    // Example output: 4568

    $msqli->query(" INSERT INTO users (username, password, email, hash) VALUES( '$name' , 'md5($password)', '$email', '$hash') ");

    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: ' . $name . '
Password: ' . $password . '
------------------------
 
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email=' . $email . '&hash=' . $hash . '
 
'; // Our message above including the link

    $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    ?>
    <!-- stop php code -->

    <!-- title and description -->
    <h3>Signup Form</h3>
    <p>Please enter your name and email addres to create your account</p>

    <!-- start sign up form -->
    <form action="" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" value="" />
      <label for="email">Email:</label>
      <input type="text" name="email" value="" />

      <input type="submit" class="submit_button" value="Sign up" />
    </form>
    <!-- end sign up form -->

  </div>
  <!-- end wrap div -->

</body>

</html>