<?php $__env->startSection("title","Cart"); ?>

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
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="tablebody">

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
                    saveProducts(results);
                },
                errors: function(response){
                    console.log(response.responseText);
                }
            })
        }

        function saveProducts(res)
        {
            localStorage.setItem("products", res);
            let results = JSON.parse(localStorage.getItem("products"));
            showProducts(results);
        }

        function addProductQty(id)
        {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) => {
                if(result.id === id) {
                    result.qty = result.qty + 1;
                }
            });

            saveProducts(JSON.stringify(results));
        }

        function reduceProductQty(id)
        {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) => {
                if(result.id === id) {
                    if(result.qty > 1){
                    result.qty = result.qty - 1;
                    }
                }
            });

            saveProducts(JSON.stringify(results));
        }

        function showProducts(results)
        {
            var str = "";
            var total = 0;
            results.forEach((result) => {
                total += result.qty * result.price;
                str += "<tr>";       //table role
                str += `
                <td>${result.id}</td> 
                <td><img src="${result.image}" alt="" width="140px" height="180px"></td>
                <td>${result.name}</td>
                <td>${result.price}</td>
                <td>
                    <i class="fa fa-plus" style="cursor:pointer" onclick="addProductQty(${result.id})"></i>
                    ${result.qty}
                    <i class="fa fa-minus" style="cursor:pointer" onclick="reduceProductQty(${result.id})"></i>
                </td>
                <td>${(result.qty * result.price).toFixed(2)}</td>
                `;
                str += "</tr>";  
                
            });

            str += `
                    <tr>
                        <td colspan="5" style="text-align:right">Total</td>
                        <td>${total.toFixed(2)}</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right">
                            <button class="btn btn-info btn-sm" onclick="payOut()">Check Out</button>
                        </td>
                    </tr>
                `;

            $('#tablebody').html(str);
        }

        function deleteProduct(id)
        {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) =>{
                if(result.id === id){
                    var ind = results.indexOf(result);
                    results.splice(ind, 1);
                }
            });
            deleteItem(id);
            saveProducts(JSON.stringify(results));
        }

        function payOut()
        {
            var results = JSON.parse(localStorage.getItem("products"));

            $.ajax({
                type: "POST",
                url: "http://localhost/E-commerce/public/payout",
                data: {
                    "items" : results,
                    "token" : $("#token").val()
                },
                success: function(results){
                    console.log(results);
                    // clearCart();
                    // showCartItem();
                    // showProducts([]);

                },
                errors: function(response){
                    console.log(response.responseText);
                }
            })
        }

        loadProduct();

    </script>
<?php $__env->stopSection(); ?>



















<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>