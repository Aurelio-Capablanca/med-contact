@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Users List</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createUserModal">
                        <i class="ti ti-plus"></i> Create New User
                    </button>
                </div>
                <div class="card-body">
                    <div class="col s12 m12 12">
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tbody-rows">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->nameUsers}}</td>
                                    <td>{{$user->lastnameUsers}}</td>
                                    <td>{{$user->emailUser}}</td>
                                    <td>{{$user->typeUser}}</td>
                                    <td>
                                        <a href="{{ route('edit-user.modal', $user->user_id) }}"
                                           class="btn btn-sm btn-info"
                                           data-bs-toggle="modal"
                                           id="editUsers"
                                           data-bs-target="#editUserModal">
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('create-user') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text"
                                           class="form-control @error('nameUsers') is-invalid @enderror"
                                           name="nameUsers"
                                           value="{{ old('nameUsers') }}"
                                           required>
                                    @error('nameUsers')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text"
                                           class="form-control @error('lastnameUsers') is-invalid @enderror"
                                           name="lastnameUsers"
                                           value="{{ old('lastnameUsers') }}"
                                           required>
                                    @error('lastnameUsers')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control @error('emailUser') is-invalid @enderror"
                                   name="emailUser"
                                   value="{{ old('emailUser') }}"
                                   required>
                            @error('emailUser')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   class="form-control @error('passUser') is-invalid @enderror"
                                   name="passUser"
                                   required>
                            @error('passUser')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">User Type</label>
                            <select class="form-select @error('typeUser') is-invalid @enderror"
                                    name="typeUser"
                                    required>
                                <option value="">Select User Type</option>
                                @foreach($type_users as $type)
                                    <option value="{{ $type->idTypeUsers }}">
                                        {{ $type->typeUser }}
                                    </option>
                                @endforeach
                            </select>
                            @error('typeUser')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg"></div>
    </div>

    @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = new bootstrap.Modal(document.getElementById('createUserModal'));
                modal.show();
            });
        </script>
    @endif

{{--    @push('scripts')--}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editModal = document.getElementById('editUserModal');
                const editForm = document.getElementById('editUserForm');
                editModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const url = button.getAttribute('href');

                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            this.querySelector('.modal-dialog').innerHTML = html;
                        })
                        .catch(error => {
                            console.error('Error loading modal:', error);
                        });
                });
            });
        </script>
{{--    @endpush--}}
@endsection
