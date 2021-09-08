<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdectRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Property;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProdectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdectRequest $request)
    {
       // dd($request->file('image'));
        $path = $request->file('image')->storeAs('public/products',$request->file('image')
        ->getClientOriginalName());
        Product::query()->create([
             'name' => $request->get('name'),
             'slug' => $request->get('slug'),
             'price' => $request->get('price'),
             'category_id' => $request->get('category_id'),
             'brand_id' => $request->get('brand_id'),
             'desk' => $request->get('desc'),
             'image' => $path
        ]);
        session()->flash('success',' محصول با موفقیت اضاف شد.');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'product'=> $product,
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductUpdateRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $isslug = Product::query()->where('slug',$request->get('slug'))->where('id','!=',$product->id)->exists();
        if($isslug){
            return redirect()->back()->withErrors(['slug' => 'slug is exsits']);
        }
        $path = $product->image;
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('public/products',
            $request->file('image')->getClientOriginalName());
        }
        $product->update([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'price'=> $request->get('price'),
            'desk'=> $request-> get('desc'),
            'category_id' => $request-> get('category_id'),
            'brand_id'=> $request->get('brand_id'),
            'image' => $path
        ]);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
    public function properties(){
        return $this->belongsToMany(Property::class)->withpivot(['value'])->withtimestamps();
    }
}
