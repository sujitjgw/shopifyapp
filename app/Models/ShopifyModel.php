<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopifyModel extends Model
{
    protected $shopifyDomain;
    protected $shopifyAPIKey;

    public function __construct()
    {
        parent::__construct();
        // Load the environment variables
        $this->shopifyDomain = getenv('SHOPIFY_DOMAIN');
        $this->shopifyAPIKey = getenv('SHOPIFY_API_KEY');
    }

    // Add methods to interact with Shopify API here
    public function getProducts()
    {
        $client = \Config\Services::curlrequest();

        $response = $client->get("https://{$this->shopifyDomain}/admin/api/2023-10/products.json", [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => $this->shopifyAPIKey,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $body = json_decode($response->getBody());
            return $body->products ?? [];
        } else {
            // Handle errors, possibly log them or return a custom error message
            log_message('error', 'Shopify API error: ' . $response->getBody());
            return []; // Or you could return false or null to indicate failure
        }
    }
}
