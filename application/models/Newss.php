<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newss extends CI_Model{
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('news');

        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        if(array_key_exists("url_slug", $params)){
            $this->db->where('url_slug', $params['url_slug']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        return $result;
    }
    
    public function insert($data = array()) {
        if(!array_key_exists("date", $data)){
            $data['date'] = date("Y-m-d H:i:s");
        }
        
        $insert = $this->db->insert('news', $data);
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

}