@extends ('layouts.layout')

@section ('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Company ID</th>
      <th scope="col">Company Name</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @forelse($empls as $empl)
    <tr>
      <th scope="row">{{$empl->id}}</th>
      <td>{{$empl->company_id}}</td>
      <td>{{$empl->human->name}}</td>
      <td>{{$empl->name}}</td>
    </tr>
    @empty
      <tr>No employees</tr>
    @endforelse
  </tbody>
</table>


<p class="lead">
        <a href="/employees/create" class="btn btn-lg btn-secondary">Add your employee</a>
</p>


<form method="post" action="/employees/{{ $empl->id }}">
    {{ method_field('PUT') }}
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="destroy">ID of employee to update: </label>
      <select class="form-control" id="id" name="id">
        @foreach($empls as $empl)
          <option>{{$empl->id}}</option>
        @endforeach
      </select>
      </div>

      <div class="form-group">
          <label for="name">Name</label>
          <input required type="text" class="form-control" id="name" name="name">
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
       <button type="submit" class="btn btn-primary">Update</button>
       </div>
    </form>


<form method="post" action="/employees/{{ $empl->id }}">
    {{ method_field('DELETE') }}
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="destroy">ID of employee to delete: </label>
       
      <select class="form-control" id="id" name="id">
        @foreach($empls as $empl)
          <option>{{$empl->id}}</option>
        @endforeach
      </select>
      </div>

       <div class="form-group">
       <button type="submit" class="btn btn-danger">Delete</button>
       </div>
    </form>

@endsection