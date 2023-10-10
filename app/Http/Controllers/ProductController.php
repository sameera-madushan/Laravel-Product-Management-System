<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function save(Request $request){

        $validator = Validator::make($request->all(),[
            'ptitle' => 'required',
            'pdescription' => 'required',
            'pprice' => 'required',
            'pdon' => 'required',
            'pcode' => 'required',
            'pimage' => 'required|image',
            'category_id' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('status', 'Someting went wrong!');
        }else {
            $imagename = time() . "." . $request->pimage->extension();
            $request->pimage->move(public_path(path:'thumbnails'), $imagename);

            Product::create([
                'user_id'=> auth()->user()->id,
                'ptitle' => $request->ptitle,
                'pdescription' => $request->pdescription,
                'pprice' => $request->pprice,
                'pdon' => $request->pdon,
                'pcode' => $request->pcode,
                'pimage'=> $imagename,
                'category_id'=> $request->category_id
            ]);

        }


        return redirect(route('product.all'))->with('status', 'Product Created Successfully');
    }

    public function create(){
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    public function edit($productID){
        $categories = Category::all();
        $product = Product::findOrFail($productID);
        return view('products.edit', compact('product','categories'));
    }

    public function update($productID, Request $request){
        $product = Product::findOrFail($productID);

        $oldDO = $product->pdon;
        $newDO = $request->pdon;

        if ($oldDO !== $newDO) {
            $minDisplayOrder = min($oldDO, $newDO);
            $maxDisplayOrder = max($oldDO, $newDO);

            if ($newDO > $oldDO) {
                Product::where('pdon', '>', $minDisplayOrder)
                    ->where('pdon', '<=', $maxDisplayOrder)
                    ->where('id', '!=', $productID)
                    ->decrement('pdon');
            } else {
                Product::where('pdon', '>=', $minDisplayOrder)
                    ->where('pdon', '<', $maxDisplayOrder)
                    ->where('id', '!=', $productID)
                    ->increment('pdon');
            }
        }

        $product->update($request->all());
        return redirect(route('product.all'))->with('status', 'Product Updated Successfully');
    }

    public function allProducts()
    {
        $user = Auth::user();

        $products = Product::where('user_id', $user->id)
            ->orderBy('pdon')
            ->get();

        return view('products.all', compact('products'));
    }

    public function delete($productID){

        $product = Product::findOrFail($productID);
        $displayOrderNumber= $product->pdon;
        $product->delete();
        Product::where('pdon', '>', $displayOrderNumber)->decrement('pdon');
        return redirect(route('product.all'));

    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('ptitle', 'like', "%$query%")
            ->orWhere('pdescription', 'like', "%$query%")
            ->orWhere('pprice', 'like', "%$query%")
            ->orWhere('pdon', 'like', "%$query%")
            ->orWhereHas('Category', function ($categoryQuery) use ($query) {
                $categoryQuery->where('cname', 'like', "%$query%");
            })
            ->with('Category')
            ->get();

        return view('products.search', compact('products'));
    }

    public function view($productID){
        $product = Product::findOrFail($productID);
        return view ('products.view', compact('product'));
    }

}
