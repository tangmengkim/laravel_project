@extends('layouts.app')

@section('title')
  <div class="container d-flex justify-content-center">
    <h1>Teachers List</h1>
  </div>
@endsection

@section('content')
  <div  class="container">
    <div class="d-flex justify-content-end mb-2">
      <a href="{{ route('teachers.create') }}" class="btn btn-info text-white">Add Teacher Information</a>
    </div>            

    <table class="table table-light table-hover align-middle">
    <thead class="table table-primary rounded">
      <tr>
        <th>TID</th>
        <th>Full Name</th>
        <th>Gender</th>
        <th>Degree</th>
        <th>Tel</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="table table-light">
      @if ($teachers->count() != 0)


        @foreach ($teachers as $teacher)
          <tr>
            <td>{{ $teacher->tid }}</td>
            <td>{{ $teacher->full_name }}</td>
            <td>{{ $teacher->gender }}</td>
            <td>{{ $teacher->degree }}</td>
            <td>{{ $teacher->tel }}</td>


            <td class="flex">
              <a href="#" class="btn btn-primary btn-view" data-id="{{ $teacher->tid }}" data-name="{{ $teacher->full_name }}"
                data-gender="{{ $teacher->gender }}" data-degree="{{ $teacher->degree }}" data-tel="{{ $teacher->tel }}">
                View
              </a>

              <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-secondary">Edit</a>
              <form action="{{ route('teachers.destroy', $teacher->tid) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  @if ($teachers->count() != 0)
  {{  $teachers->links('pagination::bootstrap-5') }}
  @endif
  </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('click', function (e) {
  if (!e.target.classList.contains('btn-view')) return;

  e.preventDefault();
  const btn = e.target;

  Swal.fire({
    title: 'Teacher Detail',
    html: `
      <div style="text-align:left">
        <p><b>ID:</b> ${btn.dataset.id}</p>
        <p><b>Name:</b> ${btn.dataset.name}</p>
        <p><b>Gender:</b> ${btn.dataset.gender}</p>
        <p><b>Degree:</b> ${btn.dataset.degree}</p>
        <p><b>Phone:</b> ${btn.dataset.tel}</p>
      </div>
    `,
    icon: 'info',
    confirmButtonText: 'Close',
    showCloseButton: true
  });
});

</script>
@endpush
