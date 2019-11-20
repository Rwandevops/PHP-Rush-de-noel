<?php
require_once("class_user.php");

class ViewUser extends User
{
    public function showAllUsers()
    {
        $datas=$this->getAllUsers();
        foreach ($datas as $data)
        {
            echo $data['id']."<br>";
            echo $data['username']."<br>";
            echo $data['password']."<br>";
            echo $data['email']."<br>";
            echo $data['admin']."<br>";
        }
    }
}