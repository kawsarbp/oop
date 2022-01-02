<?php
if(!isset($_SESSION))
{
    session_start();
}
include __DIR__ . '/../vendor/autoload.php';

$login = new \Mlc\Oop\Login();
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();

if(isset($_POST['login']))
{
    $login->logincheck($_POST);
}
if(isset($_POST['add_category']))
{
    $category->addcategory($_POST);
}
if(isset($_POST['update_category']))
{
    $category->update_cat($_POST);
}
if(isset($_POST['add_blog']))
{
    $blog->addblog($_POST);
}
if(isset($_POST['update_blog']))
{
    $blog->updateBlog($_POST);
}
?>