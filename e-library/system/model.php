<?php

class Model {

	public $db;

	public function __construct()
	{
		global $config;
        
		@$this->db = new mysqli($config['db_host'], $config['db_username'], $config['db_password'],$config['db_name']); 
        
        if($this->db->connect_error)
        {
            die("<div style='color: #a94442;background-color: #f2dede;border-color: #ebccd1;border: 1px solid transparent;font-family:monospace; width:60%; margin:auto;padding:15px 25px;text-align: center;'><strong>MYSQLi ERROR : </strong>" .$this->db->connect_error."</div>");
        }
        else
        {
            $this->db->set_charset('utf8');
        }     
        
    }
	public function escapeString($string)
	{
		return $this->db->real_escape_string($string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = real_escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val)
	{
	    return !!$val;
	}
	
	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}
	
	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}
	
	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}
	
	public function query($qry)
	{
		$result = $this->db->query($qry) or die("<div style='color: #a94442;background-color: #f2dede;border-color: #ebccd1;border: 1px solid transparent;font-family:monospace; width:60%; margin:auto;padding:15px 25px;text-align: center;'><strong>MYSQLi ERROR : </strong>" .$this->db->error."</div>");
		$resultObjects = array();

		while($row = $result->fetch_array(MYSQLI_ASSOC))
            $resultObjects[] = $row;
		    return $resultObjects;
	}

	public function execute($qry)
	{
		$exec = mysql_query($qry) or die($this->db->error);
		return $exec;
	}
    public function multi_execute($qry)
	{
		$exec = $this->db->multi_query($qry) or die($this->db->error);
		return $exec;
	}
    
}
?>
