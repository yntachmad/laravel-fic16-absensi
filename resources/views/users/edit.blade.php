@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Advanced Forms')
=======
@section('title', 'Edit User')
>>>>>>> 66e4cb0 (edit)

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Users</h2>
<<<<<<< HEAD



=======
>>>>>>> 66e4cb0 (edit)
                <div class="card">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
<<<<<<< HEAD
                                    name="name" value="{{ old('name', $user->name) }}">
=======
                                    name="name" value="{{ $user->name }}">
>>>>>>> 66e4cb0 (edit)
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
<<<<<<< HEAD
                                    name="email" value="{{ old('email', $user->email) }}">
=======
                                    name="email" value="{{ $user->email }}">
>>>>>>> 66e4cb0 (edit)
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')
                                is-invalid
<<<<<<< HEAD
                                @enderror"
=======
                            @enderror"
>>>>>>> 66e4cb0 (edit)
                                        name="password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
<<<<<<< HEAD
                                <input type="number"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" value="{{ old('position', $user->position) }}"
                                    class="form-control @error('position')
                                is-invalid
                            @enderror"
                                    name="position">
=======
                                <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text"
                                    class="form-control @error('position')
                                is-invalid
                            @enderror"
                                    name="position" value="{{ $user->position }}">
>>>>>>> 66e4cb0 (edit)
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Department</label>
<<<<<<< HEAD
                                <input type="text" value="{{ old('department', $user->department) }}"
                                    class="form-control @error('department')
                                is-invalid
                            @enderror"
                                    name="department">
                                @error('department')
=======
                                <input type="text"
                                    class="form-control @error('department')
                                is-invalid
                            @enderror"
                                    name="department" value="{{ $user->department }}">
                                @error('departement')
>>>>>>> 66e4cb0 (edit)
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
<<<<<<< HEAD
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            @if ($user->roles == 'admin') checked @endif>
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="supervisor" class="selectgroup-input"
                                            @if ($user->roles == 'supervisor') checked @endif>
                                        <span class="selectgroup-button">Supervisor</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="staff" class="selectgroup-input"
                                            @if ($user->roles == 'staff') checked @endif>
=======
                                        <input type="radio" name="role" value="admin" class="selectgroup-input"
                                            @if ($user->role == 'admin') checked @endif>
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="supervisor" class="selectgroup-input"
                                            @if ($user->role == 'supervisor') checked @endif>
                                        <span class="selectgroup-button">Supervisor</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="staff" class="selectgroup-input"
                                            @if ($user->role == 'staff') checked @endif>
>>>>>>> 66e4cb0 (edit)
                                        <span class="selectgroup-button">Staff</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
