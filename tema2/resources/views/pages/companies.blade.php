@extends ('layouts.layout')

@section ('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comps as $comp)
    <tr>
      <th scope="row">{{$comp->id}}</th>
      <td>{{$comp->name}}</td>
      <td>{{$comp->description}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<p class="lead">
        <a href="/companies/create" class="btn btn-lg btn-secondary">Add your company</a>
</p>

<form method="post" action="/companies/{{ $comp->id }}">
    {{ method_field('PUT') }}
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="destroy">ID of company to update: </label>
      <select class="form-control" id="id" name="id">
        @foreach($comps as $comp)
          <option>{{$comp->id}}</option>
        @endforeach
      </select>
      </div>

      <div class="form-group">
          <label for="name">Name</label>
          <input required type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea required id="description" name="description" class="form-control"></textarea>
        </div>

       <div class="form-group">
       <button type="submit" class="btn btn-primary">Update</button>
       </div>
    </form>



<form method="post" action="/companies/{{ $comp->id }}">
    {{ method_field('DELETE') }}
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="destroy">ID of company to delete: </label>
      <select class="form-control" id="id" name="id">
        @foreach($comps as $comp)
          <option>{{$comp->id}}</option>
        @endforeach
      </select>
      </div>
       <div class="form-group">
       <button type="submit" class="btn btn-danger">Delete</button>
       </div>
    </form>

@endsection
