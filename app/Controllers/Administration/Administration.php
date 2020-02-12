<?php namespace App\Controllers\Administration;
use App\Controllers\BaseController;
use App\Libraries\Finance\Authenticate;
use App\Models\Common\SysConfigModel;
use App\Helpers\Utils;

class Administration extends AdministrationBaseController
{
    public function index() 
    {
        $data = [];
        $this->View->setPageTitle("Administration");
        
        return $this->View->render("Administration/index.tpl", $data);
    }

    public function generateModel() 
    {
        $table = $this->request->getPostGet('table');

        $db = \Config\Database::connect('default');

        $tableDictionay = $db->getFieldData($table);

       // Utils::pprint_r($tableDictionay);

        $ucTable = ucwords($table);

        $fields = [];
        foreach ($tableDictionay as $field) {
            $fields[] = $field->name;
        }
        $allowedFields = "\t'" . implode("',\n\t\t'", $fields) . "'";
        $entityPublicAttributes = "\tpublic $" . implode(";\n\tpublic $", $fields) . ";\n";
        $content =<<<HTML
<pre>
---- MODEL ---
namespace App\Models\Finance;

use App\Models\BaseModel;

class {$ucTable}Model extends BaseModel
{
    protected \$table      = '{$table}';
    protected \$primaryKey = '{$table}_id';

    protected \$returnType = 'App\Entities\Finance\\$ucTable';
    protected \$useSoftDeletes = true;

    protected \$allowedFields = [
            {$allowedFields}
        ];   
        
    protected \$useTimestamps = false;

    protected \$validationRules    = [];
    protected \$validationMessages = [];                 
}

-- ENTITY --

namespace App\Entities\Finance;

use App\Entities\BaseEntity;

class {$ucTable} extends BaseEntity
{
    {$entityPublicAttributes}
}
HTML;

        echo $content;
        die;
    }
}
