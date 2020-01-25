<?php namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class AdminRights extends BaseEntity
{
    public $adminrights_id;
    public $admin_id;
    public $module;
    public $medit;
    public $madd;
    public $delete;
    public $mview;
}