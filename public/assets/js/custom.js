

        
        function addToCart(num){
            var ary = JSON.parse(localStorage.getItem("items"));
            if(ary == null){
                var itemAry = [num];
                localStorage.setItem("items", JSON.stringify(itemAry));
            }else{
                $con = ary.indexOf(num);
                if($con == -1){
                    ary.push(num);
                    localStorage.setItem("items", JSON.stringify(ary));
                }
                
            }
            alert("item already added to cart!");
            getCartItem();
        }

        function getCartItem(){
            let ary = JSON.parse(localStorage.getItem("items"));
            $("#cart-count").html(ary.length);
        }

        function clearCart(){
            localStorage.removeItem("items");
        }
   
getCartItem();