<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        th,
        td {
            border-right: 3px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="mt-3 mr-5 ml-5">
        @if (Session::has('success'))
        <div class="col-md-12">
            <div class="container alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif

        <h2 class="text-center mb-4">Products</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->isNotEmpty())
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if ($product->image != "")
                        <img width="54" src="{{ asset('Uploads/Products/'. $product->image) }}" alt="">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                    <td>{{ $product->subcategory ? $product->subcategory->name : 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->updated_at)->format('d M, Y') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('Products.edit', $product->id) }}" class="btn btn-warning mr-3">Edit</a>
                            <a href="#" onClick="deleteProduct({{ $product->id }})" class="btn btn-danger ">Delete</a>
                            <form id="delete-product-from-{{ $product->id }}" action="{{ route('Products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col text-start">
                <a href="{{ route('Products.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                document.getElementById("delete-product-from-" + id).submit();
            }
        }
    </script>
</body>

</html>