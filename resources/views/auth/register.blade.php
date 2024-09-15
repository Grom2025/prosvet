<x-layout>
    <div class="container">
        <div class="row g-5">

            <form class="needs-validation" novalidate="" method="POST" action="/register" enctype="multipart/form-data">
                @csrf
                <div class="col-md-7 col-lg-8">
                    <div class="col-12">
                        <label for="name" class="form-label">Имя <span class="text-body-secondary"></span></label>
                        <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
                        @error('name')
                        <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com"
                               value="{{ old('email') }}">
                        @error('email')
                        <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Пароль: <span
                                class="text-body-secondary"></span></label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback">
                            {{__('Please enter a valid password.')}}
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="col-12">
                        <label for="tel" class="form-label">Телефон: <span class="text-body-secondary"></span></label>
                        <input type="tel" class="form-control" name="tel" value="{{ old('tel') }}">
                        @error('tel')
                        <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback">
                            Введите корректный телефон или ник в телеграм.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="tg" class="form-label">Телеграмм: <span class="text-body-secondary"></span></label>
                        <input type="text" class="form-control" name="tg" placeholder="@ник в телеграм"
                               value="{{ old('tg') }}">
                        @error('tg')
                            <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback">
                            Введите корректный телефон или ник в телеграм.
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                        <label class="form-check-label" for="same-address"><a href="{{url('/agreement')}}">Согласие на
                                обработку</a> персональных данных</label>
                        @error('agreement')
                            <br><span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="invalid-feedback">
                            Обязательное поле
                        </div>
                    </div>

                    <hr class="my-4">
                    <button class="w-50 btn btn-primary btn-lg" id="submit">Create Account</button>
            </form>
</x-layout>
