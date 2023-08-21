@extends("app")
@section("content")

<div><a href="{{route('home')}}" class="btn btn-lg btn-secondary text-white m-3">Back</a></div>
<div class="container m-7">
    <center><h1>Update Student Details</h1></center>
    <form class="form-control" action="{{route('update',$student->id)}}"  method="POST" novalidate>
        @method('PUT')
        @csrf
        

        <div class="form-floating mt-3 has-validation">

            <input type="text" name="name" required class="form-control" id="name" value="{{$student->name}}" placeholder="Enter Your Name"><br>
            <!-- @error('name')
            <div>dfs</div>
        @enderror -->
            <label for="name">Name</label>

            @if($errors->has('name'))
            <div class="invalid-feedback text-danger"><strong>{{$errors->first('name')}}</strong></div>
            @endif
        </div>




        <div class="form-check">
            <input type="radio" name="gender" required id="male" class="form-check-input" value="male" {{$student->gender=='male'?'checked':''}}> <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" required id="female" class="form-check-input" value="female" {{$student->gender=='female'?'checked':''}}> <label for="female" class="form-check-label">Female</label><br>
        </div>

        @if($errors->has('gender'))
        <div class="invalid-feedback text-danger">><strong>{{$errors->first('gender')}}</strong></div>
        @endif
        <div class="form-floating mb-3 mt-3">

            <input type="text" name="age" required id="age" class="form-control" value="{{$student->age}}" placeholder="Enter Your Age"><br>
            <label for="age">Age</label>
        </div>
        @if($errors->has('age'))
        <div class="invalid-feedback text-danger">><strong>{{$errors->first('age')}}</strong></div>
        @endif
        <label for="class">Class</label>
        <select name="class" id='class' class="form-select text-lg" required>
            <option disabled selected value="">Select a class</option>
            <option value="class 01" {{$student->class=='class 01'?'selected':''}}>class 01</option>
            <option value="class 02" {{$student->class=='class 02'?'selected':''}}>class 02</option>
            <option value="class 03" {{$student->class=='class 03'?'selected':''}}>class 03</option>
            <option value="class 04" {{$student->class=='class 04'?'selected':''}}>class 04</option>
            <option value="class 05" {{$student->class=='class 05'?'selected':''}}>class 05</option>
        </select><br>
        @if($errors->has('class'))
        <div class="invalid-feedback text-danger"><strong>{{$errors->first('class')}}</strong></div>
        @endif

        <div class="form-ckeck mt-2"><input type="checkbox" required name="courses[]" class="form-check-input" id="science" value="science" {{in_array('science',explode(' ',$student->courses))?'checked':''}}><label for="science" class="form-check-label">Science</label><br></div>
        <div class="form-ckeck mt-2 mb-2"><input type="checkbox" required name="courses[]" class="form-check-input" id="maths" value="maths" {{in_array('maths',explode(' ',$student->courses))?'checked':''}}><label for="maths" class="form-check-label">Maths</label><br></div>


        @if($errors->has('courses'))
        <div class="invalid-feedback text-danger"><strong>{{$errors->first('courses')}}</strong></div>
        @endif
        <input type="submit" value="Update" class="btn btn-success btn-lg">
    </form>

</div>
@endsection