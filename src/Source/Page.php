<?php

namespace Source;

require_once("../config.php");

use \Rain\Tpl;

class Page
{
    private $tpl;
    private $footer;

    public function __construct($templateName, $params = array(), $header = true, $footer = true)
    {
        $dirRoot = \dirname(\dirname(__DIR__)) . DIRECTORY_SEPARATOR;
        $config = array(
            "tpl_dir"       => $dirRoot . "view/",
            "cache_dir"     => $dirRoot . "cache/",
            "debug"         => false, // set to false to improve the speed
        );
        
        Tpl::configure( $config );
        $this->tpl = new Tpl;

        if($header === true)
        {
            $this->tpl->draw( "header" );
        }
        $this->footer = $footer;

        $this->body($templateName, $params);
    }

    public function body($templateName, $params = array())
    {
        foreach ($params as $key => $value)
        {
            $this->tpl->assign($key, $value);
        }

        $this->tpl->draw( $templateName );
    }

    public function __destruct()
    {
        if($this->footer === true)
        {
            $this->tpl->draw( "footer" );
        }
    }
}