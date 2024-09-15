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


        function shoppingCart_getTopPos(inputObj) {
            var returnValue = inputObj.offsetTop;
            while ((inputObj = inputObj.offsetParent) != null) {
                if (inputObj.tagName != 'HTML') returnValue += inputObj.offsetTop;
            }
            return returnValue;
        }

        function shoppingCart_getLeftPos(inputObj) {
            var returnValue = inputObj.offsetLeft;
            while ((inputObj = inputObj.offsetParent) != null) {
                if (inputObj.tagName != 'HTML') returnValue += inputObj.offsetLeft;
            }
            return returnValue;
        }


        function addToBasket(productId) {
            if (!shopping_cart_div) shopping_cart_div = document.getElementById('shopping_cart');
            if (!flyingDiv) {
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
            shoppingContentCopy.id = '';
            flyingDiv.innerHTML = '';
            flyingDiv.style.left = currentXPos + 'px';
            flyingDiv.style.top = currentYPos + 'px';
            flyingDiv.appendChild(shoppingContentCopy);
            flyingDiv.style.display = 'block';
            flyingDiv.style.width = currentProductDiv.offsetWidth + 'px';
            flyToBasket(productId);

        }


        function flyToBasket(productId) {
            var maxDiff = Math.max(Math.abs(diffX), Math.abs(diffY));
            var moveX = (diffX / maxDiff) * flyingSpeed;
            ;
            var moveY = (diffY / maxDiff) * flyingSpeed;

            currentXPos = currentXPos + moveX;
            currentYPos = currentYPos + moveY;

            flyingDiv.style.left = Math.round(currentXPos) + 'px';
            flyingDiv.style.top = Math.round(currentYPos) + 'px';


            if (moveX > 0 && currentXPos > shopping_cart_x) {
                flyingDiv.style.display = 'none';
            }
            if (moveX < 0 && currentXPos < shopping_cart_x) {
                flyingDiv.style.display = 'none';
            }

            if (flyingDiv.style.display == 'block') setTimeout('flyToBasket("' + productId + '")', 10); else ajaxAddProduct(productId);
        }

        function showAjaxBasketContent(ajaxIndex) {
            // Getting a reference to the shopping cart items table
            var itemBox = document.getElementById('shopping_cart_items');

            var productItems = ajaxIndex.split('|||');

            if (document.getElementById('shopping_cart_items_product' + productItems[0])) {
                var row = document.getElementById('shopping_cart_items_product' + productItems[0]);
                var items = row.cells[0].innerHTML / 1;
                items = items + 1;
                row.cells[0].innerHTML = items;
            } else {	// Products isn't allready in the basket - add a new row
                var tr = itemBox.insertRow(-1);
                tr.id = 'shopping_cart_items_product' + productItems[0]

                var td = tr.insertCell(-1);
                td.innerHTML = '1'; 	// Number of items

                var td = tr.insertCell(-1);
                td.innerHTML = productItems[1]; 	// Description

                var td = tr.insertCell(-1);
                td.style.textAlign = 'right';
                td.innerHTML = productItems[2]; 	// Price

                var td = tr.insertCell(-1);
                var a = document.createElement('A');
                td.appendChild(a);
                a.href = '#';
                a.onclick = function () {
                    removeProductFromBasket(productItems[0]);
                };
                var img = document.createElement('DIV');
                img.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-node-minus-fill' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M16 8a5 5 0 0 1-9.975.5H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025A5 5 0 0 1 16 8m-2 0a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5A.5.5 0 0 0 14 8'/></svg>";
                a.appendChild(img);
            }
            updateTotalPrice();
            ajaxObjects[ajaxIndex] = false;
        }

        function updateTotalPrice() {
            var itemBox = document.getElementById('shopping_cart_items');
            var totalPrice = 0;
            if (document.getElementById('shopping_cart_totalprice')) {
                for (var no = 1; no < itemBox.rows.length; no++) {
                    totalPrice = totalPrice
                        + (itemBox.rows[no].cells[0].innerHTML.replace(/[^0-9]/g)
                            * itemBox.rows[no].cells[2].innerHTML);
                }
                document.getElementById('shopping_cart_totalprice').innerHTML = txt_totalPrice + totalPrice.toFixed(2);

            }

        }

        function removeProductFromBasket(productId) {
            var productRow = document.getElementById('shopping_cart_items_product' + productId);

            var numberOfItemCell = productRow.cells[0];
            if (numberOfItemCell.innerHTML == '1') {
                productRow.parentNode.removeChild(productRow);
            } else {
                numberOfItemCell.innerHTML = numberOfItemCell.innerHTML / 1 - 1;
            }
            updateTotalPrice();
            ajaxRemoveProduct(productId);
        }

        function ajaxValidateRemovedProduct(ajaxIndex) {
            // if(ajaxIndex!='OK')alert('Error while removing product from the database');
        }

        function ajaxRemoveProduct(productId) {
            $.ajax({
                url: "{{url('/')}}/basket/remove_from_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{ Cookie::get('otkn') }}",
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

        function ajaxAddProduct(productId) {
            $.ajax({
                url: "{{url('/')}}/basket/add_to_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{ Cookie::get('otkn') }}",
                    id: productId,
                },
                success: function (response) {
                    // console.log(response);
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
                // console.log(key +' = '+arr[key]);
                showAjaxBasketContent(String(arr[key]));
            }
        }

        function ajaxGetProducts() {
            $.ajax({
                url: "{{url('/')}}/basket/get_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{ Cookie::get('otkn') }}",
                },
                success: function (response) {
                    // console.log(response.success);
                    vis(response.success);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        }

        $(document).ready(function () {
            // console.log( "ready!" );
            ajaxGetProducts();
        });

    </script>

    <style>
        .container tr {
            border-bottom: rgba(243, 158, 21, 0.87) 1px solid;
        }
        .input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>

    <div class="container">
        <div><br><br><br>

            <div class="row col-4">
                <h1></h1>
                <a href="{{ url()->previous() }}"  class="btn btn-sm "
                   style="border-radius: 15px;border-color: rgba(243,158,21,0.87)">Назад</a>
                <br>
            </div>
            <hr class="featurette-divider">
            <div id="shopping_cart" class="row py-3">
                <strong>Корзина</strong>
                <table id="shopping_cart_items">
                    <tr>
                        <th>Кол-во</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </table>
                <div class="text-end" id="shopping_cart_totalprice"></div>
            </div>
        </div>
        <hr class="featurette-divider">
    </div>
    <div class="container">
        <div class="row text-end mb-3">
            <a href="{{url('/basket')}}" class="btn btn-close-white">Перейти в корзину</a>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row">

        </div>

        <div class="row">
            <div class="col-md-3">
                @php
                    $pic = $rental->pictures()->get();
                    $i=0;
                    foreach($pic as $pi){
                        echo "<div class='row'>";
                        echo "<img class='rounded mx-auto d-block' src=\"/storage/";
                        echo $pi->url;
                        if($i==0)
                            echo  "\" width='512px' height='auto'>";
                        else
                            echo  "\" width='200px' height='auto'>";
                        echo "</div>";
                        $i++;
                    }

                @endphp

            </div>
            <div class="col-md-7" id="slidingProduct{{$rental->id}}">
                <h2 class="fw-normal lh-1">{{$rental->name}}</h2>
                <p class="lead">{{$rental->fexp}}</p>
                <h3 class="text-end">{{$rental->price.' p.'}}</h3>
            </div>
            <div class="col-md-2 text-center md">
                <a href="#" onclick='addToBasket({{$rental->id}});return false;'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                         class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z"></path>
                    </svg>
                </a><br>
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ url('/').'/rental/'.$rental->id.'/edit' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"></path>
                            </svg>
                        </a>
                    @endif
                @endauth

            </div>

        </div>


    </div>
</x-layout>
