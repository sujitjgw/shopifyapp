<?php

namespace App\Controllers;

use App\Models\ShopifyModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        return view('sync_page');
    }

    public function syncProducts()
    {
		//die('SyncProducts method was called');
        $shopifyModel = new ShopifyModel();
        $productModel = new ProductModel();

        // Fetch all products from Shopify
        $shopifyProducts = $shopifyModel->getProducts();

        $syncCount = 0; // Initialize sync count

        // Loop through each Shopify product and insert/update in local DB
        foreach ($shopifyProducts as $shopifyProduct) {
            // Prepare data for insertion or update
            $productData = [
                'shopify_product_id' => $shopifyProduct->id,
                'title' => $shopifyProduct->title,
                'price' => $shopifyProduct->variants[0]->price,
                'image_url' => $shopifyProduct->image->src ?? null,
            ];

            // Check if the product already exists in the local DB
            $existingProduct = $productModel->where('shopify_product_id', $shopifyProduct->id)->first();

            if ($existingProduct) {
                // Update the existing product
                $productModel->update($existingProduct->id, $productData);
            } else {
                // Insert new product
                $productModel->insert($productData);
            }

            $syncCount++; // Increment sync count
        }

        // Set a session message with the sync count
        session()->setFlashdata('sync_message', "{$syncCount} products synchronized successfully!");

        // Redirect back to the sync page
        return redirect()->to('public/sync-page');
    }

    public function deleteAllProducts()
    {
        $productModel = new ProductModel();

        // Assuming deleteAll is a custom method in ProductModel that deletes all records
        if ($productModel->deleteAll()) {
            session()->setFlashdata('sync_message', "All products deleted successfully!");
        } else {
            session()->setFlashdata('sync_message', "There was an error deleting the products.");
        }

        // Redirect back to the sync page
        return redirect()->to('public/sync-page');
    }
}
