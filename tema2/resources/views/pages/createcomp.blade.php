@extends ('layouts.layout')

@section ('content')

<h1>Add your company</h1>
<form method="POST" action="/companies">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input required type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea required id="description" name="description" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@include ('layouts.errors')
@endsection