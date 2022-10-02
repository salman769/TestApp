<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVarient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function Dashboard(){
        $products = Product::get();
        foreach ($products as $product){
            $product->status = 'generated';
            $product->save();
        }
        $shop = Auth::user();
        $products = Product::where('shop_id',$shop->id)->latest()->paginate(10);
        return view('products.index')->with([
            'products'=>$products,
        ]);
    }
    public function ProductsFilter(Request $request){

        $shop = Auth::user();
            $products = Product::where('shop_id',$shop->id)->where('title', 'like', '%' . $request->product_title . '%')->paginate(10);
        return view('products.index')->with([
            'products'=>$products,
            'product_title'=>$request->product_title,
        ]);
    }

    public function ShopifyProducts($next = null){
        $products = Auth::user()->api()->rest('GET', '/admin/api/products.json', [
            'limit' => 250,
            'page_info' => $next,
        ]);
        if ($products['errors'] == false) {
            if (count($products['body']->container['products']) > 0) {
                foreach ($products['body']->container['products'] as $product) {
                    $product = json_decode(json_encode($product));
                    $this->SingleProduct($product, Auth::user());
                }
            }
        }
        if (isset($products['link']->container['next'])) {
            $this->ShopifyProducts($products['link']->container['next']);
        }
        return redirect()->route('home')->with('success','Orders Synced successfully!');
    }
    public function SingleProduct($product, $shop)
    {
       if (Product::where('shopify_product_id',  $product->id)->exists()) {
            $product_add = Product::where('shopify_product_id', $product->id)->first();
        } else {
            $product_add = new Product();
        }
        if ($product->images) {
            $image = $product->images[0]->src;
        } else {
            $image = '';
        }
        $product_add->shopify_product_id = $product->id;
        $product_add->title = $product->title;
        $product_add->description = $product->body_html;
        $characters = strlen($product->body_html);
        $product_add->handle = $product->handle;
        $product_add->vendor = $product->vendor;
        $product_add->type = $product->product_type;
        $product_add->featured_image = $image;
        $product_add->tags = $product->tags;
        $product_add->options = json_encode($product->options);
        $product_add->shop_id = $shop->id;
        $product_add->published_at = $product->published_at;
        $product_add->save();
        foreach ($product->images as $image){
            $product_image = new ProductImage();
            $product_image->product_id = $product_add->id;
            $product_image->images = $image->id;
            $product_image->src = $image->src;
            $product_image->save();
        }
        if (count($product->variants) >= 1) {
            foreach ($product->variants as $variant) {
                if (ProductVarient::where('shopify_variant_id',  $variant->id)->exists()) {
                    $variant_add = ProductVarient::where('shopify_variant_id', $variant->id)->first();
                } else {
                    $variant_add = new ProductVarient();
                }
                $variant_add->shopify_variant_id = $variant->id;
                $variant_add->title = $variant->title;
                $variant_add->option1 = $variant->option1;
                $variant_add->option2 = $variant->option2;
                $variant_add->option3 = $variant->option3;
                $variant_add->sku = $variant->sku;
                $variant_add->requires_shipping = $variant->requires_shipping;
                $variant_add->fulfillment_service = $variant->fulfillment_service;
                $variant_add->taxable = $variant->taxable;
                if (isset($product->images)){
                    foreach ($product->images as $image){
                        if (isset($variant->image_id)){
                            if ($image->id == $variant->image_id){
                                $variant_add->image = $image->src;
                            }
                        }else{
                            $variant_add->image = "";
                        }
                    }
                }
                $variant_add->price = $variant->price;
                $variant_add->compare_at_price = $variant->compare_at_price;
                $variant_add->weight = $variant->weight;
                $variant_add->weight_unit = $variant->weight_unit;
                $variant_add->grams = $variant->grams;
                $variant_add->inventory_item_id = $variant->inventory_item_id;
                $variant_add->inventory_quantity = $variant->inventory_quantity;
                $variant_add->inventory_management = $variant->inventory_management;
                $variant_add->inventory_policy = $variant->inventory_policy;
                $variant_add->barcode = $variant->barcode;
                $variant_add->shopify_product_id = $product->id;
                $variant_add->product_id = $product_add->id;
                $variant_add->shop_id = $shop->id;
                $variant_add->save();
            }
        }
    }

    public function ProductView($id){
        $shop = Auth::user();
        $product = Product::where('shop_id',$shop->id)->where('id',$id)->first();
        return view('products.product-detail')->with([
            'product'=>$product,
        ]);
    }

    public function UninstallApp($id){
        $shop_id = $id;
        $products = Product::where('shop_id',$shop_id)->get();
        foreach ($products as $product){
            $product_images = ProductImage::where('product_id',$product->id)->get();
            foreach ($product_images as $product_image){
                $product_image->delete();
            }
            $product_varients = ProductVarient::where('product_id',$product->id)->get();
            foreach ($product_varients as $product_varient){
                $product_varient->delete();
            }
            $creative_descriptions = CreativeDescription::where('product_id',$product->id)->get();
            foreach ($creative_descriptions as $creative_description){
                $creative_description->delete();
            }
            $product->delete();
        }
        $shop = User::whereId($shop_id)->forceDelete();
    }

}
