<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

if (!function_exists('cms_sanitize_rich_text')) {
    function cms_sanitize_rich_text($html)
    {
        $html = (string) $html;
        if ($html === '') {
            return '';
        }

        $ci = & get_instance();
        if (isset($ci->security)) {
            $html = (string) $ci->security->xss_clean($html);
        }

        $html = preg_replace('#<(script|style)\b[^>]*>.*?</\1>#is', '', $html);
        $html = strip_tags($html, '<p><br><strong><em><b><i><u><ul><ol><li><blockquote><h1><h2><h3><h4><h5><h6><a>');
        $html = preg_replace('/<a\b(?![^>]*\brel=)([^>]*)>/i', '<a$1 rel="nofollow noopener noreferrer">', $html);

        return trim((string) $html);
    }
}

if (!function_exists('cms_render_rich_text')) {
    function cms_render_rich_text($html)
    {
        return cms_sanitize_rich_text($html);
    }
}

if (!function_exists('cms_render_multiline')) {
    function cms_render_multiline($text)
    {
        return nl2br(html_escape((string) $text), false);
    }
}
