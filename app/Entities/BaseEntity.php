<?php namespace App\Entities;

use CodeIgniter\Entity;

class BaseEntity extends Entity
{
    // audits
    public $date_created;
    public $date_modified;
    public $date_deleted;
    public $user_id_created;
    public $user_id_modified;
    public $user_id_deleted;

    protected $dates = [
		'date_created',
		'date_modified',
		'date_deleted',
	];

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        //
    }

    public function populate()
    {
        $refl = new \ReflectionClass($this);
        foreach ($this->attributes as $attribute => $value)
        {
            if (!property_exists($this, $attribute))
                continue;
                
            $property = $refl->getProperty($attribute);
 
            if ($property instanceof \ReflectionProperty) 
            {
                $property->setValue($this, $value);
            }
        }

        return $this;
    }
}