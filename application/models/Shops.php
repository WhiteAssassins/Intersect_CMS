<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shops extends CI_Model{
    /*
     * Tome de la base de datos todos los txt
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('products');

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

        //returna los datos tomados
        return $result;
    }
    
    /*
     * Inserta los datos del txt a la base de datos
     */
    public function insert($data = array()) {
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
      
        
        //inserta datos
        $insert = $this->db->insert('products', $data);
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

}