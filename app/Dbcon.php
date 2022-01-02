<?php
namespace Mlc\Oop;
if(!isset($_SESSION))
{
    session_start();
}

class Dbcon
{
    public function dbcon()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'oop';
        $link = mysqli_connect($host, $user, $password, $dbname);
        return $link;
    }
}