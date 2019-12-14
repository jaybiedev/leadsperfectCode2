<?php
namespace App\Libraries\Common;

use App\Models\Common\UpgradeModel;
use CodeIgniter\Config\Config;

class Upgrade 
{
    private $db;
    private $product;

    public function __construct($product)
    {
        $this->db = \Config\Database::connect('default');
        $this->product = $product;
    }

    public function Run()
    {
        // check first if upgrade table
        if ($this->db->tableExists('upgrade') == false) 
            $this->createUpgradeTable();

        $upgrades_dir = APPPATH . "/Upgrades/{$this->product}/";
        $upgrades = glob($upgrades_dir . '*');

        $ran = [];
        foreach ($upgrades as $upgrade) 
        {
            $UpgradeModel = new UpgradeModel();
            $upgrade_basename = basename($upgrade);
            $records = $UpgradeModel->where(['upgrade' => $upgrade_basename, 'success'=>true])
                ->findAll();

            if (count($records) > 0)
                continue;

            $ran[] = $upgrade_basename;

            $pathinfo = pathinfo($upgrade_basename);
            if ($pathinfo['extension'] == 'sql' )
                $success = $this->executeSQLUpgrade($upgrade);
            else
                $success = $this->executePHPUpgrade($upgrade);


            // @todo: notification if process fails
            $data = array(
                'upgrade' => $upgrade_basename,
                'success' => $success,
                'log' => ''
            );

            $UpgradeModel->save($data);
        }

        //var_dump($ran);
        echo "<br />Upgrade done.";
    }


    private function executeSQLUpgrade($file) 
    {

        $sql_content = file_get_contents($file);
        $this->db->transStart();

        // run as the whole contents such as in functions
        if (strpos($file, 'AS_FILE') !== false)
        {
            $this->db->query($sql_content);
        }
        else
        {
            // break up sqls
            $sqls = preg_split("/;/", trim($sql_content), -1, PREG_SPLIT_NO_EMPTY);
            foreach ($sqls AS $sql) 
            {
                $this->db->query($sql);
            }
        }
        $this->db->transComplete();

        return $this->db->transStatus();
    }

    private function executePHPUpgrade($file) 
    {
        //
    }

    private function createUpgradeTable() 
    {
        if ($this->db->tableExists('upgrade'))
            return;

        $sql = "CREATE TABLE IF NOT EXISTS upgrade (
                id SERIAL,
                upgrade text NOT NULL,
                date_created timestamp without time zone DEFAULT now(),
                date_modified timestamp without time zone DEFAULT now(),
                date_deleted timestamp without time zone DEFAULT NULL,
                success boolean DEFAULT true,
                log_info text
            );";

        $this->db->query($sql);

        $sql = "CREATE INDEX IF NOT EXISTS upgrade_upgrade ON upgrade USING btree (upgrade);";
        $this->db->query($sql);
    }

    
    public function addAuditFields($tables = null)
    {
        if (empty($tables))
            $tables = $this->db->listTables();
        
        if (!is_array($tables))
            $tables = [$tables];


        foreach ($tables as $table)
        {
            $fields = $this->db->getFieldNames($table);
            $audit_sql = null;
            if (!in_array('date_created', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN date_created TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW();";

            if (!in_array('user_id_created', $fields))

            if (!in_array('date_modified', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN date_modified TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW();";

            if (!in_array('date_deleted', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN date_deleted TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW();";

            if (!in_array('user_id_created', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN user_id_created INT DEFAULT NULL;";

            if (!in_array('user_id_modified', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN user_id_modified INT DEFAULT NULL;";

            if (!in_array('user_id_deleted', $fields))
                $audit_sql .= " ALTER TABLE {$table} ADD COLUMN user_id_deleted INT DEFAULT NULL;";

            if (!empty($audit_sql))
                $this->db->query($audit_sql);

            if (in_array('enable', $fields))
            {
                if ($table == 'cache')
                    continue;

                $sql = "UPDATE {$table} SET date_deleted = NOW() WHERE (enable = 'N' OR enable='f') AND date_deleted IS NULL;";
                // $sql .= " ALTER TABLE {$table} DROP COLUMN enable";
                $this->db->query($sql);
            }
                
        }
        // 

    }
}