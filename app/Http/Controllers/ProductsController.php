<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

use DB;
use Intervention\Image\ImageManager;


class ProductsController extends Controller
{
    //

    public function getCategories()
    {


        $categories = DB::table('categories')->get();

        if (count($categories) > 0) {
            $data['categories'] = $categories;
        } else {
            $data['empty'] = true;
        }


        return view("admin.partials.category_list", $data);
    }

    public function editCategory(Request $request)
    {
        $category_id = $request->input('category_id');
        $delete = $request->input('delete');

        if ($category_id <> '' && $delete == '') {

            $record = DB::table('categories')->where('id', $category_id)->first();
            $data['name'] = $record->name;
            $data['category_id'] = $record->id;
        } else if ($delete == 'true') {

            $record = DB::table('categories')->where('id', $category_id)->first();
            $data['name'] = $record->name;
            $data['category_id'] = $record->id;
            $data['delete'] = "Are you sure you want to delete this category, <b>" . $record->name . "</b> ?";
        } else {

            $data['category'] = true;
        }
        return view("admin.partials.edit_category", $data);
    }

    public function saveCategory(Request $request)
    {

        $category_name = $request->input('name');
        $category_id = $request->input('category_id');

        if ($category_id <> '') {
            $update = DB::table('categories')->where('id', $category_id)->update(
                ['name' => $category_name]
            );
        } else {
            $update = DB::table('categories')->insert([
                ['name' => $category_name]
            ]);
        }


        if ($update == true) {
            return response()->json(['success' => 'true']);

        } else {
            return response()->json(['success' => 'false']);
        }


    }


    public function deleteCategory(Request $request)
    {


        $category_id = $request->input('category_id');

        $delete = '';
        if ($category_id <> '') {
            $delete = DB::table('categories')->where('id', $category_id)->delete();

        }


        if ($delete == true) {
            return response()->json(['success' => 'true']);

        } else {
            return response()->json(['success' => 'false']);
        }


    }

    public function getProducts()
    {


        $products = DB::table('products')->select('categories.name AS categoryName', 'products.name AS productName',
            'description', 'in_stock', 'price', 'products.id AS id', 'active', 'featured', 'photo_location')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('photos', 'photos.product_id', '=', 'products.id')->where('photos.position', '0')->get();


        if (count($products) > 0) {
            $data['products'] = $products;
        } else {
            $data['empty'] = true;
        }

        return view("admin.partials.product_list", $data);

    }

    public function editProduct($productid)
    {

        $data['categories'] = DB::table('categories')->get();
        $data['category_id'] = '';
        if ($productid == 'new') {

            $data['title'] = "Add New Product";


        } else {
            $data['product_id'] = $productid;
            $record = DB::table('products')->where('id', $productid)->first();
            $data['name'] = $record->name;
            $data['description'] = $record->description;
            $data['category_id'] = $record->category_id;
            $data['price'] = $record->price;
            $data['active'] = $record->active;
            $data['in_stock'] = $record->in_stock;
            $data['weight'] = $record->weight;


            $count = DB::table('photos')->where('product_id', $productid )->count();

           $data['position'] = $count;

        }

        return view('admin.edit_product', $data);


    }

    public function saveProduct(Request $request)
    {


        $product_name = $request->input('name');
        $product_description = $request->input('description');
        $in_stock = $request->input('in_stock');
        $weight = $request->input('weight');
        $category_id = $request->input('category_id');
        $product_price = $request->input('price');
        $active = $request->input('active') == 'on' ? 1 : '';
        $product_id = $request->input('product_id');

        if ($product_id <> '') {


            $update = Product::where('id', $product_id)->update(
                ['name' => $product_name,
                    'description' => $product_description,
                    'category_id' => $category_id,
                    'price' => $product_price,
                    'in_stock' => $in_stock,
                    'weight' => $weight,
                    'active' => $active
                ]);

        } else {

            $product = new Product;
            $product->name = $product_name;
            $product->description = $product_description;
            $product->category_id = $category_id;
            $product->in_stock = $in_stock;
            $product->weight = $weight;
            $product->price = $product_price;
            $product->active = $active;
            $update = $product->save();

            $product_id = $product->id;
        }


        if ($update == true) {
            return response()->json(['success' => 'true', 'product_id' => $product_id]);

        } else {
            return response()->json(['success' => 'false']);
        }


    }

    public function updateProductActive(Request $request)
    {

        $product_id = $request->input('product_id');
        $active = $request->input('active');

        $update = DB::table('products')->where('id', $product_id)->update(
            [
                'active' => $active
            ]);

        if ($update == true) {
            return response()->json(['success' => 'true']);

        } else {
            return response()->json(['success' => 'false']);
        }

    }


        public function updateProductFeatured(Request $request)
    {

        $product_id = $request->input('product_id');
        $featured = $request->input('featured');

        $update = DB::table('products')->where('id', $product_id)->update(
            [
                'featured' => $featured
            ]);


        if ($update == true) {
            return response()->json(['success' => 'true']);

        } else {
            return response()->json(['success' => 'false']);
        }


    }



        public function deleteProduct(Request $request)
    {


        $product_id = $request->input('product_id');

        $delete = '';
        if ($product_id <> '') {

            $delete = DB::table('photos')->where('product_id', $product_id)->delete();
            $delete = DB::table('products')->where('id', $product_id)->delete();

        }


        if ($delete == true) {
            return response()->json(['success' => 'true']);

        } else {
            return response()->json(['success' => 'false']);
        }


    }

    public function uploadImage(Request $request)
    {


        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $image_name = $image->getClientOriginalName();
            $photo_name = $request->input('photo_name');
            $product_id = $request->input('product_id');
            $position = $request->input('position');

            $manager = new ImageManager(array('driver' => 'gd'));

            $img = $manager->make($request->file('image_file'));

            $img->save(public_path('/storage/images/' . $image_name));

            // now save to database file location

            $update = DB::table('photos')->insert([
                ['name' => $photo_name,
                    'photo_location' => '/storage/images/' . $image_name,
                    'position' => $position,
                    'product_id' => $product_id,
                ]
            ]);

            if ($update == true) {
                return response()->json(['success' => 'true']);

            } else {
                return response()->json(['success' => 'false']);
            }


        }
    }

    public function getPhotos(Request $request)
    {

        $product_id = $request->input('product_id');

        $records = DB::table('photos')->where('product_id', $product_id)->get();

        if (count($records) > 0) {
            $data['photos'] = $records;
        } else {
            $data['empty'] = true;
        }


        return view("admin.partials.photo_list", $data);
    }
}
