<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
        form {
  display: flex;
  flex-direction: column;
  align-items: center;
  border: solid 2px gray;
 background-color: gray;
 color: white;
  width: 500px;
  height: 300px;
  margin-left: 400px;
}

div {
  display: flex;
  flex-direction: row;
  margin: 10px;
}

label {
  margin-right: 10px;
  width: 100px;
  text-align: right;
  margin-top: 10px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 200px;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-top: 10px;
}

button {
  margin: 10px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}
    </style>
</head>
<body>
<?php


function validate_signup_form($firstname, $lastname, $email, $password) {
    // Initialize an array to store error messages
    $errors = array();

    // Validate first name
    if (empty($firstname)) {
        $errors[] = "First name is required";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $errors[] = "First name can only contain letters and spaces";
    }

    // Validate last name
    if (empty($lastname)) {
        $errors[] = "Last name is required";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $errors[] = "Last name can only contain letters and spaces";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    } else if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // Check for any errors and return them
    if (!empty($errors)) {
        return $errors;
    }

    // If there are no errors, return the submitted form data
    $form_data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password
    );
    return $form_data;
}
?>

<form method="post" action="">
  <div>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="firstname" required>
  </div>
  <div>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="lastname" required>
  </div>
  <div>
    <label for="work_email">Work Email:</label>
    <input type="email" id="work_email" name="workemail" required>
  </div>
  <div>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" minlength="8" required>
  </div>
  <button type="submit">Sign Up</button>
</form>
<br>
<br>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['workemail'];
    $password = $_POST['password'];

    // Validate the form data
    $form_data = validate_signup_form($firstname, $lastname, $email, $password);
?>

    <table border="1" cellspacing="0" align="center" cellpadding="10" class="tableStyle table-striped">
    <tr>
        <td>Firstname</td>
        <td>Lastname</td>
        <td>Email</td>
        <td>Password</td>

    </tr>
    <?php foreach ($form_data as $errors) { ?>
        <tr>
            <td>
                <?php echo  $form_data['firstname']; ?>
            </td>
            <td>
                <?php echo $form_data['lastname'] ; ?>
            </td>
            <td>
                <?php echo $form_data['email']; ?>
            </td>
            <td>
                <?php echo $form_data['password']; ?>
            </td>
        </tr>
        <?php break ?>
    <?php } ?>
</table>
<?php } ;
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $firstname = $_POST['firstname'];
//     $lastname = $_POST['lastname'];
//     $email = $_POST['workemail'];
//     $password = $_POST['password'];

//  $form_data = validate_signup_form($firstname, $lastname, $email, $password);}
?>

</body>
</html>
