<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['user_id']))
{
    header('Location: login.php');
}
$title = "Home";
require_once "includes/header.php";

?>

      <section id="main-content">
          <section class="wrapper site-min-height">
              <?= $title; ?>
          </section>
      </section>
<?php
require_once "includes/footer.php";
?>
