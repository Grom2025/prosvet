<x-layout>
    <style>
        table tr td{
            border: 1px solid rgba(79, 78, 78, 0.68);
            border-spacing: 0;
        }
    </style>
    <div class="container-fluid py-1">
        <div class="row"><h4>Admin panel</h4>

            @if(env('APP_DEBUG', false))

                DEBUG

            @endif

        </div>
    </div>
    <div class="container">
        <div class="row">
            <p>Новости</p>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{url('/')}}/adm/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                            <path
                                d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                        </svg>
                        Создать</a>
                @endif
            @endauth
        </div>
        @auth
            @if(Auth::user()->isAdmin())
                <div class="row">
                    <div class="row">
                        <table>
                            <tr>
                                <td style="text-align: center">id</td>
                                <td style="text-align: center">Имя</td>
                                <td style="text-align: center">Мэил</td>
                                <td style="text-align: center">Телефон</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td style="align-items: center;">
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->tel}}
                                    </td>
                                    <td>
                                        {{$user->role}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/adm/edit_user">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pencil-square"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>


                    <div class="row">{{ $users->links() }}</div>

                </div>
            @endif
        @endauth
        <script>

        </script>


</x-layout>
