<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form id="productForm" action="<?= site_url('public/product/save') ?>" method="post">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <select id="productName" name="product_id" class="form-control">
                    <option value="">Select a Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>"><?= $product['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="imageUrl">Image URL</label>
                <input type="text" id="imageUrl" name="image_url" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="subHeading">Subheading</label>
                <input type="text" id="subHeading" name="sub_heading" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
		<div id="formMessage"></div> <!-- Container to display messages -->
    </div>

    <script>
       document.getElementById('productName').addEventListener('change', function() {
    var productId = this.value;

    // Make an AJAX call to get the selected product's details
    fetch(`<?= site_url('public/product/getProductDetails/') ?>${productId}`)
        .then(response => response.json())
        .then(product => {
            document.getElementById('price').value = product.price || '';
            document.getElementById('imageUrl').value = product.image_url || '';
            document.getElementById('subHeading').value = product.sub_heading || '';
        })
        .catch(error => console.error('Error:', error));
});

    </script>
	<script>
    document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('formMessage').innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('formMessage').innerHTML = '<div class="alert alert-danger">An error occurred.</div>';
        });
    });
</script>

</body>
</html>
