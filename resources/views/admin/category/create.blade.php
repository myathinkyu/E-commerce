@extends('layout.master')

@section('title','Category Create')

@section('content') 
    <div class="container my-5">
        <h3 class="text-primary text-center english">Create Category</h3>
        
        <!-- @if(\app\classes\session::has("error"))
            {{\app\classes\session::flash("error")}}
        @endif -->

        <div class="row">
            <div class="col-md-4">
                @include("layout.admin_sidebar")
            </div>
            <div class="col-md-8">
            <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="english">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <input type="hidden" name="token" value="{{\app\classes\CSRFtoken::_token()}}">
                    <div class="row justify-content-end no-gutters mt-2">
                        <button type="submit" class="btn btn-primary btn-sm english">Create</button>
                    </div>
                </form>
            <!-- form end -->
                <ul class="list-group mt-5">
                    @foreach($cats as $cat)
                        <li class="list-group-item">
                            <a href="/E-commerce/public/admin/category/all">{{$cat->name}}</a>
                            <span class="float-right">
                                <i class="fa fa-edit text-warning"></i>
                                <i class="fa fa-trash text-danger"></i>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection



 