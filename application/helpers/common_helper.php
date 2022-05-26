<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Checkea si la url amigable existe
 */
if(!function_exists('isUrlExists')){
    function isUrlExists($tblName, $urlSlug){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where('url_slug',$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}