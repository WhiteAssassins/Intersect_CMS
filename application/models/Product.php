<?php 
class Product extends CI_Model{
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('products');

        if(array_key_exists("id", $params)){
            $this->db->where('id', (int) $params['id']);
        }

        if(array_key_exists("status", $params)){
            $this->db->where('status', $params['status']);
        }

        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        if(array_key_exists("url_slug", $params)){
            $this->db->where('url_slug', $params['url_slug']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }elseif(array_key_exists("id", $params)){
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        return $result;
    }

    public function getById($id)
    {
        return $this->getRows(array(
            'id' => (int) $id,
        ));
    }
    
    public function insert($data = array()) {
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        $insert = $this->db->insert('products', $data);
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

}
