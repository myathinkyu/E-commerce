@extends("layout.master")

@section("title","User Login")

@section("content")

<div class="container my-5">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-5 text-center text-info english">User Login</h3>
        @if(\app\classes\session::has("success_message"))
            {{\app\classes\session::flash("success_message")}}
        @endif

        @if(\app\classes\session::has("error_message"))
            {{\app\classes\session::flash("error_message")}}
        @endif
        <form action="/E-commerce/public/user/login" method="post">
            <input type="hidden" name="token" value="{{\app\classes\CSRFtoken::_token()}}">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>  
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>  
            </div>
            <div class="row no-gutters justify-content-between">
                <a href="/E-commerce/public/user/register">Not member yet! Please login Here!</a>
                <span>
                    <button class="btn btn-outline-warning btn-sm">Cancel</button>
                    <button class="btn btn-primary btn-sm">Login</button>
                </span>
            </div>
        </form>
    </div>
</div>

@endsection