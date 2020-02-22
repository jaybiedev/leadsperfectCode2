<?php namespace App\Libraries\Administration;

use CodeIgniter\Session\Session;
use App\Models\Administration\SysConfigModel;

class SysConfig 
{
    public static function getSession()
    {
        return \Config\Services::session();
    }

    public static function get($name) {
        $Session = self::getSession();
        
        $SysConfig = $Session->get('SysConfig');

        if (empty($SysConfig)) {
            $SysConfigModel = new SysConfigModel();
            $SysConfig = $SysConfigModel->findAllKeyed(0, 0, 'sysconfig');
            
            $Session->set('SysConfig', $SysConfig);
        }

        $SysConfig = $Session->get('SysConfig');

        if (empty($SysConfig[$name]))
            return null;
        
        return $SysConfig[$name]['value'];
    }
}