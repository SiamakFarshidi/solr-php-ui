<?php

session_start();

$_SESSION = array();

$username = "";
$db_password = "fachmann573";
$email = "";
$errors = array();

// connect to database
$db = mysqli_connect('localhost', 'root', $db_password, 'registration');

if (!$db)
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL . "<br/>";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "<br/>";
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . "<br/>";

    if (mysqli_connect_errno() == "1049")
    {
        $db = mysqli_connect('localhost', 'root', $db_password);
        $sql = "CREATE DATABASE registration";
        if ($db->query($sql) === true)
        {
            echo "Database created successfully" . "<br/>";
            $db = mysqli_connect('localhost', 'root', $db_password, 'registration');
            $sql = "CREATE TABLE users (
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            username VARCHAR(50) NOT NULL,
                            password VARCHAR(50) NOT NULL,
                            role VARCHAR(10) NOT NULL,
                            email VARCHAR(50),
                            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        )";

            if ($db->query($sql) === true)
            {
                echo "Table users created successfully" . "<br/>";

                $sql = "INSERT INTO users (username, password, role, email)
                    VALUES ('admin', 'u1v2a3', 'admin', 'root@admin.nl');";

                $sql .= "INSERT INTO users (username, password, role, email)
                    VALUES ('user', 'user', 'user', 'user@user.nl');";

                if ($db->multi_query($sql) === true)
                {
                    echo "New records created successfully" . "<br/>";
                    header('location: login.php');
                }
                else
                {
                    echo "Error: " . $sql . "<br>" . $db->error . "<br/>";
                }
            }
            else
            {
                echo "Error creating table: " . $db->error . "<br/>";
            }
        }
        else
        {
            echo "Error creating database: " . $db->error . "<br/>";
        }
    }

    exit;
}
$db = mysqli_connect('localhost', 'root', $db_password, 'registration');

// REGISTER USER
if (isset($_POST['reg_user']))
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($username))
    {
        array_push($errors, "Username is required");
    }
    if (empty($email))
    {
        array_push($errors, "Email is required");
    }
    if (empty($password_1))
    {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2)
    {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0)
    {
        $password = md5($password_1); //encrypt the password before saving in the database
        $MySQLquery = "INSERT INTO users (username, password, role, email)
                            VALUES ('$username', '$password', 'user', '$email')";

        mysqli_query($db, $MySQLquery);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: /search');
    }

}

// ...
// LOGIN USER
if (isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username))
    {
        array_push($errors, "Username is required");
    }
    if (empty($password))
    {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0)
    {
        //$password = md5($password);
        $MySQLquery = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $MySQLquery);

        if (mysqli_num_rows($results) == 1)
        {

            while ($row = mysqli_fetch_assoc($results))
            {
                $_SESSION['userid'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['role'] = $row["role"];
            }
            $_SESSION['success'] = "You are now logged in";

            header('location: /search');
        }
        else
        {
            echo $username;
            echo $password;
            array_push($errors, "Wrong username/password combination");
        }
    }
}

$db->close();

?>
