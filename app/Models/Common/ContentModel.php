<?php namespace App\Models\Common;

use App\Models\BaseModel;

class ContentModel extends BaseModel
{
        protected $table      = 'content';
        protected $primaryKey = 'id';

        protected $returnType = "App\Entities\Common\Content";
        protected $useSoftDeletes = true;

        protected $allowedFields = ['content', 'content_type'];

        protected $useTimestamps = true;

        protected $validationRules    = [];
        protected $validationMessages = [];
}