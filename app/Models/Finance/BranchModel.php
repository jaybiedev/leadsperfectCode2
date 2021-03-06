<?php namespace App\Models\Finance;
use App\Models\BaseModel;

class BranchModel extends BaseModel 
{
    protected $table = 'branch';
    protected $primaryKey = 'branch_id';
    protected $allowedFields = ['branch', 'branch_code', 'branch_address', '
        local', 'init_balance', 'printer_type', 'province', 'partners', 'court', 'location',
        'long', 'lati', 'swipe', 'date_deleted'];
    protected $returnType = 'App\Entities\Finance\Branch';

    protected $validationRules    = [
        'branch'     => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'branch'        => [
                'required' => 'Branch is required.'
        ]
    ];

    public function getBranches($user_id=0, $is_ignore_session = false)
    {
        static $userBranches = [];
        $key = $user_id . ($is_ignore_session ? '_1' : '_0');

        if (!isset($userBranches[$key]) || empty($userBranches[$key]))
        {
            $branches = $this->orderBy('branch', 'asc')->findAll(); // @todo
            $userBranches[$key] = $branches;
        }
        
        return $userBranches[$key];
    }
}