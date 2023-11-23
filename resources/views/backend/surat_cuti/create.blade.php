@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('surat_cuti.index') }}">{{ $name }}</a>
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
                    <form action="{{ route('surat_cuti.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="pic_id">PIC <span class="text-danger">*</span></label>
                                    <select class="pic form-control form-control-sm" name="pic_id">
                                        @foreach ($pic as $d)
                                            @if (old('pic_id') == $d->id)
                                                <option value="{{ $d->id }}" selected>{{ $d->name }}
                                                </option>
                                            @else
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="pt_id">Penyerahan Tanggung Jawab <span class="text-danger">*</span></label>
                                    <select class="pt form-control form-control-sm" name="pt_id">
                                        @foreach ($pt as $d)
                                            @if (old('pt_id') == $d->id)
                                                <option value="{{ $d->id }}" selected>{{ $d->name }}
                                                </option>
                                            @else
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="cuti_id">Jenis Cuti <span class="text-danger">*</span></label>
                                    <select class="cuti form-control form-control-sm" name="cuti_id">
                                        @foreach ($cuti as $d)
                                            @if (old('cuti_id') == $d->cuti_id)
                                                <option value="{{ $d->cuti_id }}" selected>{{ $d->cuti_jenis }}
                                                </option>
                                            @else
                                                <option value="{{ $d->cuti_id }}">{{ $d->cuti_jenis }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="departemen_id">Departemen <span class="text-danger">*</span></label>
                                    <select class="departemen form-control form-control-sm" name="departemen_id">
                                        @foreach ($departemen as $d)
                                            @if (old('departemen_id') == $d->departemen_id)
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
                                <div class="col-4">
                                    <label for="sc_tgl_ambil_start">Tanggal Awal Cuti <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('sc_tgl_ambil_start')
                                    is-invalid
                                @enderror"
                                        id="sc_tgl_ambil_start" value="{{ old('sc_tgl_ambil_start', date('Y-m-d')) }}"
                                        name="sc_tgl_ambil_start" required>
                                    @error('sc_tgl_ambil_start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="sc_tgl_ambil_end">Tanggal Terakhir Cuti <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('sc_tgl_ambil_end')
                                    is-invalid
                                @enderror"
                                        id="sc_tgl_ambil_end" value="{{ old('sc_tgl_ambil_end') }}" name="sc_tgl_ambil_end"
                                        required>
                                    @error('sc_tgl_ambil_end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="sc_tgl_kembali">Tanggal Kembali Kerja <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                        class="form-control form-control-sm @error('sc_tgl_kembali')
                                    is-invalid
                                @enderror"
                                        id="sc_tgl_kembali" value="{{ old('sc_tgl_kembali') }}" name="sc_tgl_kembali" required>
                                    @error('sc_tgl_kembali')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="sc_no_surat">Nomor Surat <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('sc_no_surat')
                                    is-invalid
                                @enderror" placeholder="Masukan Nomor Surat Cuti"
                                        id="sc_no_surat" value="{{ old('sc_no_surat') }}"
                                        name="sc_no_surat" required>
                                    @error('sc_no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="sc_alamat_cuti">Alamat Cuti <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('sc_alamat_cuti')
                                    is-invalid
                                @enderror" placeholder="Masukan Alamat Cuti"
                                        id="sc_alamat_cuti" value="{{ old('sc_alamat_cuti') }}"
                                        name="sc_alamat_cuti" required>
                                    @error('sc_alamat_cuti')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="sc_no_hp">Nomor HP yang dapat dihubungi selama Cuti <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('sc_no_hp')
                                    is-invalid
                                @enderror" placeholder="Masukan Nomor HP yang dapat dihubungi"
                                        id="sc_no_hp" value="{{ old('sc_no_hp') }}"
                                        name="sc_no_hp" required>
                                    @error('sc_no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <a href="{{ route('surat_cuti.index') }}" class="btn btn-sm btn-info mx-2"><i
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.cuti').select2();
            $('.departemen').select2();
            $('.pic').select2();
            $('.pt').select2();
        });
    </script>
@endsection
