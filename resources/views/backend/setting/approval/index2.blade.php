@extends('backend.layout.app')

@php
    $create = 0;
    $read = 0;
    $update = 0;
    $delete = 0;

    foreach ($pages as $r) {
        if ($r->page_name == $name) {
            if ($r->action == 'Create') {
                $create = $r->access;
            }

            if ($r->action == 'Read') {
                $read = $r->access;
            }

            if ($r->action == 'Update') {
                $update = $r->access;
            }

            if ($r->action == 'Delete') {
                $delete = $r->access;
            }
        }
    }
@endphp

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('approval.index') }}">{{ $name }}</a>
            </li>
            <li class="breadcrumb-item text-uppercase">DEPARTEMEN {!! $departemen->departemen_name !!}
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($update == 1)
                        <table class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>Approval</th>
                                    <th>Departemen</th>
                                    <th>Ordinal</th>
                                    <th>Pic</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approval as $app)
                                    <form action="{{ route('approval.update', $app->app_id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <tr>
                                            <td>
                                                <select name="user_id" class="form-control form-control-sm user"
                                                    id="user_id{{ $app->app_id }}">
                                                    @foreach ($users as $u)
                                                        @if (old('user_id', $app->user_id) == $u->id)
                                                            <option value="{{ $u->id }}" name="user_id" selected>
                                                                {{ $u->name }}</option>
                                                        @else
                                                            <option value="{{ $u->id }}" name="user_id">
                                                                {{ $u->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="departemen_id" class="form-control form-control-sm departemen"
                                                    id="departemen_id{{ $app->app_id }}">
                                                    @foreach ($departemens as $d)
                                                        @if (old('departemen_id', $app->departemen_id) == $d->departemen_id)
                                                            <option value="{{ $d->departemen_id }}" name="departemen_id"
                                                                selected>
                                                                {{ $d->departemen_name }}</option>
                                                        @else
                                                            <option value="{{ $d->departemen_id }}" name="departemen_id">
                                                                {{ $d->departemen_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="app_ordinal" id="app_ordinal"
                                                    class="form-control form-control-sm" placeholder="Masukan Ordinal ex: 1"
                                                    min="1" max="4" step="1"
                                                    value="{{ old('app_ordinal', $app->app_ordinal) }}">
                                            </td>
                                            <td>
                                                <select name="sc_id" class="form-control form-control-sm sc"
                                                    id="sc_id{{ $app->app_id }}">
                                                    @foreach ($cutis as $c)
                                                        @if (old('sc_id', $app->sc_id) == $c->sc_id)
                                                            <option value="{{ $c->sc_id }}" name="sc_id"
                                                                selected>
                                                                {{ $c->pic_name }}</option>
                                                        @else
                                                            <option value="{{ $c->sc_id }}" name="sc_id">
                                                                {{ $c->pic_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fa fa-edit"></i></button>
                                                @if ($delete == 1)
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{ $app->app_id }}" id="#myBtn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    </form>

                                    <div class="modal fade" id="exampleModal{{ $app->app_id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                        {{ $u->name }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('approval.destroy', $app->app_id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#sc_id{{ $app->app_id }}').select2();
                                            $('#user_id{{ $app->app_id }}').select2();
                                            $('#departemen_id{{ $app->app_id }}').select2();
                                        });
                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if ($create == 1)
                        <table class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>Approval</th>
                                    <th>Departemen</th>
                                    <th>Ordinal</th>
                                    <th>Pic</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('approval.store') }}" method="post">
                                    @csrf
                                    <tr>
                                        <td>
                                            <select name="user_id" class="form-control form-control-sm userSelect"
                                                id="user_id">
                                                @foreach ($users as $u)
                                                    @if (old('user_id') == $u->id)
                                                        <option value="{{ $u->id }}" name="user_id" selected>
                                                            {{ $u->name }}</option>
                                                    @else
                                                        <option value="{{ $u->id }}" name="user_id">
                                                            {{ $u->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="departemen_id"
                                                class="form-control form-control-sm departemenSelect" id="departemen_id">
                                                @foreach ($departemens as $d)
                                                    @if (old('departemen_id') == $d->departemen_id)
                                                        <option value="{{ $d->departemen_id }}" name="departemen_id"
                                                            selected>
                                                            {{ $d->departemen_name }}</option>
                                                    @else
                                                        <option value="{{ $d->departemen_id }}" name="departemen_id">
                                                            {{ $d->departemen_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="app_ordinal" id="app_ordinal"
                                                class="form-control form-control-sm" placeholder="Masukan Ordinal ex: 1"
                                                min="1" max="4" step="1"
                                                value="{{ old('app_ordinal') }}">
                                        </td>
                                        <td>
                                            <select name="sc_id" class="form-control form-control-sm sc"
                                                    id="sc_id">
                                                    @foreach ($cutis as $c)
                                                        @if (old('sc_id') == $c->sc_id)
                                                            <option value="{{ $c->sc_id }}" name="sc_id"
                                                                selected>
                                                                {{ $c->pic_name }}</option>
                                                        @else
                                                            <option value="{{ $c->sc_id }}" name="sc_id">
                                                                {{ $c->pic_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="fa fa-save"></i></button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sc_id').select2();
            $('#user_id').select2();
            $('#departemen_id').select2();
        });
    </script>
@endsection
