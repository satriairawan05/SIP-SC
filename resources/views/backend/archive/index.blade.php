@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('archive') }}">{{ $name }}</a>
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($departemen as $d)
                            <a href="?departemen_id={!! $d->departemen_id !!}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $d->departemen_name }} <span
                                    class=" badge rounded-pill @if ($scCount == 0) bg-secondary @else bg-primary @endif">
                                    @if($scCount == 0)
                                        No Data
                                    @else
                                    {{ $scCount }}
                                    @endif
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
