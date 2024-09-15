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
            var i=0;
            if (document.getElementById('shopping_cart_totalprice')) {
                for (var no = 1; no < itemBox.rows.length; no++) {
                    i=i+Number(itemBox.rows[no].cells[0].innerHTML);
                    totalPrice = totalPrice
                        + (itemBox.rows[no].cells[0].innerHTML.replace(/[^0-9]/g)
                            * itemBox.rows[no].cells[2].innerHTML);
                }
                document.getElementById('shopping_cart_totalprice').innerHTML = txt_totalPrice + totalPrice.toFixed(2);

            }
            if(i>0){
                $('#card').css('display','flex');
                $('#cart_num').html(''+i)
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
                url: "{{url('/')}}/basket2/remove_from_basket",
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
                url: "{{url('/')}}/basket2/add_to_basket",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "token": "{{ Cookie::get('otkn') }}",
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
                // console.log(key +' = '+arr[key]);
                showAjaxBasketContent(String(arr[key]));
            }

        }

        function ajaxGetProducts() {
            $.ajax({
                url: "{{url('/')}}/basket2/get_basket",
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

        function Basket(){
            window.location.href='{{url('/basket_shop')}}';
        }


    </script>

    <style>
        .container tr {
            border-bottom: rgba(243, 158, 21, 0.87) 1px solid;
        }
        .input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .mcart {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background-color: #364364;
            transition: 0.1s;
            cursor: pointer;
            position: fixed; /* Фиксированное расположение */
            top: 50px; /* в правом верхнем углу */
            right: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            object-fit: contain;
            padding: 15px;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Увеличиваем кнопку при наведении на нее */
        .mcart:hover {
            transform: scale(1.1);
        }

        /* Стилизуем счетчик товаров */
        .cart__num {
            position: absolute;
            background-color: #d62240;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
            top: -5px;
            right: -5px;
        }
    </style>

    <div class="container">
        <div><br>
            <div class="row">
                <h2>Магазин</h2>
            </div>
            <button class="mcart" id="cart" onclick="Basket()">
                <div class="cart__image"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg></div>
                <div class="cart__num" id="cart_num">0</div>
            </button>

            <div class="row col-4">
                <h1></h1>
                <a href="{{ url('/').'/shop' }}" class="btn btn-sm "
                   style="border-radius: 15px;border-color: rgba(243,158,21,0.87)"> &laquo; В каталог</a>
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
            <a href="{{url('/basket_shop')}}" class="btn">Перейти в корзину</a>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form action="{{route('shops')}}" method="get">
                <div class="input-group mb-3">
                    <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}"
                           @endif type="text" class="form-control" id="exampleFormControlInput1"
                           placeholder="{{__('Search')}}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">Искать</button>
                    </div>
                </div>
            </form>


        </div>

        @foreach($r1 as $r)
            <div class="row">
                @php

                    $path='';
                    $pic=$r->ProductPicture()->get()->first();
                    if($pic)
                        $path=$pic->url;

                @endphp
                <div class="col-md-3">
                    <img class="img-thumbnail" src="{{url('/').'/storage/'.$path}}" width="250px" height="auto">
                </div>
                <div class="col-md-7" id="slidingProduct{{$r->id}}">
                    <p class="fw-normal lh-1"><a href="{{url('/').'/product_view/'.$r->id}}" class="btn btn-close-white"> {{$r->name}}</a></p>
                    <p class="small">{{$r->fexp}}</p>
                    <p class="text-end">{{$r->price.' p.'}}</p>
                </div>
                <div class="col-md-2 text-center md">
                    <a href="#" onclick='addToBasket({{$r->id}});return false;'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                             class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z"></path>
                        </svg>
                    </a><br>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ url('/').'/shop/'.$r->id.'/edit' }}">
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
        @endforeach
        <div class="row">{{ $r1->withQueryString()->links() }}</div>
    </div>

    <script>
        $(document).ready(function () {
            // console.log( "ready!" );
            $('#card').css('display','none');
            $('#card').hide();
            ajaxGetProducts();
        });
    </script>

</x-layout>
