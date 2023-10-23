@extends("layout.master")

@section("title","Product Create Page")

@section("content")

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">
            @include("layout.report_message")
            <!-- Form Start -->
            <form class="table-bordered p-3" action="/E-commerce/public/admin/product/create" method="post" enctype="multipart/form-data">
                <h3 class="text-center english text-info">Create Product</h3> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select class="form-control" id="cat_id" name="cat_id">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_cat_id">Sub Category</label>
                            <select class="form-control" id="sub_cat_id" name="sub_cat_id">
                                @foreach($sub_cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group">
                        <label for="file">File input</label>
                        <input type="file" class="form-control-file bg-dark text-white" id="file" name="file">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <input type="hidden" name="token" value="{{app\classes\CSRFtoken::_token()}}">

                    <div class="row justify-content-end no-gutters">
                        <button type="rest" class="btn btn-outline-secondary btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-1">Submit</button>
                    </div>
                </form>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>









@endsection