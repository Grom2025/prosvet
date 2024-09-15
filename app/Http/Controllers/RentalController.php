<?php

namespace App\Http\Controllers;

use App\Models\GroupRent;

use App\Filters\ProductFilter;
use App\Filters\ProductFilters;
use App\Models\Rental;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Traits\Upload;
use Illuminate\Support\Facades\Cookie;



class RentalController extends Controller
{
    //
    use Upload;

    public function index($groupid=0)
    {
        $value = Cookie::get('otkn');
        if(!$value)
            Cookie::queue('otkn', session('_token'), 6000);



        if ($groupid > 0){
            $r1 = Rental::query()->where('group_rents_id', '=', $groupid)->paginate(20);
            return view('rentals.index1', ['r1' => $r1]);
        }
        else{
            $r1 = GroupRent::query()->paginate(20);
            return view('rentals.index', ['r1' => $r1]);
        }

    }
    public function index1(ProductFilter $request)
    {
        $products = Rental::with('GroupRent', 'pictures')->filter($request)->paginate(20);
        $categories = GroupRent::all();

        return view('rentals.index1',['r1' => $products,'categories'=>$categories]);
        //dd($fid);
//        $r1 = Rental::with('GroupRent', 'pictures')
//            ->findOrFail($fid);
//        //dd($r1);
//        return view('rentals.index1', ['r1' => $r1]);
    }

    public function show(string $id)
    {
        //display a single post for detialed view
        $rental = Rental::with('GroupRent', 'pictures')
            ->findOrFail($id);
        return view('rentals.show', ['rental' => $rental]);
    }

    public function edit(string $id)
    {
        //display a single post for detialed view
        $rental = Rental::with('GroupRent', 'pictures')
            ->findOrFail($id);
        $category = GroupRent::query()->get();
        $pic = $rental->pictures();
        return view('rentals.edit', ['rental' => $rental, 'cat' => $category, 'pic' => $pic]);
    }

    public function update(Request $request, Rental $rental)
    {

        //dd($request);
        $path = '';

        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'rentals');
        }

        $rental= Rental::with('GroupRent', 'pictures')
            ->findOrFail($request['rentals_id']);

        $rental->update([
            'name' => $request['name'],
            'group_rents_id' => $request['category'],
            'fexp' => $request['fexp'],
            'price' => doubleval(str_replace(' ', '', $request['price'])),
        ]);

        if ($path) {
//            $rental->pictures()->create(['url' => $path,]);
            Picture::create(['url' => $path,'rentals_id'=>$request['rentals_id'],]);
        }
        return redirect(url('/').'/rental_view/'.$request['rentals_id']);

    }

    public function store(Request $request)
    {
        dd($request);
        Rental::updateOrCreate([
            'name' => $request['name'],
            'group_rents_id' => $request[''],
        ], [
            'name' => $request['name'],
            'group_rents_id' => $productCategory,
            'price' => doubleval(str_replace(' ', '', $request['price'])),
        ]);

    }

    public function importBase()
    {

        //dd("No");
        // Opening the file for reading
        $fileStream = fopen(url('/') . '/storage/1.csv', 'r');

        $csvContents = [];

        // Reading the file line by line into an array
        while (($line = fgetcsv($fileStream)) !== false) {
            $csvContents[] = $line;
        }

        // Closing the file stream
        fclose($fileStream);

        // Defining the indexes of the CSV
        $name = 2;
        $category = 1;
        $price = 3;


        // Loading the categories into an array
        $categories = GroupRent::pluck('id', 'name');

        $skipHeader = true;
        // Attempt to import the CSV
        foreach ($csvContents as $content) {
            if ($skipHeader) {
                // Skipping the header column (first row)
                $skipHeader = false;
                continue;
            }
            $cat = trim($content[$category]);
            $cat = mb_strtoupper(mb_substr($cat, 0, 1)) . mb_substr($cat, 1, mb_strlen($cat));
            $productCategory = '';
            $gr = GroupRent::query()->where('name', '=', $cat)->get();
            if ($gr->count() > 0) {
                $productCategory = $gr[0]->id;
            } else {
                $productCategory = $categories[$cat] ?? GroupRent::create([
                    'name' => $cat
                ])->id;
            }

            // Updating or creating the product based on the name and category
            Rental::updateOrCreate([
                'name' => mb_strtoupper(mb_substr(trim($content[$name]), 0, 1)) . mb_substr(trim($content[$name]), 1, mb_strlen(trim($content[$name]))),
                'group_rents_id' => $productCategory,
            ], [
                'name' => mb_strtoupper(mb_substr(trim($content[$name]), 0, 1)) . mb_substr(trim($content[$name]), 1, mb_strlen(trim($content[$name]))),
                'group_rents_id' => $productCategory,
                'price' => (str_replace(' ', '', $content[$price])),
            ]);
        }
    }

    public function importBase1()
    {

        //dd("No");
        // Opening the file for reading
        $fileStream = fopen(url('/') . '/storage/1.csv', 'r');

        $csvContents = [];

        // Reading the file line by line into an array
        while (($line = fgetcsv($fileStream,10000,';')) !== false) {
            //foreach ($line as $l)
//                echo $l."\r\n";
            $csvContents[] = $line;
        }

        // Closing the file stream
        fclose($fileStream);

        // Defining the indexes of the CSV
        $name = 1;
        $category = 0;
        $price = 2;


        // Loading the categories into an array
        $categories = GroupRent::pluck('id', 'name');

        $skipHeader = false;
        // Attempt to import the CSV
        foreach ($csvContents as $content) {
            if ($skipHeader) {
                // Skipping the header column (first row)
                $skipHeader = false;
                continue;
            }
            if(!$content) continue;
//            echo $content[$category].' -> ';
//            echo $content[$name].' -> ';
//            echo $content[$price]. " ||| ".PHP_EOL;
//            continue;
//            if()
            $cat = trim($content[$category]);
            $cat = mb_strtoupper(mb_substr($cat, 0, 1)) . mb_substr($cat, 1, mb_strlen($cat));
            $productCategory = '';
            $gr = GroupRent::query()->where('name', '=', $cat)->get();
            if ($gr->count() > 0) {
                $productCategory = $gr[0]->id;
            } else {
                $productCategory = $categories[$cat] ?? GroupRent::create([
                    'name' => $cat
                ])->id;
            }

            // Updating or creating the product based on the name and category
            Rental::updateOrCreate([
                'name' => $content[$name],
                'group_rents_id' => $productCategory,
                'price' => doubleval($content[$price]),
            ]);
        }
        echo 'Import gotov';
    }
}
