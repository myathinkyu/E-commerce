@extends("layout.master")

@section("title","hello")

@section('content')
<style>
    .pagination > li {
        padding: 5px 15px;
        background: #ddd;
        margin-right: 1px;
    }

    #edit-cat{
        cursor: pointer;
    }
</style>

<div class="container my-5">
<h3 class="text-info">Most Popular</h3>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <img src="{{$product->image}}" class="mt-4 ml-3" width="200px" height="240px">
            </div>
            <div class="col-md-9">
                <h4 class="mt-1">{{$product->name}}</h4>
                <p>{{$product->description}}</p>
                <p class="text-black" style="font-size: 20px;">${{$product->price}}</p>
                <button class="btn btn-success col-md-5">Add To Cart</button>
                <p class="mt-3">
                <span>
                    Rate :
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star-half text-warning"></i>
                </span>
                </p>
            </div>
        </div>
    </div>

</div>

@endsection

