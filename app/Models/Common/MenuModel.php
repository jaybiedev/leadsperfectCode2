<?php namespace App\Models\Common;

use App\Models\BaseModel;

class MenuModel extends BaseModel
{
    protected $table      = 'content';
    protected $primaryKey = 'id';

    protected $returnType = "App\Entities\Common\Menu";
    protected $useSoftDeletes = true;

    protected $allowedFields = ['menu', 'path', 'sliug', 'parent_path', 'sort_order'];

    protected $useTimestamps = true;    
    
    public function getMenu($route = null) {

        $top = 'Top.' . ucwords($route);

        if (empty($top))
            return array();

        $sql = "
            WITH RECURSIVE node_rec AS (
            (SELECT 1 AS depth, ARRAY[id] AS menu_id, *
            FROM   menu
            WHERE  parent_id IS NULL
            )
            UNION ALL
            SELECT rec.depth + 1, rec.menu_id || menu.parent_id, menu.*
            FROM   node_rec rec
            JOIN   menu  ON menu.parent_id = rec.id
            WHERE  rec.depth < 4
            AND menu.path like '{$top}%'
            AND menu.enabled
            )
            SELECT *
            FROM   node_rec
            WHERE enabled AND path like '{$top}%'
            ORDER  BY parent_id  NULLS FIRST, sort_order;";

        // mysql
        // $sql = "SELECT * FROM menu WHERE date_deleted IS NULL ORDER BY path, sort_order ";

        // pgsql
        $sql = "SELECT * FROM menu WHERE path ~ '{$top}.*' AND date_deleted IS NULL ORDER BY path, sort_order ";
        $query = $this->db->query($sql);

        $menuArray = [];
        foreach ($query->getResult('App\Entities\Common\Menu') as $Menu) 
        {
            $Menu->populate();
            if (empty($Menu->path))
                continue;

            $path = preg_replace("@^$top\.@", '', $Menu->path);
            $nodes = explode('.', $path);
            if (count($nodes) == 1 && !isset($menuArray[$path]))
            {
                $menuArray[$path] = $Menu;
            }
            else
            {
                $last_node = array_pop($nodes);
                $parent_path =  array_shift($nodes);
                $Parent = $menuArray[$parent_path];

                while ($Parent == null && !empty($nodes))
                {
                    $parent_path = implode('.', $nodes);
                    $Parent = $menuArray[$parent_path];
                    array_shift($nodes);
                }

                if (!is_object($Parent))
                {
                    // parent is not set stack this
                    $menuArray[$last_node] = $Menu;
                }
                else
                {
                    foreach ($nodes as $node)
                    {
                        $parent_path .= ".{$node}"; //parents: copy of object pointer
                        $Parent = $Parent->children[$parent_path];
                    }

                    $Parent->children[$path] = $Menu;
                }
            }
        }

        return $menuArray;

    }

}