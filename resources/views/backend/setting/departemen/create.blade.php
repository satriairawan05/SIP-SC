@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('departemen.index') }}">{{ $name }}</a>
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
                    <form action="{{ route('departemen.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="departemen_name">Departemen Name <span class="text-danger">*</span> </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('departemen_name')
                                    is-invalid
                                @enderror"
                                        id="departemen_name" placeholder="Masukan Nama Departemen"
                                        value="{{ old('departemen_name') }}" name="departemen_name" required>
                                    @error('departemen_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="departemen_alias">Departemen Alias <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('departemen_alias')
                                    is-invalid
                                @enderror"
                                        id="departemen_alias" placeholder="Masukan Alias Departemen"
                                        value="{{ old('departemen_alias') }}" name="departemen_alias" required>
                                    @error('departemen_alias')
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
@endsection
