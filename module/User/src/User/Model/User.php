<?php
namespace User\Model;

class User
{
    public $id;
    public $email;
    public $password;
    public $full_name;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->password  = (isset($data['password'])) ? $data['password'] : null;
        $this->full_name  = (isset($data['full_name'])) ? $data['full_name'] : null;
    }
}