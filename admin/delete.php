<?php
include __DIR__ . '/../vendor/autoload.php';
$category = new \Mlc\Oop\Category();
$blog = new \Mlc\Oop\Blog();

if(isset($_GET['delete']) && $_GET['cat'])
{
    $id = base64_decode($_GET['delete']);
    $category->deletecatagory($id);
}
if(isset($_GET['id']) && $_GET['blog'])
{
    $id = base64_decode($_GET['id']);
    $blog->deleteblog($id);
}