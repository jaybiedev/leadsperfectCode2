<?php namespace App\Libraries\Common;

use App\Helpers\Utils;

class DataTable 
{
    public $meta = [];
    public $offset = 0;
    public $limit = 10;
    public $recordsTotal;
    public $recordsFiltered;
    public $orderField;
    public $orderDirection = 'asc';
    public $searchField;
    public $searchValue;
    public $searchUseRegex = false;
    public $defaultOrderField;
    public $orderFieldType;
    public $Model;

    function __construct($meta=[], $Model=null, $default_order_field=null, $dataType=null)
    {
        $this->setModel($Model);
        $this->setDefaultOrderField($default_order_field, $dataType);
        $this->load($meta);
    }

    public function load($meta)
    {
        if (empty($meta))
            return;
        
        $this->meta = $meta;
        $this->offset = $meta['start'] ?: 0;
        $this->limit = $meta['length'] ?: 10;
        $this->searchValue = $meta['search']['value'];
        $this->searchUseRegex = $meta['search']['regex'];
        
        // using the first order meta only
        $order = $meta['order'][0];
        $this->orderField = $order['column'] > 0 ? $meta['columns'][$order['column']]['data'] : '';
        $this->orderDirection = $order['dir'];
    }

    public function setDefaultOrderField(string $field=null, string $dataType=null)
    {
        $this->defaultOrderField = $field;
        $this->orderFieldType = $dataType;

        return $this;
    }

    public function setModel($Model)
    {
        if (is_object($Model))
            $this->Model = $Model;

        return $this;
    }

    /*
    return array of  [field => value]
    */
    public function getSearchableLike()
    {
        $searchable = [];
        foreach ((array)$this->meta['columns'] as $column)
        {
            if (!$column['searchable'])
                continue;
                        
            $_clause = "";
            $field = $column['data'];
            // hacking this for now to prevent lower for numeric fields
            if (stripos($field, '_id') !== false)
                continue;
            elseif (Utils::arrayStripos($field, array('_rate')) == false)
                $searchable["LOWER({$field})"] = '%' . strtolower($this->searchValue) . '%';
            else
                $searchable[$field] = '%' . strtolower($this->searchValue) . '%';
        }
        
        return $searchable;
    }

    public function getOrderByLower()
    {
        $order_field = $this->orderField;
        $can_lower = !in_array($this->orderFieldType, ['int', 'bigint', 'float', 'double', 'numeric', 'boolean']);

        if (empty($order_field))
            $order_field = $this->defaultOrderField;

        if (empty($order_field))
        {
            $order_field = $this->getField(0);
            $can_lower = false;
        }

        $order_by = $order_field;
        if ($can_lower)
            $order_by = "LOWER({$order_field})";

        return $order_by;
    }

    public function getField($n=0)
    {
        $field = '';
        if (isset($this->meta['columns']) && isset($this->meta['columns'][$n]))
        {
            $field = $this->meta['columns'][$n]['data'];
        }

        return $field;
    }

    public function getData()
    {
        if (empty($Model) || !is_object($this->Model))
            return [];

        if (!empty($this->searchValue))
        {
            $data = $this->Model->like($this->getSearchableLike())
                                ->orderBy($this->getOrderByLower(), $this->orderDirection)
                                ->findAllArray($this->limit, $this->offset);
        }
        else
        {
            $data = $this->Model->orderBy($this->getOrderByLower(), $this->orderDirection)
                                ->findAllArray($this->limit, $this->offset);
        }

        return $data;
    }

    /*
        Array
        (
            [draw] => 1
            [columns] => Array
                (
                    [0] => Array
                        (
                            [data] => branch_id
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [1] => Array
                        (
                            [data] => branch
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [2] => Array
                        (
                            [data] => branch_code
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                    [3] => Array
                        (
                            [data] => branch_address
                            [name] => 
                            [searchable] => true
                            [orderable] => true
                            [search] => Array
                                (
                                    [value] => 
                                    [regex] => false
                                )

                        )

                )

            [order] => Array
                (
                    [0] => Array
                        (
                            [column] => 0
                            [dir] => asc
                        )

                )

            [start] => 0
            [length] => 10
            [search] => Array
                (
                    [value] => 
                    [regex] => false
                )

            [_] => 1576300710725
        )
        */
}