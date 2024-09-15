<x-layout>
    <div class="container">
        <br>
        <div class="row g-3">
            <br>
            <form id="contactForm">
                <div class="layout gap-4">

                    <div class="layout-main">
                        <label for="datepicker" style="color: white;">Выберите дату:</label>
                        <input type="text" class="date form-control" name="foo" id="datepicker">
                        <br>
                        <div style="border-radius: 4px; padding: 12px; background-color: rgb(0 0 0 / 3%); border: double;color: black;">
                            <div class="row g-3">
                                @for($i=0;$i<=7;$i++)
                                    <div style="flex: 1 0 0%; background: #f1efef;"
                                         class="border text-center" id="f{{$i}}">
                                        {{$i}}
                                    </div>
                                @endfor
                            </div>
                            <div class="row g-3">
                                @for($i=8;$i<=15;$i++)
                                    <div style="flex: 1 0 0%; background: #f1efef;"
                                         class="border text-center" id="f{{$i}}">
                                        {{$i}}
                                    </div>
                                @endfor
                            </div>
                            <div class="row g-3">
                                @for($i=16;$i<=23;$i++)
                                    <div style="flex: 1 0 0%; background: #f1efef;"
                                         class="border text-center" id="f{{$i}}">
                                        {{$i}}
                                    </div>
                                @endfor
                            </div>
                            <label for="amount"  style="color: white;">и время с</label>
                            <input type="text" id="amount" name="nach" readonly=""
                                   style="border:0; color:#f6931f; font-weight:bold;"> <span  style="color: white;">до</span>
                            <input type="text" id="amount1" name="con" readonly=""
                                   style="border:0; color:#f6931f; font-weight:bold;">
                            <span  style="color: white;">часов.</span>

                        </div>
                        <br><br>
                        <div id="slider-range"></div>
                    </div>


                </div>

        </div>
    </div>

    <div class="container">
        <h2 class="panel-heading">Пожалуйста укажите контактные данные</h2>

        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Имя" id="name">
        </div>

        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
        </div>

        <div class="form-group">
            <input type="text" name="mobile_number" class="form-control" placeholder="Телефон"
                   id="mobile_number">
        </div>

        <div class="form-group">
            <input type="hidden" name="subject" class="form-control" placeholder="" id="subject">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Комментарий" id="message"></textarea>
        </div>
        <div class="alert alert-success" style="display:none" id="alertinfo"></div>
        <div class="form-group">
            <br>
            <button class="btn btn-success bg-dark" style="border-color: #F39E15FF" id="submit">Забронировать</button>
        </div>
        </form>
    </div>

    <script>
        const canvas = document.getElementById('can1');
        canvas.addEventListener('click', (e) => {

            // В таком виде можно отследить координаты клика!
            console.log('Клик на canvas произошел в точке:', e.clientX, e.clientY);
        });
    </script>

    <script>

        $('#datepicker').datepicker({
            autoclose: true,
            dateFormat: 'dd.mm.yy',
        });

        function vis(arr) {

            n = arr[0];
            for (key in n) {
                //console.log(key +' = '+n[key]);
                if (n[key] === 1) {
                    $('#' + key).css('background-color', '#1f1d1d');
                    $('#' + key).css('color', '#eeeaea');
                }

            }

        };

        $('#datepicker').on('change ', function (event) {
            event.preventDefault();
            let fdate = $('#datepicker').val();
            for (i = 0; i < 24; i++) {
                $('#f' + i).css('background-color', '#f1efef');
            }
            ;
            $.ajax({
                url: "/returnDates",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    fdate: fdate,
                },
                success: function (response) {
                    //console.log(response.success);
                    vis(response.success);
                    //$('#alertinfo').show();
                    //$('#alertinfo').html("<p>" + response.success + "</p>");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        });

        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 24,
                step: 1,
                values: [10, 16],
                slide: function (event, ui) {
                    $("#amount").val(ui.values[0]);
                    $("#amount1").val(ui.values[1]);
                }
            });

            $("#amount").val($("#slider-range").slider("values", 0));
            $("#amount1").val($("#slider-range").slider("values", 1));
        });

        $('.ui-slider-handle').draggable();
    </script>

    <script>

        $('#contactForm').on('submit', function (event) {
            event.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let mobile_number = $('#mobile_number').val();
            let subject = $('#subject').val();
            let message = $('#message').val();
            let nach = $('#amount').val();
            let con = $('#amount1').val();
            let fdate = $('#datepicker').val();

            $.ajax({
                url: "/contact1",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    mobile_number: mobile_number,
                    subject: subject,
                    message: message,
                    nach: nach,
                    con: con,
                    fdate: fdate,
                },
                success: function (response) {
                    console.log(response);
                    $('#alertinfo').show();
                    $('#alertinfo').html("<p>" + response.success + "</p>");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                },
            });
        });
    </script>


</x-layout>
