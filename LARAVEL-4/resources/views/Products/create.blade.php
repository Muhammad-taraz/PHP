<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    body {
        margin-bottom: 3rem;
    }
</style>

<body>
    <div class="container mt-3">
        <h2>Add Product</h2>
        <form action="{{ route('Products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control"
                    id="name" name="name" required>
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input value="{{ old('price') }}" type="number"
                    class="@error('price') is-invalid @enderror form-control" id="price" name="price" step="0.01"
                    required>
                @error('price')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categories -->
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="@error('category_id') is-invalid @enderror form-control" id="category" name="category_id"
                    required>
                    <option value="">Select Category</option>
                    <option value="1">Electronics</option>
                    <option value="2">Fashion</option>
                    <option value="3">Home</option>
                    <option value="4">Sports</option>
                </select>
                @error('category_id')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subcategories -->
            <div class="form-group">
                <label for="subcategory">Subcategory:</label>
                <select class="@error('subcategory_id') is-invalid @enderror form-control" id="subcategory"
                    name="subcategory_id" required>
                    <option value="">Select Subcategory</option>
                    <option value="1">Electronics - Laptops</option>
                    <option value="2">Electronics - Smartphones</option>
                    <option value="3">Fashion - Clothing</option>
                    <option value="4">Home - Furniture</option>
                    <option value="5">Sports - Equipment</option>
                </select>
                @error('subcategory_id')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input value="{{ old('quantity') }}" type="number"
                    class="@error('quantity') is-invalid @enderror form-control" id="quantity" name="quantity" required>
                @error('quantity')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input value="{{ old('brand') }}" type="text" class="@error('brand') is-invalid @enderror form-control"
                    id="brand" name="brand" required>
                @error('brand')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <div>
                    <input type="file" id="image" name="image" required>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col text-start mt-3">
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </div>
                    <div class="col text-end">
                        <div class="child mt-3">
                            <a href="{{ route('Products.index') }}" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>