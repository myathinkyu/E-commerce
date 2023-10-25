@extends("layout.master")

@section("title","Product Home Page")

@section("content")
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
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">
            @if(\app\classes\Session::has("product_insert_success"))
            {{\app\classes\Session::flash("product_insert_success")}}
            @endif

            <!-- Table Start -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="text-muted">
                            <th>{{$product->id}}</th>
                            <td><img src="{{$product->image}}" style="max-width:100px; max-height:150px"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            
                            <td>
                                <a href="/E-commerce/public/admin/product/{{$product->id}}/edit" class="text-warning"><i class="fa fa-edit text-warning"></i></a>
                                <a href="/E-commerce/public/admin/product/{{$product->id}}/delete"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Table End -->

            <div class="mt-2 offset-md-4">
                {!! $pages !!}
            </div>
        </div>
    </div>
</div>
                








@endsection