<?php
namespace Mlc\Oop;
use Mlc\Oop\Dbcon;

class Blog
{
    public function addblog($data)
    {

        $cat_id = $data['cat_id'];
        $title = $data['title'];
        $content = mysqli_real_escape_string(Dbcon::dbcon(),$data['content']);
        $status = $data['status'];
        $name = $_SESSION['name'];

        $file = explode('.',$_FILES['photo']['name']);
        $file_ex = end($file);
        $photo = date('Ymdhis.').$file_ex;

        if(!empty($_FILES['photo']['name']) && !empty($cat_id) && !empty($title) && !empty($content) &&  !empty($name) )
        {
            $result = mysqli_query(Dbcon::dbcon(), "INSERT INTO `blog`(`cat_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$cat_id','$title','$content','$photo','$name','$status')");
            if($result)
            {
                move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/'.$photo);
                $_SESSION['blog_success'] = 'Category Add Successfully!';
                header('Location: add_blog.php');
            }
            else
            {
                $_SESSION['cat_blog'] = 'Category Not Added!';
                header('Location: add_blog.php');
            }
        }
    }

    public function showblog()
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT `blog`.*, `category`.`category_name` FROM `blog` INNER JOIN `category` ON `blog`.`cat_id` = `category`.`id` ORDER BY `id` DESC");
    }
    public function inactiveb($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"UPDATE `blog` SET `status`='0' WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_blog.php');
        }
    }
    public function activeb($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"UPDATE `blog` SET `status`='1' WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_blog.php');
        }
    }
    public function deleteblog($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"DELETE FROM `blog` WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_blog.php');
        }
    }

    public function selectBlog($id = '')
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `blog` WHERE `id`='$id'");
    }
    public function activeblog()
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `blog` WHERE `status` = '1'");
    }
    public function ShowBlogPost($id)
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `blog` WHERE `status` = '1' AND `cat_id` = '$id' ORDER BY `id` DESC ");
    }

    public function updateBlog($data)
    {
        $cat_id = $data['cat_id'];
        $title = $data['title'];
        $content = mysqli_real_escape_string(Dbcon::dbcon(),$data['content']);
        $status = $data['status'];
        $name = $_SESSION['name'];
        $id = $data['id'];

        $file = explode('.',$_FILES['photo']['name']);
        $file_ex = end($file);
        $photo = date('Ymdhis.').$file_ex;


        if($_FILES['photo']['name'] == NULL)
        {
            $result = mysqli_query(Dbcon::dbcon(), "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`name`='$name',`status`='$status' WHERE `id`='$id'");
        }
        else
        {
            $result = mysqli_query(Dbcon::dbcon(), "UPDATE `blog` SET `cat_id`='$cat_id',`title`='$title',`content`='$content',`photo`='$photo',`name`='$name',`status`='$status' WHERE `id`='$id'");
        }
        if($result)
        {
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$photo);
            $_SESSION['blog_update'] = 'Category Update Successfully!';
            header('Location: edit_blog.php?id='.base64_encode($id));
        }
        else
        {
            $_SESSION['blog_notupdate'] = 'Category Not Update!';
            header('Location: edit_blog.php?id='.base64_encode($id));
        }
    }
}