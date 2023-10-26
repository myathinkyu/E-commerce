
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white english" href="#">
            <img src="<?php echo e(asset("images/projectlogo.png")); ?>" alt="" width="30" height="30" class="rounded">
            <span class="ml-2">A L F R E D O</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white english" href="/E-commerce/public/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="/E-commerce/public/admin">Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white english" href="/E-commerce/public/cart">
                        Cart
                        <span class="badge badge-danger badge-pill" style="position: relative; bottom:10px; left:-3px;" id="cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white english" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if(\app\classes\auth::check()): ?>
                            <?php echo e(\app\classes\auth::user()->name); ?>

                        <?php else: ?>
                            Member
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(\app\classes\auth::check()): ?>
                            <a class="dropdown-item" href="/E-commerce/public/user/logout">Logout</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="/E-commerce/public/user/login">Login</a>
                            <a class="dropdown-item" href="/E-commerce/public/user/register">Register</a>
                        <?php endif; ?>
                        
                        
                    </div>
                </li>
            </ul>
        </div>
    </nav>


<?php $__env->startSection('script'); ?>