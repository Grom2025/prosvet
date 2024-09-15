<x-layout>
    <script>
        var flyingSpeed = 25;
        var txt_totalPrice = 'Всего: ';
        var shopping_cart_div = false;
        var flyingDiv = false;
        var currentProductDiv = false;
        var shopping_cart_x = false;
        var shopping_cart_y = false;
        var slide_xFactor = false;
        var slide_yFactor = false;
        var diffX = false;
        var diffY = false;
        var currentXPos = false;
        var currentYPos = false;

        var ajaxObjects = new Array();


        function shoppingCart_getTopPos(inputObj)
        {
            var returnValue = inputObj.offsetTop;
            while((inputObj = inputObj.offsetParent) != null){
                if(inputObj.tagName!='HTML')returnValue += inputObj.offsetTop;
            }
            return returnValue;
        }

        function shoppingCart_getLeftPos(inputObj)
        {
            var returnValue = inputObj.offsetLeft;
            while((inputObj = inputObj.offsetParent) != null){
                if(inputObj.tagName!='HTML')returnValue += inputObj.offsetLeft;
            }
            return returnValue;
        }


        function addToBasket(productId)
        {
            if(!shopping_cart_div)shopping_cart_div = document.getElementById('shopping_cart');
            if(!flyingDiv){
                flyingDiv = document.createElement('DIV');
                flyingDiv.style.position = 'absolute';
                document.body.appendChild(flyingDiv);
            }

            shopping_cart_x = shoppingCart_getLeftPos(shopping_cart_div);
            shopping_cart_y = shoppingCart_getTopPos(shopping_cart_div);

            currentProductDiv = document.getElementById('slidingProduct' + productId);

            currentXPos = shoppingCart_getLeftPos(currentProductDiv);
            currentYPos = shoppingCart_getTopPos(currentProductDiv);

            diffX = shopping_cart_x - currentXPos;
            diffY = shopping_cart_y - currentYPos;



            var shoppingContentCopy = currentProductDiv.cloneNode(true);
            shoppingContentCopy.id='';
            flyingDiv.innerHTML = '';
            flyingDiv.style.left = currentXPos + 'px';
            flyingDiv.style.top = currentYPos + 'px';
            flyingDiv.appendChild(shoppingContentCopy);
            flyingDiv.style.display='block';
            flyingDiv.style.width = currentProductDiv.offsetWidth + 'px';
            flyToBasket(productId);

        }


        function flyToBasket(productId)
        {
            var maxDiff = Math.max(Math.abs(diffX),Math.abs(diffY));
            var moveX = (diffX / maxDiff) * flyingSpeed;;
            var moveY = (diffY / maxDiff) * flyingSpeed;

            currentXPos = currentXPos + moveX;
            currentYPos = currentYPos + moveY;

            flyingDiv.style.left = Math.round(currentXPos) + 'px';
            flyingDiv.style.top = Math.round(currentYPos) + 'px';


            if(moveX>0 && currentXPos > shopping_cart_x){
                flyingDiv.style.display='none';
            }
            if(moveX<0 && currentXPos < shopping_cart_x){
                flyingDiv.style.display='none';
            }

            if(flyingDiv.style.display=='block')setTimeout('flyToBasket("' + productId + '")',10); else ajaxAddProduct(productId);
        }

        function showAjaxBasketContent(ajaxIndex)
        {
            // Getting a reference to the shopping cart items table
            var itemBox = document.getElementById('shopping_cart_items');

            var productItems = ajaxIndex.split('|||');	// Breaking response from Ajax into tokens

            if(document.getElementById('shopping_cart_items_product' + productItems[0])){	// A product with this id is allready in the basket - just add number items
                var row = document.getElementById('shopping_cart_items_product' + productItems[0]);
                var items = row.cells[0].innerHTML /1;
                items = items + 1;
                row.cells[0].innerHTML = items;
            }else{	// Products isn't allready in the basket - add a new row
                var tr = itemBox.insertRow(-1);
                tr.id = 'shopping_cart_items_product' + productItems[0];
                tr.setAttribute('fid',productItems[0]);

                var td = tr.insertCell(-1);
                td.innerHTML = '1'; 	// Number of items

                var td = tr.insertCell(-1);
                td.innerHTML = productItems[1]; 	// Description

                var td = tr.insertCell(-1);
                td.style.textAlign = 'right';
                td.innerHTML = productItems[2]; 	// Price

                var td = tr.insertCell(-1);
                td.style.textAlign = 'center';
                var a = document.createElement('A');
                td.appendChild(a);
                a.href = '#';
                a.onclick = function(){ removeProductFromBasket(productItems[0]); };
                var img = document.createElement('DIV');
                img.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='42' height='42' fill='currentColor' class='bi bi-node-minus-fill' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M16 8a5 5 0 0 1-9.975.5H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025A5 5 0 0 1 16 8m-2 0a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5A.5.5 0 0 0 14 8'/></svg>";
                a.appendChild(img);

                var td = tr.insertCell(-1);
                var a = document.createElement('A');
                td.appendChild(a);
                td.style.textAlign = 'center';
                a.href = '#';
                a.onclick = function(){ addProductToBasket(productItems[0]); };
                var img = document.createElement('DIV');
                img.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='42' height='42' fill='currentColor' class='bi bi-node-plus-fill' viewBox='0 0 16 16'><path d='M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13m.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0'/></svg>";
                a.appendChild(img);
                //td.innerHTML = '<a href="#" onclick="removeProductFromBasket("' + productItems[0] + '");return false;"><img src="images/remove.gif"></a>';
            }


            updateTotalPrice();

            ajaxObjects[ajaxIndex] = false;

        }

        function updateTotalPrice()
        {
            var itemBox = document.getElementById('shopping_cart_items');
            // Calculating total price and showing it below the table with basket items
            var totalPrice = 0;
            if(document.getElementById('shopping_cart_totalprice')){
                for(var no=1;no<itemBox.rows.length;no++){
                    //console.log(itemBox.rows[no].cells[1].innerHTML +' '+itemBox.rows[no].getAttribute('fid'));
                    totalPrice = totalPrice + (itemBox.rows[no].cells[0].innerHTML.replace(/[^0-9]/g) * itemBox.rows[no].cells[2].innerHTML);

                }
                document.getElementById('shopping_cart_totalprice').innerHTML = txt_totalPrice + totalPrice.toFixed(2);

            }

        }

        function addProductToBasket(productId)
        {
            var productRow = document.getElementById('shopping_cart_items_product' + productId);

            var numberOfItemCell = productRow.cells[0];

                //numberOfItemCell.innerHTML = numberOfItemCell.innerHTML/1 + 1;

            updateTotalPrice();
            ajaxAddProduct(productId);
        }

        function removeProductFromBasket(productId)
        {
            var productRow = document.getElementById('shopping_cart_items_product' + productId);

            var numberOfItemCell = productRow.cells[0];
            if(numberOfItemCell.innerHTML == '1'){
                productRow.parentNode.removeChild(productRow);
            }else{
                numberOfItemCell.innerHTML = numberOfItemCell.innerHTML/1 - 1;
            }
            updateTotalPrice();
            ajaxRemoveProduct(productId);
        }

        function ajaxValidateRemovedProduct(ajaxIndex)
        {
            if(ajaxIndex!='OK')alert('Error while removing product from the database');

        }

        function ajaxRemoveProduct(productId)
        {
            $.ajax({
                url: "{{url('/')}}/basket/remove_from_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{  Cookie::get('otkn') }}",
                    id: productId,
                },
                success: function (response) {
                    console.log(response);
                    ajaxValidateRemovedProduct(response['success']);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }

        function ajaxAddProduct(productId){
            $.ajax({
                url: "{{url('/')}}/basket/add_to_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{  Cookie::get('otkn') }}",
                    id: productId,
                },
                success: function (response) {
                    console.log(response);
                    showAjaxBasketContent(response['success']);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }
        function vis(arr) {
            for (key in arr) {
                console.log(key +' = '+arr[key]);
                showAjaxBasketContent(String(arr[key]));
            }
        }

        function ajaxGetProducts(){
            $.ajax({
                url: "{{url('/')}}/basket/get_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{  Cookie::get('otkn') }}",
                },
                success: function (response) {
                    console.log(response.success);
                    vis(response.success);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }

        function updateOrder(){
            var msg='';
            var itemBox = document.getElementById('shopping_cart_items');
            for(var no=1;no<itemBox.rows.length;no++){

                msg = msg + itemBox.rows[no].cells[1].innerHTML+ " - " + itemBox.rows[no].cells[0].innerHTML +" шт Цена: "+ itemBox.rows[no].cells[2].innerHTML +",";
            }
            msg = "Итого: "+msg + document.getElementById('shopping_cart_totalprice').innerHTML+",";
            $.ajax({
                url: "{{url('/')}}/basket/set_basket_user",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{ Cookie::get('otkn') }}",
                    "user_id": $('#user_id').html(),
                    "mymessage":msg,
                },
                success: function (response) {
                    console.log(response.success);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });

        }

        function placeOrder(){
            console.log('place order')
            // var itemBox = document.getElementById('shopping_cart_items');
            // for(var no=1;no<itemBox.rows.length;no++){
            //     console.log(itemBox.rows[no].getAttribute('fid'));
            //     updateOrder(itemBox.rows[no].getAttribute('fid'));
            // }
            updateOrder();
            ajaxGetProducts();


            window.location = window.location.href;

            //$(document).redirect({{url('/')}});

        }

        $( document ).ready(function() {
            console.log( "ready!" );
            ajaxGetProducts();
            $('#plso').on('click', function (){placeOrder();});
        });
    </script>

    <style>
        .container tr{border-bottom:  rgba(243,158,21,0.87) 1px solid;}
    </style>

    <div class="container">
        <div><br><br><h2>Корзина</h2><br>
            <div id="user_id" style=" display:none; left: -100px; height: 0;width: 0;">
                @auth
                    {{ Auth::user()->id }}
                @endauth
            </div>

            <div id="shopping_cart" class="row py-3">

                <table id="shopping_cart_items">
                    <tr>
                        <th>Кол-во</th>
                        <th>Наименование</th>
                        <th style="text-align: center;">Цена</th>
                        <th></th>
                    </tr>
                </table>

                <div class="text-end fw-bolder" id="shopping_cart_totalprice"></div>
            </div>
            @auth
            <button class="btn btn-lg" style="border-radius: 15px;border-color: rgba(243,158,21,0.87)" id="plso">
                {{__('Place order')}}</button>
            @endauth
            @guest
                <p> <a href="{{url('/login')}}">Войдите</a> или <a href="{{url('/register')}}">зарегистрируйтесь </a>  чтобы оформить заказ.</p>
            @endguest
        </div>
    </div>


</x-layout>
