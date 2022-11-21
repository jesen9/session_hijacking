<?php
    session_start();
    include 'db_connect.php';
    include 'checkSessionValidity.php';

//    checkSessionValidity();

?>

<?php if(checkSessionValidity()){ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    
    <table>
        <thead>
        <tr>
            <th colspan="3"><h1>Welcome!</h1></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>IP Address</td>
            <td width="3%">:</td>
            <td><?php echo $_SESSION['client_ip'] ?></td>
        </tr>
        <tr>
            <td>User Agent</td>
            <td width="3%">:</td>
            <td><?php echo $_SESSION['user_agent'] ?></td>
        </tr>
        <tr>
            <td>User Agent Current</td>
            <td width="3%">:</td>
            <td><?php echo $_SERVER['HTTP_USER_AGENT'] ?></td>
        </tr>
        <tr>
            <td>Last Login</td>
            <td width="3%">:</td>
            <td><?php echo date('Y-m-d H:i:s \U\T\C', $_SESSION['last_login']) ?></td>
        </tr>
        <tr>
            <td>City</td>
            <td width="3%">:</td>
            <td><?php echo $_SESSION['city'] ?></td>
        </tr>
        <tr>
            <td>Postal Code</td>
            <td width="3%">:</td>
            <td><?php echo $_SESSION['postal_code'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <a href="logout.php">Log Out</a>

</body>
</html>
<?php } else {
    session_destroy();
    echo "<script>alert('Please Log in.')</script>";
    echo "<script>location='login.php'</script>";
}
?>