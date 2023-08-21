@extends("app")
@section("content")

<div><a href="{{route('home')}}" class="btn btn-lg btn-secondary text-white m-3">Back</a></div>
<div class="container m-7">
    <center><h1>View Student Details</h1></center>
    <form class="was-validated" >
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}" readonly><br>
        <div class="form-check">
        <input type="radio" name="gender" id="male" value="male" disabled {{$student->gender=='male'?'checked':''}}> <label for="male">Male</label>
        </div><div class="form-check">
        <input type="radio" name="gender" id="female" value="female" disabled {{$student->gender=='female'?'checked':''}}> <label for="female">Female</label><br>
        </div>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" class="form-control" value="{{$student->age}}" readonly><br>

        <label for="class">Class</label>
        <select name="class" id='class' class="form-select text-lg" disabled>
            <option value="class 01" {{$student->class=='class 01'?'selected':''}}>class 01</option>
            <option value="class 02" {{$student->class=='class 02'?'selected':''}}>class 02</option>
            <option value="class 03" {{$student->class=='class 03'?'selected':''}}>class 03</option>
            <option value="class 04" {{$student->class=='class 04'?'selected':''}}>class 04</option>
            <option value="class 05" {{$student->class=='class 04'?'selected':''}}>class 05</option>
        </select><br>

        <div class="form-check">
        <input type="checkbox" name="courses[]" id="science" value="science" disabled {{in_array('science',explode(' ',$student->courses))?'checked':''}}><label for="science">Science</label><br>
        </div><div class="form-check">
        <input type="checkbox" name="courses[]" id="maths" disabled value="maths"
         {{in_array('maths',explode(' ',$student->courses))?'checked':''}}
         
        }}><label for="maths">Maths</label><br></div>
       

    </form>

</div>
@endsection