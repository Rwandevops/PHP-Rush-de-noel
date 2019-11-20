<?php
class Viewuser extends Admin
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
         public function showSelfUser()
    {
        $datas=$this->getSelfUser();
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
}
