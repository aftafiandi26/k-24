@extends('template.template')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Update Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Uers {{ $user->name }}</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Update</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="access" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select name="access" id="access" class="form-control">
                                    <option value="">-choose role-</option>
                                    <option value="user" @if ($user->access === "user") selected @endif>User</option>
                                    <option value="member" @if ($user->access === "member") selected @endif>Member</option>
                                    <option value="admin" @if ($user->access === "admin") selected @endif>Administrator</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="">-status-</option>
                                    <option value="1" @if ($user->status === 1) selected @endif>Active</option>
                                    <option value="0" @if ($user->status === 0) selected @endif>Deactive</option>or</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    save
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
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