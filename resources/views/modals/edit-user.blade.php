<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="post" action="{{ route('update-user', $user->user_id) }}">
        @csrf
        @method('POST')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text"
                               class="form-control @error('nameUsers') is-invalid @enderror"
                               name="nameUsers"
                               value="{{ $user->nameUsers }}"
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
                               value="{{ $user->lastnameUsers }}"
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
                       value="{{ $user->emailUser }}"
                       required>
                @error('emailUser')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3 d-none">
                <label class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('passUser') is-invalid @enderror"
                       name="passUser"
                       value="{{ $user->passUser  }}"
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
                            {{ $user->typeUser == $type->typeUser ? 'selected' : '' }}>
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
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
