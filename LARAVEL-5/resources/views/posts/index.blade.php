<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
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

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .card-body {
            padding: 10px;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .badge {
            margin-right: 5px;
        }

        .img-icon {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }
    
        .nav {
            display: flex;
            height: 15%;
            width: 5%;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>All Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        <div class="container">
            @if ($posts->count() > 0)
            @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="mt-3"><strong>Title:</strong> {{ $post->title }}</p>
                    <p class="mt-3"><strong>Content:</strong> {{ $post->content }}</p>
                    <p class="mt-3"><strong>Excerpt:</strong> {{ $post->excerpt }}</p>
                    @if ($post->published_at)
                    <p><strong>Published At:</strong> {{ $post->published_at->format('F d, Y') }}</p>
                    @else
                    <p class="mt-3"><strong>Published At:</strong> Publication date not set</p>
                    @endif
                    <p class="mt-3"><strong>Categories:</strong>
                        @foreach($post->categories as $category)
                        <span class="badge badge-primary">{{ $category->name }}</span>
                        @endforeach
                    </p>
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-icon" style="max-width: 5ren; height: 5rem;" alt="{{ $post->title }}">
                    @endif
                    <div>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                   </div>
                </div>
            </div>
            @endforeach

        <div class="nav">
                {{ $posts->links() }}
    </div>
            @else
            <p>No posts available.</p>
            @endif
        </div>
    </div>
</body>

</html>