<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

abstract class BaseModel extends Model
{
        /*
        protected $db;
        protected $table      = 'users';

        protected $allowedFields = ['name', 'email'];
        protected $useTimestamps = false;
        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
        */

        protected $DBGroup = 'default';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = true;
        protected $createdField = "date_created"; // datetime field for creatd time
        protected $updatedField = "date_updated"; // datetime field for updated time
        protected $deletedField  = 'date_deleted';
        protected $useTimestamps = true;
        protected $skipValidation     = false;

        public function __construct()
        {
            if (empty($this->table))
                die("No table defined for " . __CLASS__);

            if (empty($this->allowedFields))
                die("No allowed fields defined for " . __CLASS__);

            parent::__construct();
        }

        public function findAllArray()
        {
            if ($this->returnType == 'array')
                return parent::findAll();

            $tempReturnType = $this->tempReturnType;
            $this->tempReturnType = 'array';

            $items = parent::findAll();
            $this->tempReturnType = $tempReturnType;

            return $items;
        }
}