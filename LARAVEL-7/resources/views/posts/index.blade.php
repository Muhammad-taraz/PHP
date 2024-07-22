<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #343a40;
            color: #ffffff;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            background-color: #495057;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #212529;
            color: white;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #212529;
            border: none;
        }

        .btn-info,
        .btn-warning,
        .btn-danger {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Posts</div>
            <div class="card-body">
                @can('create', App\Models\Post::class)
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
                @endcan
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Excerpt</th>
                            <th>Published At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>{{ $post->published_at }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-info">View</a>
                                @can('update', $post)
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                                @endcan
                                @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>