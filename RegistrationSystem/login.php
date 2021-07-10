<?php
    session_unset();
    session_destroy();

    include('server.php');

    if(isset($_POST['GoogleSignIn']) && !isset($_SESSION['GoogleSignIn']) ){

       // $_SESSION['userid'] = $_POST["userid"];
       // $_SESSION['username'] = $_POST["username"];
      //  $_SESSION['email'] = $_POST["email"];
      //  $_SESSION['role'] = $_POST["role"];
       // $_SESSION['success'] = "You are now logged in";

        //------------------------------------------------------
        $db = mysqli_connect('localhost', 'root', $db_password, 'registration');

        $username = $_POST["username"];
        $email =$_POST["email"];
        $password=$_POST["userid"];

        $MySQLquery = "SELECT * FROM users WHERE username='$username' AND email='$email'";
        $results = mysqli_query($db, $MySQLquery);

        if (mysqli_num_rows($results) < 1)
        {
            $password = md5($password); //encrypt the password before saving in the database
            $MySQLquery = "INSERT INTO users (username, password, role, email)
                                    VALUES ('$username', '$password', 'user', '$email')";
            mysqli_query($db, $MySQLquery);

            $MySQLquery ="SELECT * FROM users WHERE username='$username' AND email='$email'";
            $results = mysqli_query($db, $MySQLquery);

        }

        while ($row = mysqli_fetch_assoc($results))
        {
            $_SESSION['GoogleSignIn'] = $_POST["GoogleSignIn"];
            $_SESSION['imageProfile'] = $_POST["image"];
            $_SESSION['userid'] = $row["id"];
            $_SESSION['username'] = $row["username"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['role'] = $row["role"];

            $_SESSION['success'] = "You are now logged in";
        }

        echo "Google";
        exit;
        //------------------------------------------------------
    }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="124719712444-ahjch8ggq6sgu1m8m78e4qug4qcn863o.apps.googleusercontent.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

	<div style="width:100%; padding:10px; background-color:white;">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/search">
        <div style="background-color:white; width:100%;padding:5px; border-radius:10px; ">
            <img src="../images/envri_logo_final.png" style="width:65px; height:50px;" />
        </div>
      </a>
	</div>


	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group" style="text-align:center;">
			<div> <button type="submit" class="btn btn-primary"  name="login_user" style="width:150px; margin:5px;" >Login</button> </div>
			<div  onclick="ClickLogin()" class="g-signin2" data-onsuccess="onSignIn"  style="width:150px;margin:5px; display:inline-block;"></div>
		</div>
	</form>

<script>

    var clicked=false;//Global Variable
    function ClickLogin()
    {
        clicked=true;
    }

    function onSignIn(googleUser) {

    if (clicked) {

            var profile = googleUser.getBasicProfile();

            $.ajax({
                  type: 'post',
                  data:{
                        GoogleSignIn: "Google",
                        userid: profile.getId(),
                        username: profile.getName(),
                        email: profile.getEmail(),
                        image: profile.getImageUrl(),
                        role: "user"
                  },
                  success: function(response){

                        if(response==="Google"){
                            window.location.replace("/search");
                        }
                  }
            });

        }
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
    }

</script>


</body>
</html>






