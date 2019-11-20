@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <!-- product promo -->
        <div class="col-md-8 col-12 pb-4">
            @foreach ($productPromo as $key => $val)
                <div class="card mb-3 product-list" data-toggle="modal" data-target="#product-detail-{{ $val->id }}" style="max-width: 540px;" product-name="{{ $val->title }}">
                    <div class="row no-gutters">
                        <div class="col-4 col-md-4">
                        <img src="{{ @$val->imageUrl }}" class="rounded p-2 img-fluid" style="width: 100%;" alt="{{ $val->title }}">
                        </div>
                        <div class="col-8 col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $val->title }}</h5>
                                <p class="card-text">{{ $val->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

@push('modal')
@foreach ($productPromo as $key => $val)
<div class="modal fade" id="product-detail-{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ @$val->title }}</h5>
            </div> -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; z-index: 1; padding-left: 4px;">
                    <span aria-hidden="true">&larr;</span>
                </button>
                <img src="{{ @$val->imageUrl }}" data-toggle="modal" data-target="#product-detail-{{ $val->id }}" class="rounded p-2 mb-2 img-fluid card" style="width:100%;" alt="...">
                <h4>{{ @$val->title }}</h4>
                <p class="mt-3">{{ @$val->description }}</p>
            </div>
            <div class="modal-footer">
                {{ @$val->price }}
                <button type="button" class="btn btn-secondary ml-3" data-dismiss="modal">Buy</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endpush

@push('scripts')

@endpush
