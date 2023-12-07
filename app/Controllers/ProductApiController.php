<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ProductApiController extends ResourceController
{
    protected $modelName = 'App\Models\ProductModel';
    protected $format    = 'json';

    public function getAllProducts()
    {
        $products = $this->model->findAll();
        return $this->respond($products);
    }
}
