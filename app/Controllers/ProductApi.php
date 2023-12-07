<?php

// In a controller such as ProductApi.php in app/Controllers
public function getProductData($productId) {
    $productModel = new \App\Models\ProductModel();
    $productData = $productModel->find($productId);

    // Add CORS headers if this is a public API
    // Note: Adjust the domains as per your requirements
    $this->response->setHeader('Access-Control-Allow-Origin', '*');
    $this->response->setHeader('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization');
    $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');

    return $this->response->setJSON($productData);
}
