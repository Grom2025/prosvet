<?php

namespace App\Http\Controllers\Product;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\ProductGroup;
use App\Models\Products\ProductPicture;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    use Upload;

    public function index($groupid=0)
    {
        $value = Cookie::get('otkn');
        if(!$value)
            Cookie::queue('otkn', session('_token'), 6000);

        if ($groupid > 0){
            $r1 = Product::query()->where('product_group_id', '=', $groupid)->paginate(20);
            return view('shop.index1', ['r1' => $r1]);
        }
        else{
            $r1 = ProductGroup::query()->paginate(20);
            return view('shop.index', ['r1' => $r1]);
        }

    }
    public function index1(ProductFilter $request)
    {
        $products = Product::with('ProductGroup', 'ProductPicture')->filter($request)->paginate(20);
        $categories = ProductGroup::all();

        return view('shop.index1',['r1' => $products,'categories'=>$categories]);
        //dd($fid);
//        $r1 = Rental::with('GroupRent', 'pictures')
//            ->findOrFail($fid);
//        //dd($r1);
//        return view('rentals.index1', ['r1' => $r1]);
    }

    public function show(string $id)
    {
        //display a single post for detialed view
        $rental = Product::with('ProductGroup', 'ProductPicture')
            ->findOrFail($id);
        return view('shop.show', ['rental' => $rental]);
    }

    public function edit(string $id)
    {
        //display a single post for detialed view
        $rental = Product::with('ProductGroup', 'ProductPicture')
            ->findOrFail($id);
        $category = ProductGroup::query()->get();
        $pic = $rental->pictures();
        return view('shop.edit', ['rental' => $rental, 'cat' => $category, 'pic' => $pic]);
    }

    public function update(Request $request, Rental $rental)
    {

        //dd($request);
        $path = '';

        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'shop');
        }

        $rental= Product::with('ProductGroup', 'ProductPicture')
            ->findOrFail($request['rentals_id']);

        $rental->update([
            'name' => $request['name'],
            'group_rents_id' => $request['category'],
            'fexp' => $request['fexp'],
            'price' => doubleval(str_replace(' ', '', $request['price'])),
        ]);

        if ($path) {
//            $rental->pictures()->create(['url' => $path,]);
            ProductPicture::create(['url' => $path,'rentals_id'=>$request['product_id'],]);
        }
        return redirect(url('/').'/product_view/'.$request['product_id']);

    }

    public function store(Request $request)
    {
        dd($request);
        Product::updateOrCreate([
            'name' => $request['name'],
            'product_group_id' => $productCategory,
            'price' => doubleval(str_replace(' ', '', $request['price'])),
        ]);

    }

    public function importBase1()
    {

        //dd("No");
        // Opening the file for reading
        $fileStream = fopen(url('/') . '/storage/2.csv', 'r');

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
        $desc = 3;


        // Loading the categories into an array
        $categories = ProductGroup::pluck('id', 'name');

        $skipHeader = false;
        // Attempt to import the CSV
        foreach ($csvContents as $content) {
            if ($skipHeader) {
                // Skipping the header column (first row)
                $skipHeader = false;
                continue;
            }
            if(!$content) continue;
           echo $content[$category].' -> ';
            echo $content[$name].' -> ';
            echo $content[$price]. " ||| ".PHP_EOL;
            continue;
//            if()
            $cat = trim($content[$category]);
            $cat = mb_strtoupper(mb_substr($cat, 0, 1)) . mb_substr($cat, 1, mb_strlen($cat));
            $productCategory = '';
            $gr = ProductGroup::query()->where('name', '=', $cat)->get();
            if ($gr->count() > 0) {
                $productCategory = $gr[0]->id;
            } else {
                $productCategory = $categories[$cat] ?? ProductGroup::create([
                    'name' => $cat
                ])->id;
            }

            // Updating or creating the product based on the name and category
            Product::updateOrCreate([
                'name' => $content[$name],
                'product_group_id' => $productCategory,
                'price' => doubleval($content[$price]),
                'fexp' => $content[$desc],
            ]);
        }
        //return redirect(url('/').'/shop');
    }
}
