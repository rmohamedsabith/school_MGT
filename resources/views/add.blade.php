@extends("app")
@section("content")
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button class="btn-close" data-bs-dismiss="alert"></button>
    {{session()->get('success')}}
</div>
@endif
<!-- @if($errors->any())
    @foreach($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
    @endif -->
<div><a href="{{route('home')}}" class="btn btn-lg btn-secondary text-white m-3">Back</a></div>
<div class="container m-7">
    <center>
        <h1>Add Student Details</h1>
    </center>
    <form class="was-validated container" action="{{route('save')}}" method="post" novalidate>
        @csrf
        <div class="form-floating mt-3 has-validation">

            <input type="text" name="name" required class="form-control" id="name" value="{{old('name')}}" placeholder="Enter Your Name"><br>
            <!-- @error('name')
            <div>dfs</div>
        @enderror -->
            <label for="name">Name</label>

            @if($errors->has('name'))
            <div class="invalid-feedback text-danger"><strong>{{$errors->first('name')}}</strong></div>
            @endif
        </div>




        <div class="form-check">
            <input type="radio" name="gender" required id="male" class="form-check-input" value="male" {{old('gender')=='male'?'checked':''}}> <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" required id="female" class="form-check-input" value="female" {{old('gender')=='female'?'checked':''}}> <label for="female" class="form-check-label">Female</label><br>
        </div>

        @if($errors->has('gender'))
        <div class="invalid-feedback text-danger">><strong>{{$errors->first('gender')}}</strong></div>
        @endif
        <div class="form-floating mb-3 mt-3">

            <input type="text" name="age" required id="age" class="form-control" value="{{old('age')}}" placeholder="Enter Your Age"><br>
            <label for="age">Age</label>
        </div>
        @if($errors->has('age'))
        <div class="invalid-feedback text-danger">><strong>{{$errors->first('age')}}</strong></div>
        @endif
        <label for="class">Class</label>
        <select name="class" id='class' class="form-select text-lg" required>
            <option disabled selected value="">Select a class</option>
            <option value="class 01" {{old('class')=='class 01'?'selected':''}}>class 01</option>
            <option value="class 02" {{old('class')=='class 02'?'selected':''}}>class 02</option>
            <option value="class 03" {{old('class')=='class 03'?'selected':''}}>class 03</option>
            <option value="class 04" {{old('class')=='class 04'?'selected':''}}>class 04</option>
            <option value="class 05" {{old('class')=='class 05'?'selected':''}}>class 05</option>
        </select><br>
        @if($errors->has('class'))
        <div class="invalid-feedback text-danger"><strong>{{$errors->first('class')}}</strong></div>
        @endif

        <div class="form-ckeck mt-2"><input type="checkbox" required name="courses[]" class="form-check-input" id="science" value="science" {{in_array('science',old('courses',[]))?'checked':''}}><label for="science" class="form-check-label">Science</label><br></div>
        <div class="form-ckeck mt-2 mb-2"><input type="checkbox" required name="courses[]" class="form-check-input" id="maths" value="maths" {{in_array('maths',old('courses',[]))?'checked':''}}><label for="maths" class="form-check-label">Maths</label><br></div>


        @if($errors->has('courses'))
        <div class="invalid-feedback text-danger"><strong>{{$errors->first('courses')}}</strong></div>
        @endif
        <input type="submit" value="Register" class="btn btn-success btn-lg">

    </form>

</div>

@endsection