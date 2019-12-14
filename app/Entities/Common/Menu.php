<?php namespace App\Entities\Common;

use App\Entities\BaseEntity;

class Menu extends BaseEntity
{
    public $id;
    public $menu;
    public $path;
    public $slug;
    public $parent_path;
    public $sort_order;

    public $children;
}