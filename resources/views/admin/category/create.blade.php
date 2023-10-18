@extends('layout.master')

@section('title','Category Create')

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
    <h3 class="text-primary text-center english">Create Category</h3>
        
    <!-- @if(\app\classes\session::has("error"))
    {{\app\classes\session::flash("error")}}
    @endif -->

    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>

        <div class="col-md-8">
            @include("layout.report_message")

            @if(\app\classes\session::has("delete_success"))
                {{\app\classes\session::flash("delete_success")}}
            @endif
            @if(\app\classes\session::has("delete_fail"))
                {{\app\classes\session::flash("delete_fail")}}
            @endif

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
                            <i class="fa fa-edit text-warning" onclick="fun('{{$cat->name}}','{{$cat->id}}')" id="edit-cat"></i>
                            <a href="/E-commerce/public/admin/category/{{$cat->id}}/delete"><i class="fa fa-trash text-danger"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>

            <div class="mt-5"></div>
            {!! $pages !!}

        </div>
    </div>
</div>

<!-- Modal Start -->
<div class="modal" id="CatUpdateModel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form>
            <div class="form-group">
                <label for="name" class="english">Category Name</label>
                <input type="text" class="form-control" id="edit-name" >
            </div>
            <input type="hidden" name="edit-token" value="{{\app\classes\CSRFtoken::_token()}}">
            <div class="row justify-content-end no-gutters mt-2">
                <button type="submit" class="btn btn-primary btn-sm english">Create</button>
            </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
@endsection


@section('script')
    <script>
        function fun(name, id){
            //alert("Name is " + name + " ID is "+ id);
            $("#CatUpdateModel") . modal("show");
        }
    </script>
@endsection