<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-3">

        @if (Session::has('success'))
        <div class="col-md-12">
            <div class="container alert alert-success mt-3">
                {{ Session ::get('success') }}
            </div>
        </div>
        @endif

        <h2 class="d-flex justify-content-center">Student Records</h2>


        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Grade</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>

                @if ($students->isNotEmpty())
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->grade }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->created_at)->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class='btn btn-warning'>Edit</a>
                        <a href="#" onClick="deleteStudent({{ $student->id }})" class='btn btn-danger'>Delete</a>
                        <form id="delete-student-from-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif

            </thead>
        </table>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col text-start">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function deleteStudent(id) {
        if (confirm("Are u sure u want to delete this record?")) {
            document.getElementById("delete-student-from-" + id).submit();
        }
    }
</script>