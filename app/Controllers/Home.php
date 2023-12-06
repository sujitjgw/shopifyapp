<?php

namespace App\Controllers;

use App\Models\ShopifyModel;

class Home extends BaseController
{
    public function index()
    {
        // If you want to show products on your homepage, you can use this method.
        $shopifyModel = new ShopifyModel();
        $products = $shopifyModel->getProducts();

        // Now pass the $products array to your view
        return view('welcome_message', ['products' => $products]);
    }

    // If you want to have a separate page for showing products, you could use:
    public function showProducts()
    {
        $shopifyModel = new ShopifyModel();
        $products = $shopifyModel->getProducts();

        // Pass the products to a view file
        return view('show_products', ['products' => $products]);
    }
}
