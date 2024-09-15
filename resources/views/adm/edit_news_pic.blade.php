<x-layout>
    <div class="container-fluid py-1">
        <div class="row"><h4>Admin panel</h4></div>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ url('/').'/adm/update_news_pic/'.$posts->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="fid" value="{{$posts->id}}" >

            <div class="row">
                <label class="form-label" for="inputFile">File:</label>
                <input
                    type="file"
                    name="test"
                    id="inputFile"
                    class="form-control @error('test') is-invalid @enderror">

                @error('file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button id="submit">Опубликовать</button>
        </form>
    </div>

</x-layout>
