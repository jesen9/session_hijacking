<?php
    session_start();
    include 'db_connect.php';

//    if(isset($_SESSION['']))

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<style>
    thead, tbody {
        font-size: 1.2rem;
    }
</style>

<body>

<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th colspan="3"><h1>Login</h1></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="username">Username</label></td>
                <td width="3%">&nbsp;</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td width="3%">&nbsp;</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center"><button name="login">login</button></td>
            </tr>
        </tbody>
    </table>
</form>

</body>
</html>

<?php
    if(isset($_POST["login"]))
    {
        // var_dump($hashed_password);
        $login = $db_connect->prepare("SELECT * FROM user WHERE Username = ? AND Password = ?");
        echo var_export($db_connect->error);
        $login->bind_param('ss', $username, $password);

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        echo $username;
        echo '<br>';
        echo $password;
        echo '<br>';
        $login->execute();
        $result = $login->get_result();

        $match = $result->num_rows;
        echo 'ni match: '.$match.'<br>';

        if($match==1)
        {
            $acc = $result->fetch_assoc();
            $_SESSION['client_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['last_login'] = time();
            echo '<pre>';
            echo var_dump($_SESSION);
            echo '<br>';
            echo var_dump($_SERVER);
            echo '</pre>';
            die;

        }
        else
        {
            echo "<script>alert('Incorrect email or password!')</script>";
            echo "<script>location='login.php</script>";
        }
    }
?>
