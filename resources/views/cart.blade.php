@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <!-- product promo -->
        <div class="col-md-8 col-12 pb-4">
            @foreach ($productPromo as $key => $val)
                <div class="card mb-3 product-list" data-toggle="modal" onclick="window.location='{{ route("home.show", $val['id']) }}'" data-target="#product-detail-{{ $val['id'] }}" style="max-width: 540px;" product-name="{{ $val['title'] }}">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                            <img src="{{ @$val['imageUrl'] }}" class="rounded p-2 img-fluid" style="width: 100%;" alt="{{ $val['title'] }}">
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $val['title'] }}</h5>
                                <p class="card-text">{{ $val['price'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-8 col-12 pb-4">
            <button class="btn btn-block btn-danger" onclick="event.preventDefault(); $('#logout-form').submit();">Logout User</button>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
@endsection

@push('scripts')

@endpush
