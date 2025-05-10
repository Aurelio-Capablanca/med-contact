@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Doctors List</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createDoctorModal">
                        <i class="ti ti-plus"></i> Create New Doctor
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
                                <th>Phone</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tbody-rows">
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{$doctor->nameDoctor}}</td>
                                    <td>{{$doctor->lastnameDoctor}}</td>
                                    <td>{{$doctor->emailDoctor}}</td>
                                    <td>{{$doctor->phoneDoctor}}</td>
                                    <td>
                                        {{-- {{ route('edit-user.modal', $user->idDoctor) }} --}}
                                        <a href=""
                                           class="btn btn-sm btn-info"
                                           data-bs-toggle="modal"
                                           id="editUsers"
                                           data-bs-target="#editDoctorModal">
                                            Edit
                                        </a>
                                        {{-- {{ route('delete-user', $user->idDoctor) }} --}}
                                        <form action="" method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
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

    <div class="modal fade" id="createDoctorModal" tabindex="-1" aria-labelledby="createDoctorModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDoctorModalLabel">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('create-doctor') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text"
                                           class="form-control @error('nameDoctor') is-invalid @enderror"
                                           name="nameDoctor"
                                           required>
                                    @error('nameDoctor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text"
                                           class="form-control @error('lastnameDoctor') is-invalid @enderror"
                                           name="lastnameDoctor"
                                           required>
                                    @error('lastnameDoctor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control @error('emailDoctor') is-invalid @enderror"
                                   name="emailDoctor"
                                   value="{{ old('emailDoctor') }}"
                                   required>
                            @error('emailDoctor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"
                                   class="form-control @error('phoneDoctor') is-invalid @enderror"
                                   name="phoneDoctor"
                                   required>
                            @error('phoneDoctor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Description</label>
                            <textarea type="text"
                                      class="form-control @error('descriptionDoctor') is-invalid @enderror"
                                      name="descriptionDoctor"
                                      required>
                                </textarea>
                            @error('descriptionDoctor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Doctor</button>
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
                var modal = new bootstrap.Modal(document.getElementById('createDoctorModal'));
                modal.show();
            });
        </script>
    @endif

    {{--    @push('scripts')--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editModal = document.getElementById('editDoctorModal');
            // const editForm = document.getElementById('editUserForm');
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

@endsection
