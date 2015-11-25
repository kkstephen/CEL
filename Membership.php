<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership  { 

    private	$_ci;
	
	public function __construct() 
	{	 		
		$this->_ci =& get_instance();
	}	 

	public function FindUser($id, $pwd)
	{
		$this->_ci->db->select("U.*, R.name as role");		
		$this->_ci->db->from("users U");
		$this->_ci->db->join("role R", "U.role = R.id", "left");
		$this->_ci->db->where('U.login_id', $id);
		$this->_ci->db->where('U.password', sha1($pwd));
			
		$query = $this->_ci->db->get();	

		return $query->row();			
	}
	
	public function SetLogin($id)
	{
		$data = array(
					'lastlogin' => date("Y-m-d H:i:s")			
				);
				
		$this->_ci->db->where('id', $id);
		$this->_ci->db->update('users', $data);
	}
}
