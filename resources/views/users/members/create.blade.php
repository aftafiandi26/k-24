@extends('template.template')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Register Member</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Register Member</li>
    </ol>

    <form action="{{ route('members.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div id="name" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div id="email" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input" onclick="showPassword()">
                                </div>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                            <div id=" password" class="form-text text-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input" onclick="showPasswordConfirm()">
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="hp" placeholder="input numeric" name="hp" value="{{ old('hp') }}">
                            @error('hp')
                            <div id="hp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="tanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                            @error('tanggal')
                            <div id="tanggal" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="ktp" class="form-label">No KTP</label>
                            <input type="text" class="form-control" id="ktp" placeholder="input numeric" name="ktp" value="{{ old('ktp') }}">
                            @error('ktp')
                            <div id="ktp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="jenis" class="form-label">Jenis Kelamin</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="">-pilih jenis kelamin-</option>
                                <option value="L">laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis')
                            <div id="jenis" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage()" value="{{ old('image') }}">

                            @error('image')
                            <div id="image" class="form-text text-danger">{{ $message }}</div>
                            @enderror

                            <div class="mt-2">
                                <img class="img-preview img-fluid " width="250px" height="250px" alt="unknow">
                            </div>
                        </div>
                        <div class="col">
                            <label for="access" class="form-label">Role</label>
                            <select name="access" id="access" class="form-control">
                                <option value="">-select role-</option>
                                <option value="" disabled>Administrator</option>
                                <option value="member">Member</option>
                                <option value="" disabled>User</option>
                            </select>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success">save</button>
                <a href="{{ route('members.index') }}" class="btn btn-sm btn-outline-secondary">back</a>

            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        const oFReader = new FileReader();
        console.log(oFReader);
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function showPassword() {
        const x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPasswordConfirm() {
        const x = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush