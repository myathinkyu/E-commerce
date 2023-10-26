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
    <div class="row">
        @foreach($featured as $product)
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">{{$product->name}}</div>
                <div class="card-block">
                    <img src="{{$product->image}}" alt="" width="120px" height="150px">
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">
                        <a href="/E-commerce/public/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <span>${{$product->price}}</span>
                        <button class="btn btn-info btn-sm" onclick="addToCart('{{$product->id}}')">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h3 class="text-info">All Products</h3>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header">{{$product->name}}</div>
                <div class="card-block">
                    <img src="{{$product->image}}" alt="" width="120px" height="150px">
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">    
                        <a href="/E-commerce/public/product/{{$product->id}}/detail" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <span>${{$product->price}}</span>
                        <button class="btn btn-info btn-sm" onclick="addToCart('{{$product->id}}')">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-2 offset-md-4">
            {!! $pages !!}
    </div>


</div>

@endsection

