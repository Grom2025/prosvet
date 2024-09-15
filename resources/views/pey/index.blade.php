<x-layout>

    <div class="container">


    </div>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="./assets/brand/bootstrap-logo.svg" alt="">
                <h2>Форма оплаты</h2>
                <p class="lead">Пример формы оплаты услуг студии.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Ваш выбор</span>
                        <span class="badge bg-primary rounded-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Наименование</h6>
                                <small class="text-body-secondary">Описание</small>
                            </div>
                            <span class="text-body-secondary">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Наименование</h6>
                                <small class="text-body-secondary">Описание</small>
                            </div>
                            <span class="text-body-secondary">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Наименование</h6>
                                <small class="text-body-secondary">Описание</small>
                            </div>
                            <span class="text-body-secondary">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                            <div class="text-success">
                                <h6 class="my-0">Промо код</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">?$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Всего</span>
                            <strong>$20</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Пересчитать</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Ваши контактные данные</h4>
                    <form class="needs-validation" novalidate="" method="POST" action="{{ url("/pey") }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Имя</label>
                                <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Укажите имя
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Фамилия</label>
                                <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Логин</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" name="username" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Адрес</label>
                                <input type="text" class="form-control" name="address" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>


                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address">Какие-то флажки</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="save-info">
                            <label class="form-check-label" for="save-info">Ещё флажок</label>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Оплата</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                                <label class="form-check-label" for="credit">Картой</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="debit">По штрих коду</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="paypal">Наличными</label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Имя</label>
                                <input type="text" class="form-control" name="cc-name" placeholder="" required="">
                                <small class="text-body-secondary">Полное имя</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label"></label>
                                <input type="text" class="form-control" name="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label"></label>
                                <input type="text" class="form-control" name="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" name="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Оплатить</button>
                    </form>
                </div>
            </div>
</x-layout>
