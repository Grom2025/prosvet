<x-layout>
    <div class="container-fluid py-1">
        <div class="row"><h4>Admin panel</h4></div>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ url('/').'/adm/create_user' }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="fid" value="" >

            <div class="row">
                <div class="col-6">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="" value=""/>
                </div>
            </div>
            <div class="row">
                <label for="ftext" class="form-label">E-mail</label>
                <input type="text" class="form-control" name='email' placeholder="" id="ftext" value=""/>
            </div>

            <button id="submit">Create</button>
        </form>
    </div>

</x-layout>
