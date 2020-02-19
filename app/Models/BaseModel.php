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
    protected $primaryKey = 'branch_id';
    protected $restoreIdentityKey = '';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $createdField = "date_created"; // datetime field for creatd time
    protected $updatedField = "date_modified"; // datetime field for updated time
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

    /**
     * @param string $name - should be based on Models/ directory
     */
    public static function factory($name) {

        $Model = null;
        $classFileName = APPPATH . "Models/{$name}Model.php";
       
        if (file_exists($classFileName)) {
            $class = "App\\Models\\" . str_replace("/", "\\", $name) . 'Model';
            $Model = new $class();
        }

        return $Model;
    }

    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    public function getRestoreIdentityKey() {
        return $this->restoreIdentityKey;
    }

    public function getTable() {
        return $this->table;
    }
    
    public function findAllArray($limit=null, $offset=null)
    {
        if ($this->returnType == 'array')
            return parent::findAll($limit, $offset);

        $tempReturnType = $this->tempReturnType;
        $this->tempReturnType = 'array';

        $items = parent::findAll($limit, $offset);
        $this->tempReturnType = $tempReturnType;

        return $items;
    }

    /**
	 * Works with the current Query Builder instance to return
	 * all results, while optionally limiting them.
	 *
	 * @param integer $limit
	 * @param integer $offset
	 *
	 * @return array|null
	 */
	public function findAllKeyed(int $limit = 0, int $offset = 0, $keyField=null)
	{
        $records = $this->findAll($limit, $offset);

        if (empty($keyField))
            return $records;

        $keyedRecords = [];
        foreach ($records as $record) {
            $keyedRecords[$record[$keyField]] = $record;
        }

        return $keyedRecords;
	}

    /**
     * field and searchValue or field={field=>value,...} array
     * each field is tied with OR 
     */
    public function ilike($field, string $match = '')
    {
        $insensitiveSearch = true;
        $escape = null;
        $side = 'both';
        return $this->orLike($field ,$match , $side, $escape, $insensitiveSearch);
    }

    /**
     * field and searchValue or field={field=>value,...} array
     * each field is tied with AND 
     */
    public function ilikeAnd($field, string $match = '')
    {
        $insensitiveSearch = true;
        $escape = null;
        $side = 'both';
        return $this->like($field ,$match , $side, $escape, $insensitiveSearch);
    }

    public function countResults($sql=null) {

        if (empty($sql)) {
            $lastQuery = $this->lastQuery->getQuery();
            $orderPosition = stripos($lastQuery, 'ORDER BY');
            if (!empty($orderPosition)) {
                $sql = substr($lastQuery, 0, $orderPosition -1);
            }
        }

        $sql = 'SELECT count(*) AS numrows  FROM (' . $sql . ') AS subsql';
        $query = $this->db->query($sql, null, false);
		if (empty($query->getResult()))
		{
			return 0;
		}

		$query = $query->getRow();

		return (int) $query->numrows;
    }

}