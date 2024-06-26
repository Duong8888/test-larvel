<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2>Edit Student</h2>

                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                        </div>

                        <div class="form-group">
                            <label for="birthday">Birthday:</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $student->birthday }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address">{{ $student->address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

</div>
</body>
</html>
