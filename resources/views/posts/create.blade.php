<x-layout>
    <div class="container">
        <div><br><br><br></div></div>
    <div class="container">
    <form method="POST" action="{{ url('/').'/posts' }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="1" name="employer-id" />

        <label for="title" class="form-label">Название</label>
        <input type="text" class="form-control" name="title" placeholder=""/>

        <label for="salary" class="form-label">Текст</label>

        <textarea style="width: 400px; height: 5rem;" name="salary" placeholder=""></textarea>

        <div class="mb-3">
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


        <input  class="form-check-input" name="url" placeholder="" />
        <checkbox label="Feature (Costs Extra)" name="featured" ></checkbox>


        <input label="Tags (через запятую)" name="tags" placeholder="" />

        <button>Опубликовать</button>
    </form>
    </div>
</x-layout>
