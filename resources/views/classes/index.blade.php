<!DOCTYPE html>
<html>
<head>
    <title>Classes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('classes.create') }}" class="btn btn-success mb-3">Add Class</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Students</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($class->students as $student)
                                            <li>{{ $student->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>

</div>
</body>
</html>
