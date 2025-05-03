@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create New User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create-user') }}">
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
                                    <option value="{{ $type->idTypeUsers }}"
                                        {{ 'selected' }}>
                                        {{ $type->typeUser }}
                                    </option>
                                @endforeach
                            </select>
                            @error('typeUser')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="col s12 m12 12">
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tbody-rows">
                            @foreach($users as  $user)
                                <tr>
                                    <td>{{$user->nameUsers}}</td>
                                    <td>{{$user->lastnameUsers}}</td>
                                    <td>{{$user->emailUser}}</td>
                                    <td>{{$user->typeUser}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
