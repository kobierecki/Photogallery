<section class="registration">
    <div class="section-header">
        <h1>Registration</h1> 
        <h6><a href="index.php">Home</a> &gt; <span>Register</span><h6>
    </div>
    <div class="underline"></div>
    <div class="container">
        <div class="row">
            <form method="post" id="register-form" action="register.php">
                <input type="text" name="fname" id="fname" placeholder="Enter first name"/>
                <input type="text" name="lname" id="lname" placeholder="Enter last name"/>
                <input type="text" name="username" id="username" placeholder="Enter username"/>
                <input type="email" name="email" id="email" placeholder="Enter your email"/>
                <input type="password" name="password" id="password" placeholder="Enter your password"/>
                <input type="password" name="password" id="password" placeholder="Confirm your password"/>
                <textarea name="bio" id="bio" placeholder="Enter your bio (optional)"></textarea>
                <input type="submit" id="submit" class="btn-submit" name="submit" value="Register">
            </form>
            <div id="error">

            </div>
            <div id="success">
            
            </div>
        </div>
    </div>
</section>

<?php

    $fname="";
    $lname="";
    $username="";
    $password="";
    $email="";
    $bio="";
    $uploads=0;
    $id="";
    $error= array();

    function sanitize($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST['submit'])) {

        // CHECK FIRST NAME 

        if(empty($_POST['fname'])) {
            $error[] = "First name required";
        } elseif (strlen($_POST['fname']) > 25) {
            $error[] = "First name should have a maximum of 25 characters";
        } else {
            $fname = sanitize($_POST['fname']);
        }

        // CHECK FIRST NAME 

        if(empty($_POST['lname'])) {
            $error[] = "Last name required";
        } elseif (strlen($_POST['lname']) > 25) {
            $error[] = "Last name should have a maximum of 25 characters";
        } else {
            $lname = sanitize($_POST['lname']);
        }

        // CHECK USERNAME

        if(empty($_POST['username'])) {
            $error[] = "Username required";
        } elseif (strlen($_POST['username']) > 25) {
            $error[] = "Username should have a maximum of 25 characters";
        } else {
            $fname = sanitize($_POST['username']);
        }

        // CHECK EMAIL


        if(empty($_POST['email'])) {
            $error[] = "Email required";
        } elseif (strlen($_POST['email']) > 50) {
            $error[] = "Email should have a maximum of 50 characters";
        } elseif (!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))) {
            $error[] = "Email is not valid";
        } else {
            $fname = sanitize($_POST['email']);
        }
        
        // CHECK PASSWORD 

        if(empty($_POST['password'])) {
            $error[] = "Pasword required";
        } elseif (strlen($_POST['password']) > 32) {
            $error[] = "Pasword should have a maximum of 32 characters";
        } else {
            $fname = sanitize($_POST['password']);
            if(!empty($_POST['confirm-password'])) {
                if ($_POST['password'] != $_POST['confirm-password']) {
                    $error[] = "Password and confirm password are not matching";
                }
            } else {
                $error[] = "Confrim your password";
            }
        }

        // CHECK BIO

        if(!empty($bio)) {
            $bio = sanitize($_POST['bio']);
        }

        // ERROR DISPLAY 

        if(count($error) == 0) {
            $checkusername = "select * from users where username = '$username'";
            $runqueryusername = mysql_query($checkusername);
            
            $checkemail = "select * from users where email = '$email'";
            $runqueryemail = mysql_query($checkemail);

            // REPEAT ERROR

            if (mysql_num_rows($runqueryusername) > 0) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo 'Username exists';?>");
                </script>
                <?php
            } elseif (mysql_num_rows($runqueryemail) > 0) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo 'Email exists';?>");
                </script>
                <?php
            } else {
                register($id, $fname, $lname, $username, $email, $password, $bio, $uploads); 
            }

        } else {
            foreach ($error as $value) {
                ?>
                <script type="text/javascript">
                    $('#error').append("<?php echo $value.'<br>';?>");
                </script>
                <?php
            }
        }
    }
?>