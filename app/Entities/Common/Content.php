<?php namespace App\Entities\Common;

use App\Entities\BaseEntity;

class Content extends BaseEntity
{
    public $id;
    public $content;
    public $content_type;
    public $date_created;
    public $date_updated;
    public $date_deleted;
}