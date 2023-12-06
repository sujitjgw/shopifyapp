<!-- File: app/Views/sync_page.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sync Shopify Products</title>
    <!-- Include Bootstrap CSS or your own stylesheet -->
</head>
<body>
    <div class="container mt-4">
        <h1>Manage Shopify Products</h1>

        <!-- Sync Products Button -->
			<form action="<?= site_url('public/product/syncProducts') ?>" method="post">
		<?= csrf_field() ?>
		<button type="submit" class="btn btn-primary">Sync Products</button>
	</form>




        <!-- Display Messages -->
        <?php if (session()->has('sync_message')): ?>
            <div class="alert alert-info mt-4">
                <?= session('sync_message'); ?>
            </div>
        <?php endif; ?>

        <!-- Delete Products Button -->
        <form action="<?= site_url('public/product/deleteAllProducts') ?>" method="post">
            <button type="submit" class="btn btn-danger mt-3">Delete All Products</button>
        </form>
    </div>
</body>
</html>
