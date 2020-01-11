<?php
namespace App\Libraries\Common;

class SmartyLib extends \Smarty
{
    function __construct()
    {
        parent::__construct();

        $this->left_delimiter = "[[";
        $this->right_delimiter = "]]";

        $smarty_compile_dir = WRITEPATH . "views/templates_c";
        $smarty_cache_dir = WRITEPATH . "views/templates_c";

        $this->setTemplateDir(APPPATH . "Views/templates")
            ->setCompileDir($smarty_compile_dir)
            ->setCacheDir($smarty_cache_dir)
            ->setTemplateDir(APPPATH . 'Views')
            ->setPluginsDir(array(APPPATH . 'ThirdParty/smarty/libs/plugins',
            APPPATH . 'ThirdParty/smarty/plugins'));

        if ( ! is_writable( $this->compile_dir ) )
        {
            // make sure the compile directory can be written to
            @chmod( $this->compile_dir, 0777 );
        }

        // Uncomment these 2 lines to change Smarty's delimiters
        // $this->left_delimiter = '{{';
        // $this->right_delimiter = '}}';

        $this->assign( 'FCPATH', FCPATH );     // path to website
        $this->assign( 'APPPATH', APPPATH );   // path to application directory
        $this->assign( 'WRITEPATH', WRITEPATH ); // path to system directory

        log_message('debug', "Smarty Class Initialized");
    }

    function setDebug( $debug=true )
    {
        $this->debug = $debug;
    }
}