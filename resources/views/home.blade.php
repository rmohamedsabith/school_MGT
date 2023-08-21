@extends("app")
@section("content")
@if(session()->has('update'))
    <div class="alert alert-success alert-dismissible">
        {{session()->get('update')}}
        <button class='btn-close' data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-success alert-dismissible"><button class='btn-close' data-bs-dismiss="alert"></button>{{session()->get('delete')}}</div>
@endif
    <div>
    <button class="btn btn-lg btn-secondary text-white m-3 "><a class="text-decoration-none text-dark-hover text-white " href="{{route('add')}}">Add Employee</a></button>
        <table class="table table-hover table-dark container ">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Class</th>
                <th>Courses</th>
                <th>Options</th>
            </tr>
            @foreach($student as $s)
               <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->gender}}</td>
                    <td>{{$s->age}}</td>
                    <td>{{$s->class}}</td>
                    <td>{{$s->courses}}</td>
                    <td>
                        <button class="btn btn-success d-inline"><a class="text-decoration-none text-dark-hover text-white" href="{{route('view',$s->id)}}">View</a></button>
                        <button class="btn btn-warning d-inline"><a class="text-decoration-none text-dark-hover text-white" href="{{route('edit',$s->id)}}">Edit</a></button>
                        <form class ="d-inline"action="{{route('delete',$s->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete"class="btn btn-danger d-inline">
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </table>
        {{$student->links()}}
    </div>
@endsection