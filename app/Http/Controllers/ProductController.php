<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;


class ProductController extends Controller
{
    public function products()
    {
        $products = Product::paginate(10); // Lấy tất cả sản phẩm từ database
        $categories = Category::all();
        return view('fontend.products', compact('products'));
    }

    public function showByCategory($category)
    {
        $products = Product::where('category', $category)->paginate(10);
        return view('fontend.products_categories', compact('products', 'category'));
    }

    public function show($id)
    {
        $product = Product::with('comments')->findOrFail($id);
        return view('fontend.products_show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
    
        $products = Product::query();
    
        if ($query) {
            $products = $products->where('name', 'LIKE', "%{$query}%");
        }
    
        if ($minPrice) {
            $products = $products->where('price', '>=', $minPrice);
        }
    
        if ($maxPrice) {
            $products = $products->where('price', '<=', $maxPrice);
        }
    
        $products = $products->paginate(10);
    
        return view('fontend.products', compact('products'));
    }

    public function postComment(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
    
        $comment = new Comment();
        $comment->product_id = $product->id;
        $comment->user_id = auth()->id();
        $comment->content = $request->input('content');
        $comment->save();
        
        return back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }

    public function showComment(Product $product)
    {
    // Assuming comments are eager loaded with the product
    $product = Product::with('comments')->find($product->id);

    return view('fontend.products_show', compact('product'));
    }
}
