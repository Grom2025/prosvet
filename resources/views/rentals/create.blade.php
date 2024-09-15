<x-layout>
    <div class="container">
        <div><br><br><br></div>
    </div>
    <div class="container">
        <div class="row">

            <form method="POST" action="{{ url('/').'/posts' }}" enctype="multipart/form-data">
                @csrf


                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" name="name" placeholder=""/>

        </div>
        <div class="row">
            <label for="salary" class="form-label">Текст</label>

            <textarea style="width: 400px; height: 5rem;" name="fexp" placeholder=""></textarea>
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

        <label for="firstName" class="form-label">Название</label>
        <input name="location" placeholder="">


        <input class="form-check-input" name="url" placeholder=""/>
        <checkbox label="Feature (Costs Extra)" name="featured">


            <input label="Tags (через запятую)" name="tags" placeholder=""/>

            <button>Опубликовать</button>
            </form>

</x-layout>
