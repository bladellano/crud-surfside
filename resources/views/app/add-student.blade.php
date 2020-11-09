@extends('app.template')

@section('content')
    <section>
        <div class="container">

            <div class="row justify-content-md-center p-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Add New Student <a href="/all-students" class="btn btn-primary">All Students</a>
                        </div>
                        <div class="card-body">

                            @if (Session::has('student_added'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('student_added') }}
                                </div>
                            @endif

                            @if (isset($errors) && count($errors))
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="file">Choose Profile Image</label>
                                    <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                                    <img id="previewImg" alt="profile image" style="max-width:130px;margin-top:20px" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
