<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class User extends BaseEntity
{
    public $admin_id;
    public $username;
    public $name;
    public $mpassword;
    public $usergroup;
    public $enable;
    public $password_hash;
    public $date_created;
    public $date_updated;
    public $date_deleted;

    public function setPassword(string $password)
    {
        $this->password_hash = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function createdOn($format = "Y-m-d")
    {
        $date = new \DateTime($this->created_at);
        return $date->format($format);
    }

}