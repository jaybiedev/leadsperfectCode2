<?php namespace App\Models\Common;
use App\Models\BaseModel;

class UpgradeModel extends BaseModel 
{
    protected $table = 'upgrade';
    protected $allowedFields = ['upgrade', 'success', 'log_info'];
    protected $returnType = 'array';
}