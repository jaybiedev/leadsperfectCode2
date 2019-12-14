<?php namespace App\Models\Finance;

class MenuModel extends \App\Models\Common\MenuModel 
{
    //
    public function getMenu($router = 'Finance')
    {
        return parent::getMenu("Finance");
    }
}