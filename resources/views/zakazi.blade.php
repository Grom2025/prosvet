<x-layout>
<br><br>
    <div class="container"><h1>Заказы на циклораму</h1></div>
    <div class="container">
        <table style="width: 100%">
            <tr>
                <td>Дата</td><td>Время</td><td>Клиент</td><td>Телефон</td><td>Комментарий</td>
            </tr>
            @foreach()
            <tr>
                <td>Дата</td><td>Время</td><td>Клиент</td><td>Телефон</td><td>Комментарий</td>
            </tr>
            @endforeach

        </table>

    </div>

</x-layout>
