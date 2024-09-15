<x-layout>

    Route::post('logout', [LoginController::class, 'logout'])->middleware('clear.session.cookies')->name('logout');

    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('clear_cookies');;
    Route::post('/check', [LoginController::class, 'check'])->name('check');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('user.register');
    //middleware implementation
    Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/dashboard', [UserDashBoardController::class, 'dashboard'])->name('user.dashboard');
    //Route::get('/records', [RecordViewController::class, 'index'])->name('record.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout')->middleware('clear_cookies');
    });
    // Admin Authentication Routes
    Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('clear_cookies');;
    Route::post('/admin/check', [AdminLoginController::class, 'admincheck'])->name('admin.check');
    Route::get('/admin/register', [AdminRegistationController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [AdminRegistationController::class, 'store'])->name('admin.store');
    Route::middleware(['auth', 'admin'])->group(function () {
    //Route::get('/admin/dashboard', [AdminDashBoardController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout')->middleware('clear_cookies');
    });

    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'user' => \App\Http\Middleware\UserMiddleware::class,
    'clear_cookies' => \App\Http\Middleware\ClearSessionCookies::class,

    use Intervention\Image\Facades\Image;
    Image::make($file->path)->resize(200, 200);

    @{{  foreach($posts as $post)}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!--   <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">{{$post->title}}</h2>
                    <p class="lead">{{$post->salary}}</p>
                </div>
                <div class="col-md-5">
                    <img src="{{$post->url}}" width="400px" height="auto">
                </div>
            </div>
            <br> -->
    @{{  endforeach }}

    <div class="container-fluid text-center bg-light">
        <br/>
        <div class="row align-items-start align-items-center">
            <div class="col">

                <canvas id="can1"  width="100rm"  height="100rm" style="border: 1px solid #ccc;" class="img-fluid"></canvas>
            </div>
            <div class="col">
                <img src="img/partners/" class="img-fluid" alt="...">
            </div>
            <div class="col">
                <img src="img/partners/" class="img-fluid" alt="...">
            </div>
            <div class="col">
                <img src="img/partners/" class="img-fluid" alt="...">
            </div>
            <div class="col">
                <img src="img/partners/" class="img-fluid" alt="...">
            </div>
            <div class="col">
                <img src="img/partners/" class="img-fluid" alt="...">
            </div>
        </div>
        <br/>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>

        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let mobile_number = $('#mobile_number').val();
            let subject = $('#subject').val();
            let message = $('#message').val();

            $.ajax({
                url: "/contact-form",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    email:email,
                    mobile_number:mobile_number,
                    subject:subject,
                    message:message,
                },
                success:function(response){
                    console.log(response);
                },
            });
        });
    </script>

    <script>
        async function fetch_post()
        {
            const params = {
                "_token": "{{ csrf_token() }}",
                name: name,
                email: email,
                mobile_number: mobile_number,
                subject: subject,
                message: message
            };
            let elem = document.querySelector('#result');
            elem.innerHTML = "loading...";
            let response = await fetch('/contact',
                {
                    method: 'POST',
                    body: new URLSearchParams(params).toString()
                });
            let result = await response.text();
            console.log(result);
        }
    </script>


    <table>
        <tr>
            <td><span class="g_corner">&nbsp;</span></td><td></td><td></td>
        </tr>
        <tr>
            <td></td><td><h1 class="montserrat-500">Искусство освещения</h1></td><td></td>
        </tr>
    </table>
</x-layout>
