@extends('app.template')

@section('content')
    
<section>
    <div class="container">
        <div class="row justify-content-md-center p-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Student <a href="/add-student" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('student_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('student_deleted')}}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Profile Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td> <img src="{{asset('images')}}/{{$student->profileimage}}" style="max-width:60px;"> </td>
                                    <td> 
                                    <a href="/edit-student/{{$student->id}}" class="btn btn-warning">Edit</a>
                                    <a href="/delete-student/{{$student->id}}" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este registro?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
