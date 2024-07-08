<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .badge {
            margin-right: 5px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        .child {
         margin-right: 1rem;
         margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <p><strong>Title:</strong> {{ $post->title }}</p>
        <p><strong>Content:</strong> {{ $post->content }}</p>
        <p><strong>Excerpt:</strong> {{ $post->excerpt }}</p>
        <p><strong>Published At:</strong> {{ $post->published_at }}</p>
        <p class="mt-3"><strong>Categories:</strong>
            @foreach($post->categories as $category)
            <span class="badge badge-primary">{{ $category->name }}</span>
            @endforeach
        </p>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
        @endif

        <div>
        <span class="child"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        </span>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger child" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
        <span class="child"><a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </span>
        </div>
    </div>
</body>

</html>