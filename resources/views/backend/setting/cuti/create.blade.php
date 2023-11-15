@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('cuti.index') }}">{{ $name }}</a>
            </li>
            <li class="breadcrumb-item">Create
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cuti.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="cuti_jenis">Jenis Cuti <span class="text-danger">*</span> </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('cuti_jenis')
                                    is-invalid
                                @enderror"
                                        id="cuti_jenis" placeholder="Masukan Jenis Cuti"
                                        value="{{ old('cuti_jenis') }}" name="cuti_jenis" required>
                                    @error('cuti_jenis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="cuti_jumlah">Jumlah Hari <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('cuti_jumlah')
                                    is-invalid
                                @enderror"
                                        id="cuti_jumlah" placeholder="Masukan Jumlah Cuti"
                                        value="{{ old('cuti_jumlah') }}" name="cuti_jumlah" required>
                                    @error('cuti_jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <a href="{{ route('cuti.index') }}" class="btn btn-sm btn-info mx-2"><i
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
@endsection
