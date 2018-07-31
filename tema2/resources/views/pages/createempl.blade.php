@extends ('layouts.layout')

@section ('content')

<h1>Add your employee</h1>
<form method="POST" action="/employees">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
  <label for="company">Select company</label>
    <select class="form-control" id="company" name="company">
      @foreach($comps as $comp)
        <option>{{$comp}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@include ('layouts.errors')
@endsection