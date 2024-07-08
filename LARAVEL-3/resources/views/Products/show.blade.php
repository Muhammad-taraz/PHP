<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Product Details</h1>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Price:</strong> {{ $product->price }}</p>

        <!-- Edit button for Product -->
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary mr-2">Edit Product</a>

        <!-- Index button for Products -->
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>

        <div class="mt-3">
            <h2>Categories:</h2>
            @foreach($product->categories as $category)
                <p>{{ $category->name }}</p>
                <!-- Edit button for each Category -->
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-2">Edit Category</a>
            @endforeach
        </div>

        <div class="mt-3">
            <h2>Tags:</h2>
            @foreach($product->tags as $tag)
                <p>{{ $tag->name }}</p>
                <!-- Edit button for each Tag -->
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary mr-2">Edit Tag</a>
            @endforeach
        </div>
    </div>
</body>
</html>
