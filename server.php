<?php
session_start();
$username = "";
$name = "";
$phone = '';
$email = "";
$admin = '';
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);



    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username,name, phone, email, password) 
                          VALUES('$username','$name', '$phone', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}






if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


function displayUsers()
{
    global $db; // Access the global database connection variable

    $sql = "SELECT * FROM users";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {


        echo "Registered Students<hr color=`#000`>";
        echo "<table>";
        echo "<tr>
            <th>Username</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
          </tr>";


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <td>" . $row['username'] . "</td>
              <td> " . $row['name'] . "</td>
              <td> " . $row['phone'] . "</td>
              <td>" . $row['email'] . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    mysqli_free_result($result); // Free the result set memory
}

