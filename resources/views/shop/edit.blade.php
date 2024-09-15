<x-layout>
    <div class="container">
        <div><br><br><a href="{{ url()->previous() }}">Назад</a><br></div>
    </div>
    <div class="container">
        <form method="POST" action="{{ url('/').'/product_update/'.$rental->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" class="form-control" name="rentals_id" placeholder="" value="{{$rental->id}}"/>
            <div class="row">

                <select name="category" class="form-control">
                    @foreach($cat as $c)
                        <option value="{{$c->id}}"
                                @if($rental->group_rents_id==$c->id)
                                    selected
                            @endif
                        >{{$c->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="row">


                <label for="name" class="form-label">Наименование</label>
                <input type="text" class="form-control" name="name" placeholder="" value="{{$rental->name}}"/>

            </div>
            <div class="row">
                <label for="fexp" class="form-label">Описание</label>

                <textarea style='width: 400px; height: 5rem;' name='fexp' placeholder="">{{$rental->fexp }}</textarea>
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
            <div class="row">
                <label for="price" class="form-label">Цена</label>
                <input type="text" class="form-control" name="price" placeholder="" value="{{$rental->price}}"/>

            </div>


            <button>Опубликовать</button>
        </form>

</x-layout>
