<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="createDoctorModalLabel">Update Doctor Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form method="POST" action="{{ route('update-doctor', $doctor->idDoctor) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text"
                               class="form-control @error('nameDoctor') is-invalid @enderror"
                               name="nameDoctor"
                               value="{{ $doctor->nameDoctor }}"
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
                               value="{{ $doctor->lastnameDoctor }}"
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
                       value="{{ $doctor->emailDoctor }}"
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
                       value="{{ $doctor->phoneDoctor  }}"
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
                    {{ $doctor->descriptionDoctor  }}
                </textarea>
                @error('descriptionDoctor')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Doctor</button>
        </div>
    </form>
</div>
