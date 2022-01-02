<?php
namespace Mlc\Oop;
use Mlc\Oop\Dbcon;

class Category
{
    public function addcategory($data)
    {

        $category_name = $data['category_name'];
        $status = $data['status'];

        $result = mysqli_query(Dbcon::dbcon(), "INSERT INTO `category`(`category_name`, `status`) VALUES ('$category_name','$status')");
        if($result)
        {
            $_SESSION['cat_success'] = 'Category Add Successfully!';
            header('Location: add_category.php');
        }
        else
        {

            $_SESSION['cat_err'] = 'Category Not Added!';
            header('Location: add_category.php');
        }
    }

    public function allcategory()
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `category` ORDER BY `id` DESC");
    }
    public function allactivecategory()
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `category` WHERE `status`='1'");
    }
    public function inactive($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"UPDATE `category` SET `status`='0' WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_category.php');
        }
    }
    public function active($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"UPDATE `category` SET `status`='1' WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_category.php');
        }
    }

    public function deletecatagory($id)
    {
        $result = mysqli_query(Dbcon::dbcon(),"DELETE FROM `category` WHERE `id`='$id'");
        if ($result)
        {
            header('Location: manage_category.php');
        }
    }

    public function SelectUpdateData($id = '')
    {
        return mysqli_query(Dbcon::dbcon(), "SELECT * FROM `category` WHERE `id`='$id'");
    }

    public function update_cat($data)
    {
        $category_name = $data['category_name'];
        $status = $data['status'];
        $id = $data['id'];
        $result = mysqli_query(Dbcon::dbcon(), "UPDATE `category` SET `category_name`='$category_name',`status`='$status' WHERE `id`='$id'");
        if($result)
        {
            $_SESSION['cat_update'] = 'Category Update Successfully!';
            header('Location: edit_category.php?editid='.$id);
        }
        else
        {
            $_SESSION['cat_notupdate'] = 'Category Not Update!';
            header('Location: edit_category.php?editid='.$id);
        }
    }


}