<?php $__env->startSection("title","hello"); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
        <!-- Table Start -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!-- Table End -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function loadProduct(){
            $.ajax({
                type: "POST",
                url: "http://localhost/E-commerce/public/cart",
                data: {
                    "cart" : getCartItem()
                },
                success: function(results){
                    // clearCart();
                    // window.location.href = "/E-commerce/public/cart";
                    console.log(results);
                },
                errors: function(response){
                    console.log(response.responseText);
                }
            })
        }

        function saveProducts()
        {

        }

        function updateProducts()
        {
            
        }

        function showProducts()
        {
            
        }

        function payOut()
        {
            
        }

        loadProduct();

    </script>
<?php $__env->stopSection(); ?>



















<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>