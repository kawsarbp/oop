<?php
include __DIR__.'/../vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();

if(isset($_GET['inactive']))
{
    $inactive = base64_decode($_GET['inactive']);
    $category->inactive($inactive);
}
if(isset($_GET['active']))
{
    $active = base64_decode($_GET['active']);
    $category->active($active);
}
if(isset($_GET['inactiveb']) && $_GET['blog'])
{
    $inactiveb = base64_decode($_GET['inactiveb']);
    $blog->inactiveb($inactiveb);
}
if(isset($_GET['activeb']) && $_GET['blog'])
{
    $activeb = base64_decode($_GET['activeb']);
    $blog->activeb($activeb);
}