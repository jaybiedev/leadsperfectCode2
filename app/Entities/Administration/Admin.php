<?php namespace App\Entities\Administration;

use App\Entities\BaseEntity;

class Admin extends BaseEntity
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
    public $adminusergroup_id;

    // supporting
    public $adminusergroup;

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