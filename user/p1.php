<html>

    <body>
        <?php
        $conn = mysqli_connect("localhost","root","wolwolf96","marathon") or die("Unable to connect to database".mysqli_error($con));
        
        $username = @$_POST["username"];
        $email = @$_POST["email"];
        $password = @$_POST["password"];
       
        $sql = "SELECT * FROM participants WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $part = mysqli_fetch_assoc($result);

        if (!$part)
        {
            $sql = "INSERT INTO participants (username, email, password)
                    VALUES ('$username', '$email', '$password')";
                    
                    if (mysqli_query($conn, $sql))
                    {
                        ?>
                        <script>
                        alert('Registration successful! you may proceed to login now. TQ.');
                        </script>
                        <?php
                        header('Location: http://erykayoda/web/user/succeedPage.php');
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
        }
        else
        {
            ?>
            <script>
            alert('Sorry, an account with Student ID <b><?php echo "".$_POST["stud_id"]."" ?></b> already exist.');
            </script>
            <?php
            header('Location: http://erykayoda/web/user/signup.php');
        }
        ?>
</body>
</html>