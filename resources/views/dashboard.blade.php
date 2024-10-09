<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <a href="{{ route('home') }}" style="margin-left:30px;">
                        <b><u>Click To Go To Website</u></b>
                    </a>
                    <a href="{{ route('frontend.student.create') }}" style="margin-left:30px;">
                        <b><u>Click To Create Enrollment</u></b>
                    </a>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                    @if (Session::has('student_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('student_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @php
                        $students = App\Models\Student::where('login_id', auth()->user()->id)->get();
                    @endphp
                    <h1>Enrollment List</h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <a href="{{ route('frontend.student.edit', $student->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('frontend.student.download', $student->id) }}" class="btn btn-primary">Download</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Enrollment Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
