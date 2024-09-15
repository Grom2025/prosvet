<x-layout>
    <div class="container-fluid py-1">
        <div class="row"><h4>Admin panel</h4></div>
    </div>
    <div class="container-fluid">
        <form method="POST" action="{{ url('/').'/adm/update_news/'.$posts->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="fid" value="{{$posts->id}}" >
            <div class="row">
                <label for="datepicker">Выберите дату:</label>
                <input type="text" class="date form-control" name="fdate" id="datepicker" value="{{$posts->fdate}}">
            </div>
            <div class="row-cols-xxl-auto">
                <div class="col-6">
                    <label for="title" class="form-label">Наименование</label>
                    <input type="text" class="form-control" name="title" placeholder="" value="{{$posts->title}}"/>
                </div>
            </div>
            <div class="row-cols-auto">
                <label for="ftext" class="form-label">Описание</label>
                <textarea name='ftext' placeholder="" id="ftext">{{$posts->ftext }}</textarea>
            </div>
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
    <script>
        var d = new Date("{{$posts->fdate}}");
    $('#datepicker').datepicker({
        autoclose: true,
        defaultDate: d,
        dateFormat:'yy-m-d',
    });
        // $( "#datepicker" ).datepicker( "option", "dateFormat", 'dd.mm.yy');

    </script>

    <script src="{{url('/')}}/js/ckeditor.js"></script>
    <script src="{{url('/')}}/js/popper.min.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#ftext'))
            .catch(error => {
                console.error(error);
            });
        document.querySelector( '#submit' ).addEventListener( 'click', () => {
            const editorData = ClassicEditor.getData();
            document.querySelector( '#ftext' ).innerHTML = editorData;

        } );
    </script>
</x-layout>
