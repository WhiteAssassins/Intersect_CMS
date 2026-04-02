<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontent extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('newss');
        $this->load->model('shops');
        $this->load->helper('common');
        $this->requireAdmin();
    }

    public function addnews()
    {
        $filename = $this->uploadImage('archivo', 'img/news');
        if ($filename === null) {
            return;
        }

        setlocale(LC_TIME, 'spanish');
        $title = strip_tags($this->input->post('title'));
        $record = array(
            'title' => $title,
            'descrip' => strip_tags($this->input->post('descrip')),
            'txt' => cms_sanitize_rich_text($this->input->post('txt')),
            'img' => $filename,
            'date' => strftime('%A, %d de %B de %Y'),
            'status' => 1,
            'admin' => $this->session->userdata('user'),
            'url_slug' => $this->buildUniqueSlug('news', $title),
        );

        $this->newss->insert($record);
        $this->logAdminAction('Noticia creada');
        $this->redirectTo('admin/news');
    }

    public function delnews()
    {
        $id = (int) $this->input->post('id');
        if ($id > 0) {
            $this->db->delete('news', array('id' => $id));
            $this->logAdminAction('Noticia eliminada');
        }

        $this->redirectTo('admin/news');
    }

    public function editnews()
    {
        $id = (int) $this->input->post('id');
        $row = (array) $this->db->get_where('news', array('id' => $id))->row_array();

        $this->renderMinimalPage('admin/editnews', array(
            'news_id' => $row['id'] ?? $id,
            'news_title_value' => $row['title'] ?? '',
            'news_description_value' => $row['descrip'] ?? '',
            'news_text_value' => $row['txt'] ?? '',
        ));
    }

    public function editnewss()
    {
        $id = (int) $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('news', array(
            'title' => $this->getPostString('title'),
            'descrip' => $this->getPostString('descrip'),
            'txt' => cms_sanitize_rich_text($this->input->post('txt')),
        ));

        $this->logAdminAction('Noticia actualizada');
        $this->redirectTo('admin/news');
    }

    public function statusnews()
    {
        $this->toggleStatus('news', (int) $this->input->post('id'));
        $this->logAdminAction('Estado de noticia actualizado');
        $this->redirectTo('admin/news');
    }

    public function addproduct()
    {
        $filename = $this->uploadImage('archivo', 'img/products');
        if ($filename === null) {
            return;
        }

        $name = strip_tags($this->input->post('name'));
        $record = array(
            'name' => $name,
            'descrip' => strip_tags($this->input->post('descrip')),
            'price' => number_format((float) $this->input->post('price'), 2, '.', ''),
            'aatk' => strip_tags($this->input->post('aatk')),
            'ainterac' => strip_tags($this->input->post('ainterac')),
            'ingameid' => strip_tags($this->input->post('ingameid')),
            'status' => 1,
            'image' => $filename,
            'url_slug' => $this->buildUniqueSlug('products', $name),
        );

        $this->shops->insert($record);
        $this->logAdminAction('Producto creado');
        $this->redirectTo('admin/shop');
    }

    public function delproduct()
    {
        $id = (int) $this->input->post('id');
        if ($id > 0) {
            $this->db->delete('products', array('id' => $id));
            $this->logAdminAction('Producto eliminado');
        }

        $this->redirectTo('admin/shop');
    }

    public function editproduct()
    {
        $id = (int) $this->input->post('id');
        $row = (array) $this->db->get_where('products', array('id' => $id))->row_array();

        $this->renderMinimalPage('admin/editproduct', array(
            'product_id' => $row['id'] ?? $id,
            'product_name_value' => $row['name'] ?? '',
            'product_description_value' => $row['descrip'] ?? '',
            'product_price_value' => $row['price'] ?? '',
            'product_attack_animation_value' => $row['aatk'] ?? '',
            'product_interaction_animation_value' => $row['ainterac'] ?? '',
            'product_ingame_id_value' => $row['ingameid'] ?? '',
        ));
    }

    public function editproducts()
    {
        $id = (int) $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('products', array(
            'name' => $this->getPostString('name'),
            'descrip' => $this->getPostString('descrip'),
            'price' => number_format((float) $this->input->post('price'), 2, '.', ''),
            'aatk' => $this->getPostString('aatk'),
            'ainterac' => $this->getPostString('ainterac'),
            'ingameid' => $this->getPostString('ingameid'),
        ));

        $this->logAdminAction('Producto actualizado');
        $this->redirectTo('admin/shop');
    }

    public function statusproduct()
    {
        $this->toggleStatus('products', (int) $this->input->post('id'));
        $this->logAdminAction('Estado de producto actualizado');
        $this->redirectTo('admin/shop');
    }

    private function uploadImage($field, $path)
    {
        if (empty($_FILES[$field]['name'])) {
            echo 'Debe seleccionar una imagen.';
            return null;
        }

        $targetDirectory = rtrim(FCPATH . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR);
        if (!is_dir($targetDirectory)) {
            @mkdir($targetDirectory, 0775, true);
        }

        $config = array(
            'upload_path' => $targetDirectory,
            'allowed_types' => 'gif|jpg|jpeg|png|webp',
            'max_size' => '5120',
            'max_width' => '2000',
            'max_height' => '2000',
            'encrypt_name' => true,
        );

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($field)) {
            echo $this->upload->display_errors();
            return null;
        }

        $data = $this->upload->data();
        return $data['file_name'] ?? null;
    }

    private function buildUniqueSlug($table, $title)
    {
        $slug = strtolower(url_title($title));
        if ($slug === '') {
            $slug = $table . '-' . time();
        }

        if (isUrlExists($table, $slug)) {
            $slug .= '-' . time();
        }

        return $slug;
    }

    private function toggleStatus($table, $id)
    {
        if ($id <= 0) {
            return;
        }

        $row = (array) $this->db->get_where($table, array('id' => $id))->row_array();
        $nextStatus = ((int) ($row['status'] ?? 0) === 1) ? 0 : 1;

        $this->db->where('id', $id);
        $this->db->update($table, array('status' => $nextStatus));
    }
}
