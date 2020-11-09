@extends('app.template')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-md-center p-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Edit Student <a href="/all-students" class="btn btn-primary">All Students</a>
                        </div>
                        <div class="card-body">

                            @if (Session::has('student_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('student_updated') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('student.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value={{ $student->id }}>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="file">Choose Profile Image</label>
                                    <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                                    <img id="previewImg" alt="profile image"
                                        src="{{ asset('images') }}/{{ $student->profileimage }}"
                                        style="max-width:130px;margin-top:20px" />
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
