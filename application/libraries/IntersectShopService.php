<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IntersectShopService
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Product');
        $this->CI->load->model('Userpaneldata');
        $this->CI->load->library('intersectadminapi');
    }

    public function purchaseProduct($username, $playerName, $productId)
    {
        $username = trim((string) $username);
        $playerName = trim((string) $playerName);
        $productId = (int) $productId;

        if ($username === '') {
            return $this->error('Debe iniciar sesion para comprar.');
        }

        if ($playerName === '' || $productId <= 0) {
            return $this->error('Complete todos los campos.');
        }

        $user = $this->CI->Userpaneldata->getUserByUsername($username);
        if (empty($user)) {
            return $this->error('No fue posible localizar la cuenta local.');
        }

        $product = (array) $this->CI->Product->getById($productId);
        if (empty($product)) {
            return $this->error('El producto solicitado no existe.');
        }

        if ((int) ($product['status'] ?? 0) !== 1) {
            return $this->error('Este producto no esta disponible ahora mismo.');
        }

        $price = (float) ($product['price'] ?? 0);
        if ($price <= 0) {
            return $this->error('Este producto no tiene un precio valido.');
        }

        $ingameId = trim((string) ($product['ingameid'] ?? ''));
        if ($ingameId === '') {
            return $this->error('Este producto no tiene un item configurado en Intersect.');
        }

        if (!$this->CI->Userpaneldata->debitBalanceIfEnough($username, $price)) {
            return $this->error('No tiene saldo suficiente.');
        }

        $delivery = $this->CI->intersectadminapi->giveItemToPlayer($playerName, $ingameId, 1);
        if (!$delivery['ok']) {
            $this->CI->Userpaneldata->creditBalance($username, $price);
            return $this->error($delivery['message'] ?: 'No fue posible entregar el item al personaje.');
        }

        $updatedUser = $this->CI->Userpaneldata->getUserByUsername($username);

        return array(
            'status' => 200,
            'sms' => 'Item comprado correctamente.',
            'balance' => number_format((float) ($updatedUser['balance'] ?? 0), 2, '.', ''),
            'product_name' => $product['name'] ?? '',
            'player_name' => $playerName,
        );
    }

    private function error($message)
    {
        return array(
            'status' => 0,
            'sms' => $message,
        );
    }
}
