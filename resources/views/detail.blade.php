@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <button type="button" class="close" onclick="window.location='{{ url()->previous() }}'" data-dismiss="modal" aria-label="Close" style="position: absolute; z-index: 1; padding-left: 4px;">
                <span aria-hidden="true">&larr;</span>
            </button>
            <i class="fa fa-share-alt share-left-position"></i>
            <img src="{{ @$productPromo->imageUrl }}" data-toggle="modal" data-target="#product-detail-{{ $productPromo->id }}" class="rounded p-2 mb-2 img-fluid card" style="width:100%;" alt="...">
            <h4>
                {{ @$productPromo->title }}
                <span id="heart" class="heart" style="position: absolute; right: 0; padding-right: 15px"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
            </h4>
            <p class="mt-3">{{ @$productPromo->description }}</p>
        </div>
        <div class="col-12 pb-5">
            <div class="float-right">
                {{ @$productPromo->price }}
                <button type="button" class="btn btn-secondary ml-3" onclick="window.location='{{ route("home.buy", $productPromo->id) }}'" data-dismiss="modal">Buy</button>
            </div>
        </div>

    </div>
</div>
@endsection


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
