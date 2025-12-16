<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">
  <div class="container shadow-sm p-3 my-5 bg-body-tertiary rounded">
    <div class="my-1">
      <h1>@yield('title')</h1>
    </div>
    @yield('content')
    @stack('scripts')

  </div>

  <script>

    document.addEventListener('click', function (e) {
  if (!e.target.classList.contains('show-detail')) return;

  const btn = e.target;

  Swal.fire({
    title: 'Product Detail',
    html: `
      <div style="text-align:left">
        <p><b>Name:</b> ${btn.dataset.name}</p>
        <p><b>Price:</b> $${btn.dataset.price}</p>
        <p><b>Stock:</b> ${btn.dataset.stock}</p>
        <p><b>Description:</b><br>${btn.dataset.description}</p>
      </div>
    `,
    icon: 'info',
    confirmButtonText: 'Close'
  });
});

    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-delete').forEach(function (button) {
        button.addEventListener('click', function (e) {
          e.preventDefault();
          const form = button.closest('form');
          if (!form) return;
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>