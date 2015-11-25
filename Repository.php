<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repository { 
       
	private	$_ci;
	
    function __construct()
    {
 		$this->_ci =& get_instance();
    }	

	public function Users()
	{  
		$this->_ci->db->from("users");		
        
		$query = $this->_ci->db->get();	 
	
		return $query->result();
	}
	 
	public function Roles()
	{
		$this->_ci->db->from("role");	
        
		$query = $this->_ci->db->get();	 
	
		return $query->result();
	}
	
	public function Find($table = '', $id = '')
	{
		$this->_ci->db->select("*")->from($table)->where('id', $id);
			
		$query = $this->_ci->db->get();	

		return $query->row();	
	}

	public function Add($table = '', $entry) 
	{
		if ($table != '')
		{
			$this->_ci->db->insert($table, $entry);
		}	
	}
	
	public function Save($table = '', $id = '', $entry) 
	{
		if ($table != "" && $id != "")
		{
			$this->_ci->db->update($table, $entry, array('id' => $id));
		}		
	}	
	
	public function Delete($table = '', $id = '')
	{
		if ($table != "" && $id != "")
		{
			$this->_ci->db->delete($table, array('id' => $id));
		}
	}	
}
