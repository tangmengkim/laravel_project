@extends('layouts.app')
{{-- @section('title', 'Add Teacher Information') --}}

@section('content')
  <div class="container p-4 mt-4 rounded-3 ">

    <form method="POST" action="{{ route('teachers.store') }}"  needs-validation>
      @csrf
      <h1 class="text-center " >Add Teacher Information</h1>
      <div class="my-3">
        <label for="fullNameText" class="form-label">Full Name</label>
        <input type="text" name="full_name"  class="form-control" id="fullNameText" aria-describedby="emailHelp">
      </div>
      <div class="d-flex flex-column my-3">
        <label for="genderText" class="form-label">Gender</label>
        <div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
        </div>
      </div>
      <div class="my-3">
        <label for="degreeText" class="form-label">Degree</label>
        <input type="text" name="degree"  class="form-control" id="degreeText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="telText" class="form-label">Tel</label>
        <input type="text" name="tel"  class="form-control" id="telText" aria-describedby="emailHelp">
      </div>

      <div class=" d-flex justify-content-end gap-2">

        <button type="submit" class="btn bg-success text-light">Add</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
@endsection