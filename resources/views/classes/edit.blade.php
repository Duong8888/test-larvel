<!DOCTYPE html>
<html>
<head>
    <title>Edit Class</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2>Edit Class</h2>
                    <form action="{{ route('classes.update', $class->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Class Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $class->name }}">
                        </div>
                        <div class="form-group">
                            <label for="students">Select Students:</label>
                            <select class="form-control select2" multiple="multiple" id="students" name="students[]">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $class->students->contains($student->id) ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</body>
</html>
