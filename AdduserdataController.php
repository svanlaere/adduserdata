<?php

if (!defined('IN_CMS')) {
    exit();
}

class AdduserdataController extends PluginController
{
    
    public function __construct()
    {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/skeleton/views/sidebar'));
		$this->AllUsers = User::findAll();
    }
    
    public function index()
    {
        $this->display('adduserdata/views/users', array(
			'kint' => @Kint::dump($this->AllUsers)
        ));
        
    }
    
} // end class