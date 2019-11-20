@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- category list -->
        <div class="col-11 col-md-8 pl-0 pr-0 pl-md-3 pr-md-3 mb-3 pb-2" style="display: flex; overflow: scroll">
            @foreach ($category as $key => $val)
                <div class="image-container" style="max-width: 80px; margin-right: 5px">
                    <img src="{{ @$val->imageUrl }}" class="rounded p-2 card" style="width: 80px;" alt="{{ $val->name }}">
                    <div style="font-size: 14px; text-align: center;">{{ @$val->name }}</div>
                </div>
            @endforeach
        </div>
        
        <!-- product promo -->
        <div class="col-md-8 col-12 pb-4">
            @foreach ($productPromo as $key => $val)
                 <div class="image-container pb-3 product-list" product-name="{{ $val->title }}">
                    <div class="card">
                        <img src="{{ @$val->imageUrl }}" data-toggle="modal" data-target="#product-detail-{{ $val->id }}" class="rounded p-2 img-fluid" style="width: 100%;" alt="{{ $val->title }}">
                        <span id="heart" class="heart fa-position-bottom-right"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
                    </div>
                    <div style="font-size: 14px;"><b>{{ @$val->title }}</b></div>
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
                <i class="fa fa-share-alt share-left-position"></i>
                <img src="{{ @$val->imageUrl }}" data-toggle="modal" data-target="#product-detail-{{ $val->id }}" class="rounded p-2 mb-2 img-fluid card" style="width:100%;" alt="...">
                <h4>
                    {{ @$val->title }}
                    <span id="heart" class="heart" style="position: absolute; right: 0; padding-right: 15px"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
                </h4>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".heart").click(function(){
            if($(this).hasClass("liked")){
                $(this).html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                $(this).removeClass("liked");
            }else{
                $(this).html('<i class="fa fa-heart" aria-hidden="true"></i>');
                $(this).addClass("liked");
            }
        });
    });
</script>
@endpush
