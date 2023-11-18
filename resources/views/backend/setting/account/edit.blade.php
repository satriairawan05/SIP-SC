@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ $name }}</a>
            </li>
            <li class="breadcrumb-item">Edit
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update',$user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('name')
                                    is-invalid
                                @enderror"
                                        id="name" placeholder="Masukan Nama" value="{{ old('name',$user->name) }}" name="name"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="email">Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email"
                                        class="form-control form-control-sm @error('email')
                                    is-invalid
                                @enderror"
                                        id="email" placeholder="Masukan Email" value="{{ old('email',$user->email) }}"
                                        name="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control form-control-sm @error('password')
                                    is-invalid
                                @enderror"
                                        id="password" placeholder="Masukan Password" value="{{ old('password') }}"
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="password-confirm">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control form-control-sm @error('password')
                                    is-invalid
                                @enderror"
                                        id="password-confirm" placeholder="Masukan Password" value="{{ old('password') }}"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="jabatan">Jabatan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('jabatan')
                                    is-invalid
                                @enderror"
                                        id="jabatan" placeholder="Masukan Jabatan" value="{{ old('jabatan',$user->jabatan) }}"
                                        name="jabatan" required>
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="departemen_id">Departemen <span class="text-danger">*</span></label>
                                    <select class="select2 form-control form-control-sm" name="departemen_id">
                                        @foreach ($departemen as $d)
                                            @if (old('departemen_id',$user->departemen_id) == $d->departemen_id)
                                                <option value="{{ $d->departemen_id }}" selected>{{ $d->departemen_name }}
                                                </option>
                                            @else
                                                <option value="{{ $d->departemen_id }}">{{ $d->departemen_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="lokasi_kerja">Lokasi Kerja <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('lokasi_kerja')
                                    is-invalid
                                @enderror"
                                        id="lokasi_kerja" placeholder="Masukan Lokasi Kerja" value="{{ old('lokasi_kerja',$d->lokasi_kerja) }}"
                                        name="lokasi_kerja" required>
                                    @error('lokasi_kerja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="tgl_masuk">Tanggal Masuk <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('tgl_masuk')
                                    is-invalid
                                @enderror"
                                        id="tgl_masuk" placeholder="Masukan Tanggal Masuk Kerja" value="{{ old('tgl_masuk',date('Y-M-d')) }}"
                                        name="tgl_masuk" required>
                                    @error('tgl_masuk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <a href="{{ route('departemen.index') }}" class="btn btn-sm btn-info mx-2"><i
                                            class="fa fa-reply-all"></i></a>
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #showHidePassword {
            position: relative;
        }

        #togglePassword,
        #togglePasswordConfirm {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            $('#togglePassword i').click(function(event) {
                event.preventDefault();
                const passwordInput = $('#password');
                const togglePassword = $('#togglePassword i');

                if (passwordInput.attr('type') === 'text') {
                    passwordInput.attr('type', 'password');
                    togglePassword.removeClass('ti-unlock').addClass('ti-lock');
                } else if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    togglePassword.removeClass('ti-lock').addClass('ti-unlock');
                }
            });

            $('#togglePasswordConfirm i').click(function(event) {
                event.preventDefault();
                const passwordConfirmInput = $('#password-confirm');
                const toggleConfirmPassword = $('#togglePasswordConfirm i');

                if (passwordConfirmInput.attr('type') === 'text') {
                    passwordConfirmInput.attr('type', 'password');
                    toggleConfirmPassword.removeClass('ti-unlock').addClass('ti-lock');
                } else if (passwordConfirmInput.attr('type') === 'password') {
                    passwordConfirmInput.attr('type', 'text');
                    toggleConfirmPassword.removeClass('ti-lock').addClass('ti-unlock');
                }
            });
        });
    </script>
@endsection
