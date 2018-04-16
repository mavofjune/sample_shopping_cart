<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Intervention\Image\ImageManagerStatic as Image;


class ShoppingController extends Controller
{
    //


    public function index(){


        $data['categories'] = $this->getCategories();


        $featured = DB::table('products')->join('photos', 'photos.product_id', '=', 'products.id')
            ->where('featured', 1)
            ->where('active', 1)->where('photos.position', '0')->get();

        if (count($featured) > 0) {
            $data['featured'] = $featured;
        }


        return view("welcome", $data);

    }



        public function products()
        {

            $data['categories'] = $this->getCategories();

            $products = DB::table('products')->select('categories.name AS categoryName', 'products.name AS productName',
                'description', 'in_stock', 'price', 'products.id AS id', 'active', 'featured', 'photo_location')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('photos', 'photos.product_id', '=', 'products.id')->where('photos.position', '0')->get();


            if (count($products) > 0) {

                $data['products'] = $products;

            } else {
                $data['empty'] = true;
            }

            return view("products", $data);

        }

    public function cropSquareImage($photo_location)
    {

        $new_image = Image::make( substr($photo_location, 1) );


        $width =  $new_image->width();

        $height =  $new_image->height();


        if ( $width != $height ){

            if ( $width > $height ){
                $new_image->crop($height, $height, 0, 0 );


            } else {
                $new_image->crop($width, $width, 0, 0 );


            }

            $new_image->save( substr($photo_location,  1) );

        }

    }

    public function getProduct($productid){


        $data['categories'] = $this->getCategories();

        $product = DB::table('products')->select('categories.name AS categoryName', 'products.name AS productName',
            'description', 'in_stock', 'price', 'products.id AS id', 'active', 'featured', 'photo_location')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('photos', 'photos.product_id', '=', 'products.id')->where('photos.position', '0')->where('products.id', $productid)->first();

        if ( $product <>  '') {

            $data['product'] = $product;

        } else {
            $data['empty'] = true;
        }

        return view("product", $data);

    }


        public function productsByCategory($category){

        }

        public function getCategories(){


            $categories = DB::table('categories')->get();

            if (count($categories) > 0) {
                foreach($categories AS $category){
                    $category_name = explode( " ", strtolower($category->name));
                    $newcat = '';
                    foreach($category_name AS $cat){
                        if ( next($category_name ) ) {
                            $newcat .= $cat . "_";
                        } else {
                            $newcat .= $cat;
                        }
                    }


                    $categories_list[] = [ 'name' => $category->name, 'nav_name' => $newcat ];
                }

              return $categories_list;
            }


        }

}
