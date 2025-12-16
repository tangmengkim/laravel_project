@extends('layouts.app')
{{-- @section('title', 'Edit Teacher Information') --}}

@section('content')
  <div class="container border p-4 mt-4 rounded-3 bg-secondary bg-opacity-10">

    <form method="POST" action="{{ route('teachers.update', $teacher->tid) }}" needs-validation>
      @csrf
      @method('PUT')
      <h1 class="text-center ">Edit Teacher Information</h1>
      <div class="my-3">
        <label for="tidText" class="form-label">TID</label>
        <input type="text" name="tid" disabled value="{{ $teacher->tid }}" class="form-control" id="tidText"
          aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="fullNameText" class="form-label">Full Name</label>
        <input type="text" name="full_name" value="{{ $teacher->full_name }}" class="form-control" id="fullNameText"
          aria-describedby="emailHelp">
      </div>
      <div class="d-flex flex-column my-3">
        <label for="genderText" class="form-label">Gender</label>
        <div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" {{ old('gender', $teacher->gender == "Male" ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" {{ old('gender', $teacher->gender == "Female" ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
        </div>
      </div>
      <div class="my-3">
        <labelfor="degreeText" class="form-label">Degree</label>
          <input type="text" name="degree" value="{{ $teacher->degree }}" class="form-control" id="degreeText"
            aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="telText" class="form-label">Tel</label>
        <input type="text" name="tel" value="{{ $teacher->tel }}" class="form-control" id="telText"
          aria-describedby="emailHelp">
      </div>

      <div class="d-flex justify-content-end gap-2 align-items-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
@endsection