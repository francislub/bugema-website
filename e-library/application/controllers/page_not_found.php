<?php
class page_not_found extends controller
{
    function index()
	{
		$this->error404();
	}
	
	function error404()
	{
		
        require_once APP_DIR."/views/404/index.php";
	}
}