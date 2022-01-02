<?php
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['user_id']))
{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Login Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-body">
<div class="container">

    <form class="form-signin" action="action.php" method="POST">
        <h2 class="form-signin-heading">sign in now</h2>
        <?php if(isset($_SESSION['login_error'])) { ?>
            <div class="alert alert-warning alert-dismissible text-center fade show mb-0" role="alert">
                <strong><?= $_SESSION['login_error'] ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION['login_error']); } ?>
        <div class="login-wrap">
            <input type="text" class="form-control mb-0" name="username" placeholder="Username" autofocus>
            <?php if(isset($_SESSION['err']['username'])) { ?>
                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['err']['username']; ?></div>
            <?php } ?>
            <br>
            <input type="password" class="form-control mb-0" name="password" placeholder="Password">
            <?php if(isset($_SESSION['err']['password'])) { ?>
                <div style="color:red;font-style:italic; font-weight:bold;"><?= $_SESSION['err']['password']; ?></div>
            <?php } ?>
            <br>
            <button class="btn btn-lg btn-login btn-block" name="login" type="submit">Sign in</button>

            <div class="registration">
                Don't have an account yet?
                <a class="" href="register.php">
                    Create an account
                </a>
            </div>
        </div>

    </form>
</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
unset($_SESSION['err']);
?>