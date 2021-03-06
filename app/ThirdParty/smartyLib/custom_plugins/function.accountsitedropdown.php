<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.sitedropdown.php
 * Type:     function
 * Name:     sitedropdown
 * Purpose:  widget for sitedropdown
 * -------------------------------------------------------------
 */
function smarty_function_accountsitedropdown($params, $content)
{
    $Account = null;
    $Site = null;
    
    if (isset($params['Site']) && is_object($params['Site'])) {
        // faster
        $Site = $params['Site'];
    }
    else  {
        //
    }
    
    if (isset($params['Account']) && is_object($params['Account'])) {
        // faster
        $Account = $params['Account'];
    }
    else  {
        //
    }
    
    $Widget = new \Library\Widgets\Leads\AccountSitesDD();
    $Widget->setAccount($Account);
    $Widget->setSite($Site);
        
    return $Widget->getContent();
}