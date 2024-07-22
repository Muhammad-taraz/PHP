<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $post->title }}</div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
                <p>Published at: {{ $post->published_at }}</p>
            </div>
        </div>
    </div>
</body>

</html>