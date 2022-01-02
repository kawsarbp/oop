<?php
namespace Mlc\Oop;
use Mlc\Oop\Dbcon;
class Login
{
    public function logincheck($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $enc_pwd = md5($password);

        $input_error = array();
        if(empty($username))
        {
            $input_error['username'] = "Username Field is required!";
        }
        if(empty($password))
        {
            $input_error['password'] = "Password Field is required!";
        }

        if(count($input_error) == 0)
        {

            $result = mysqli_query(Dbcon::dbcon(),"SELECT * FROM `users` WHERE `username`='$username' AND `password`='$enc_pwd'");

            if($result)
            {
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result);

                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['name'] = $row['name'];
                    header("Location: index.php");
                }
                else
                {

                    $_SESSION['login_error'] = "Username Or Password Invalid!";
                    header("Location: login.php");
                }
            }
            else
            {
                die();
            }
        }

       $_SESSION['err'] = $input_error;
       header("location: login.php");
    }
}