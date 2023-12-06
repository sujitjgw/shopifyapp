<!-- Inside app/Views/show_products.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Shopify Products</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if (isset($product->image) && isset($product->image->src)): ?>
                            <img class="card-img-top" src="<?= esc($product->image->src) ?>" alt="<?= esc($product->title) ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($product->title) ?></h5>
                            <?php if (isset($product->variants) && isset($product->variants[0]->price)): ?>
                                <p class="card-text">Price: <?= esc($product->variants[0]->price) ?></p>
                            <?php endif; ?>
                            <!-- Add to Cart Button -->
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
