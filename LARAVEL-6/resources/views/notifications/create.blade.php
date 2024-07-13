<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Notification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            margin-bottom: 50px; /* Add space at the bottom */
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .button-group {
            margin-top: 1rem; /* Add space above the buttons */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Create Notification</h1>
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Send Notification</button>
                <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>
