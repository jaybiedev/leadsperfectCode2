<?php namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use App\Helpers\Utils;
use App\Models\Finance\PartnerModel;

class Partner extends FinanceBaseController
{
	public function index()
	{   
        $this->View->setPageHeader('Manage Partners');
        $this->View->setModalTitle('Edit Partner');
        return $this->View->render('Finance/Partner/index.tpl');
    }
    
    public function get()
    {
        $meta = $this->request->getGet();

        $PartnerModel = new PartnerModel();   
        $data = [];

        if (!empty($meta['partner_id']))
        {
            $data = $PartnerModel->find((int)$meta['partner_id'])->populate();
        }

       return  $this->View->renderJsonSuccess(null, $data);
    }

    public function getDataTable()
    {
        $meta = $this->request->getGet();

        $PartnerModel = new PartnerModel();   
        $DataTable = new \App\Libraries\Common\DataTable($meta, $PartnerModel, 'partner');
    
        $data = [];

        if (!empty($DataTable->searchValue))
        {
            $data = $PartnerModel->like($DataTable->getSearchableLike())
                                ->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }
        else
        {
            $data = $PartnerModel->orderBy($DataTable->getOrderByLower(), $DataTable->orderDirection)
                                ->findAllArray($DataTable->limit, $DataTable->offset);
        }

        $recordsTotal = $PartnerModel->countAllResults();
        
        return $this->View->renderJsonDataTable($data, $recordsTotal);
    }

    public function post()
    {
        $PartnerModel = new PartnerModel();

        $enabled = $this->request->getPost('enabled', FILTER_VALIDATE_INT);
        $partner_id = $this->request->getPost('partner_id', FILTER_VALIDATE_INT);

        try {
            $fields = $this->request->getPost('field');
            
            if (!empty((int)$partner_id)) {
                $fields['partner_id'] = $partner_id;
            }

            if (!isset($enabled) && !empty($partner_id)) {
                $PartnerModel->delete($partner_id);
            }
            else {

                if (empty($partner_id)) {
                    $Partner = $PartnerModel->onlyDeleted()->where('LOWER(partner)', strtolower($fields['partner']))->first();

                    if (is_object($Partner) && $Partner->populate()) {
                        $fields['date_deleted'] = null;
                        $fields['partner_id'] = $Partner->partner_id;
                    }
                }

                $PartnerModel->save($fields);
            }
        }
        catch (\Exception $e) {
            return $this->View->renderJsonFail($e->getMessage());
        }

        return $this->View->renderJsonSuccess();
    }

    public function delete()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $PartnerModel = new PartnerModel();
            $Partner = $PartnerModel->delete($id);
        });
        return $this->View->renderJsonSuccess();
    }

    public function restore()
    {
        $ids = $this->request->getPost('ids');
        
        if (empty($ids) || !is_array($ids))
            return $this->View->renderJsonFail();

        array_walk($ids, function($id) {
            $Partner = new \App\Entities\Finance\Partner();
            $Partner->date_deleted = null;
            $PartnerModel = new PartnerModel();
            $Partner = $PartnerModel->save($Partner);
        });
        return $this->View->renderJsonSuccess();
    }
	//--------------------------------------------------------------------

}
