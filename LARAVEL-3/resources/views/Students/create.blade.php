<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-3">
        <h2>Add New Student</h2>
        <form action=" {{route('students.store')}} " method="post">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Name:</label>
                <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" required>
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="@error('name') is-invalid @enderror form-control" id="grade" name="grade" required>
                @error('grade')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="container">
                <div class="row">
                    <div class="col text-start mt-3">
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                    <div class="col text-end">
                        <div class="child mt-3">
                            <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

</html>