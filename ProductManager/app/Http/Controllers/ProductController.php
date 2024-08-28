<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Maker;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $target = $request->target;
        $search = $request->search;
        $query = Product::search($search, $target);
        $products = $query->select('id', 'name', 'description', 'price')->whereNull('deleted_at')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select("id", "name")->get();
        $makers = Maker::select("id", "name")->get();

        return view('products.create', compact('categories', 'makers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'maker_id' => $request->maker_id,
        ]);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findActiveById($id);
        if (is_null($product)) {
            abort(404, "商品が見つかりませんでした");
        }

        $description = !is_null($product->description) ? $product->description : "未設定";
        $category = !is_null($product->category_id) ? Category::find($product->category_id)->name : "未設定";
        $maker = !is_null($product->maker_id) ? Maker::find($product->maker_id)->name : "未設定";
        return view('products.show', compact('product', 'description', 'category', 'maker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findActiveById($id);
        if (is_null($product)) {
            abort(404, "商品が見つかりませんでした");
        }
        $categories = Category::select("id", "name")->get();
        $makers = Maker::select("id", "name")->get();

        return view('products.edit', compact('product', 'categories', 'makers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findActiveById($id);
        if (is_null($product)) {
            abort(404, "更新に失敗しました");
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->maker_id = $request->maker_id;
        $product->save();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findActiveById($id);
        if (is_null($product)) {
            abort(404, "削除に失敗しました");
        }
        $product->softDelete();

        return to_route('products.index');
    }
}
