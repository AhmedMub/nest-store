<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsByMainCategory($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        /*
        /-get related products to selected category
        //*this is only to check if there is a products or not to display.
        /-the products will be displayed through livewire component to use livewire pagination, this $products will not be passed to livewire component
        */
        $products = $category->productMainCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->take(5)->get();
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.show-products', compact('category', 'tags', 'products', 'user'));
    }
    public function productsBySubCategory($slug)
    {
        $subCategory = SubCategory::whereSlug($slug)->firstOrFail();

        //get related products to selected category

        $products = $subCategory->productSubCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->latest()->take(5)->get();

        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }
        return view('frontend.pages.show-products', compact('subCategory', 'tags', 'products', 'user'));
    }
    public function productsBySubSubCategory($slug)
    {
        $subSubCategory = SubSubcategory::whereSlug($slug)->firstOrFail();

        //get related products to selected category
        $products = $subSubCategory->productSubSubCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->latest()->take(5)->get();

        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.show-products', compact('subSubCategory', 'tags', 'products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
