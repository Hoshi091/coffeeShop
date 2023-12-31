<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cafe House Template</title>
    <!--
    Cafe House Template
    http://www.templatemo.com/tm-466-cafe-house
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/templatemo-style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php



session_start();
const USERNAME = "admin";
const PASSWORD = "admin";

if(isset($_POST['login'])) {
    if($_POST['username'] == USERNAME && $_POST['password'] == PASSWORD) {
        $_SESSION['login'] = true;
        header("Location: menuActionsAdmin.php");
    } else {
        header("Location: login.php?error=1");
    }
}

if(isset($_GET['error'])) {
    echo "<p style='color: red'>Incorrect username or password</p><br>";
}
?>
<div class="container" style="margin-top: 5em; text-align: center">
    <h3>Welcome to the login page!</h3>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="username" value="" placeholder="Username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">
    </form>
</div>