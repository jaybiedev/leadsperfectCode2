<?php namespace App\Entities;

use CodeIgniter\Entity;

class BaseEntity extends Entity
{
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        //
    }
}