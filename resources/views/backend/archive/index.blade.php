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
                        @if (auth()->user()->departemen_id != null)
                            @php
                            $app = \App\Models\Approval::latest('app_ordinal')->first();
                                $scCount = \App\Models\SuratCuti::where('departemen_id', auth()->user()->departemen_id)
                                ->where('sc_approved_step',$app->app_ordinal)->count();
                                $dept = \App\Models\Departemen::where('departemen_id', auth()->user()->departemen_id)->first();
                            @endphp
                            <a href="?departemen_id={!! $dept->departemen_id !!}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $dept->departemen_name }}
                                <span
                                    class="badge rounded-pill @if ($scCount == 0) bg-secondary @else bg-primary @endif">
                                    {{ $scCount == 0 ? 'Empty Data' : $scCount }}
                                </span>
                            </a>
                        @else
                            @foreach ($departemen as $d)
                                @php
                                    $scCount = \App\Models\SuratCuti::where('departemen_id', $d->departemen_id)
                                        ->count();
                                @endphp
                                <a href="?departemen_id={!! $d->departemen_id !!}"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $d->departemen_name }}
                                    <span
                                        class="badge rounded-pill @if ($scCount == 0) bg-secondary @else bg-primary @endif">
                                        {{ $scCount == 0 ? 'Empty Data' : $scCount }}
                                    </span>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
