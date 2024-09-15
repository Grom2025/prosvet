<x-layout>
    <div class="container">
        <div class="row g-5">
            <form class="needs-validation" novalidate="" method="POST" action="/login">
                @csrf
                <div class="col-md-7 col-lg-8">
                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Пароль: <span class="text-body-secondary"></span></label>
                        <input type="password" class="form-control" name="password" >
                        <div class="invalid-feedback">
                            Please enter a valid password.
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-50 btn btn-primary btn-lg" id="submit">Войти</button>
                </div>

            </form>
        </div>
    </div>
</x-layout>
