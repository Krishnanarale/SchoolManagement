<?php 
class Model_resources extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }

    public function fetchAppResourcesData($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM appResources WHERE user_id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM appResources";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}
?>