@extends('template.template')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Register Member</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Register Member</li>
    </ol>

    <form action="{{ route('members.update', $member->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $member->users->name }}">
                            @error('name')
                            <div id="name" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $member->users->email}}">
                            @error('email')
                            <div id="email" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="hp" placeholder="input numeric" name="hp" value="{{ old('hp') ?? $member->hp }}">
                            @error('hp')
                            <div id="hp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="tanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') ?? $member->lahir }}">
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
                            <input type="text" class="form-control" id="ktp" placeholder="input numeric" name="ktp" value="{{ old('ktp') ?? $member->ktp }}">
                            @error('ktp')
                            <div id="ktp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="jenis" class="form-label">Jenis Kelamin</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="">-pilih jenis kelamin-</option>
                                <option value="L" @if ($member->kelamin === "L") selected @endif>laki - laki</option>
                                <option value="P" @if ($member->kelamin === "P") selected @endif>Perempuan</option>
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
                                <img class="img-preview img-fluid mr-3" width="250px" height="250px" alt="unknow" src="{{ asset(Storage::url($member->photo)) }}">
                            </div>
                        </div>
                        <div class="col">
                            <label for="access" class="form-label">Role</label>
                            <select name="access" id="access" class="form-control">
                                <option value="">-select role-</option>
                                <option value="admin" @if ($member->users->access == "admin") selected @endif>Administrator</option>
                                <option value="member" @if ($member->users->access == "member") selected @endif>Member</option>
                                <option value="user" @if ($member->users->access == "user") selected @endif>User</option>
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
</script>
@endpush