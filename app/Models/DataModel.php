<?php
namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'table_data';

    public function insertData($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function updateData($id, $data)
    {
        $this->db->table($this->table)->where('id', $id)->update($data);
        return $this->db->affectedRows();
    }

    public function deleteData($id)
    {
        $this->db->table($this->table)->where('id', $id)->delete();
        return $this->db->affectedRows();
    }
	
	 public function selectData($fname)
    {
        $res = $this->db->table($this->table)->where('filename', $fname)->get();
        
		return $res->getResult();
		
    }
	
}

?>