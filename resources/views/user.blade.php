<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel Vuetify 2</title>

<link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="container mt-3">
  <div id="app">
    <div class="row justify-content-between">
      <div class="col-auto">
<<<<<<< HEAD
        <a href="/" class="badge badge-secondary">Back to Home</a>
      </div>
      <div class="col-auto">
=======
>>>>>>> d7b5573c2c2484bba638f0162072c90e268ffc00
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal">
            Add
        </button>
      </div>
<<<<<<< HEAD
=======
      <div class="col-auto">
        <a href="/" class="badge badge-secondary">Back to Home</a>
      </div>
>>>>>>> d7b5573c2c2484bba638f0162072c90e268ffc00
    </div>

    <div class="row">

<table class="table col-sm">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">surname</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
@forelse ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"
                    data-name="{{$user->name}}" data-surname="{{$user->surname}}" data-email="{{$user->email}}">
                    Edit
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal"
                    data-name="{{$user->name}}" data-surname="{{$user->surname}}" data-email="{{$user->email}}">
                    Delete
                </button>
            </div>
            </td>
        </tr>
@empty
        <tr>
            <td>No results</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
@endforelse
    </tbody>
</table>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" method="post" id="EditForm">
      @csrf
        <input name="action" type="hidden" value="edit">
        <input name="email" id="hiddenEmail" type="hidden" value="edit">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input class="form-control" id="inputName" name="name">
        </div>
        <div class="form-group">
          <label for="inputSurname">Surname</label>
          <input class="form-control" id="inputSurname" name="surname">
        </div>
        <div class="form-group">
          <label for="inputEmail">E-mail</label>
          <input class="form-control" id="inputEmail"  disabled>
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('EditForm').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you want to delete : </p>
        <p id="userName"></p>
        <form method="post" id="DeleteForm">
        @csrf
          <input name="action" type="hidden" value="delete">
          <input name="email" id="hiddenEmail" type="hidden" value="edit">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('DeleteForm').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" method="post" id="AddForm">
      @csrf
        <input name="action" type="hidden" value="add">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input class="form-control" id="inputName" name="name">
        </div>
        <div class="form-group">
          <label for="inputSurname">Surname</label>
          <input class="form-control" id="inputSurname" name="surname">
        </div>
        <div class="form-group">
          <label for="inputEmail">E-mail</label>
          <input type="email" class="form-control" id="inputEmail" name="email">
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('AddForm').submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>
$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') // Extract info from data-* attributes
  var surname = button.data('surname')
  var email = button.data('email')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  window.ggg = modal;
  modal.find('.modal-title').text('Edit ' + name + '  ' + surname);
  modal.find('#inputName')[0].value = name;
  modal.find('#inputName')[0].placeholder = name;
  modal.find('#inputSurname')[0].value = surname;
  modal.find('#inputSurname')[0].placeholder = surname;
  modal.find('#inputEmail')[0].value = email;
  modal.find('#inputEmail')[0].placeholder = email;
  modal.find('#inputEmail')[0].disabled = true;
  modal.find('#hiddenEmail')[0].value = email;
  modal.find('#hiddenEmail')[0].placeholder = email;
})

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('name') // Extract info from data-* attributes
  var surname = button.data('surname')
  var email = button.data('email')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  window.ggg = modal;
  modal.find('#userName').text(name + '  ' + surname);
  modal.find('#hiddenEmail')[0].value = email;
  modal.find('#hiddenEmail')[0].placeholder = email;
})
</script>
</body>
</html>
