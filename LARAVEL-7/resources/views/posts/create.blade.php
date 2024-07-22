<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" name="content" rows="5" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea id="excerpt" class="form-control" name="excerpt" rows="2">{{ old('excerpt') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input id="published_at" type="date" class="form-control" name="published_at" value="{{ old('published_at') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
