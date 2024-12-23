<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Lấy thông tin người dùng đang đăng nhập
        $userId = Auth::id();

        // Lấy giỏ hàng của người dùng
        $cart = Cart::where('user_id', $userId)->first();

        // Nếu không tìm thấy giỏ hàng, tạo mới
        if (!$cart) {
            $cart = Cart::create(['user_id' => $userId]);
        }

        // Lấy danh sách các mục trong giỏ hàng
        $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();

        return view('fontend.cart', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (Auth::check()) {
            // Lấy user_id của người dùng đang đăng nhập
            $userId = Auth::id();

            // Tìm hoặc tạo giỏ hàng cho người dùng hiện tại
            $cart = Cart::where('user_id', $userId)->first();
            if (!$cart) {
                $cart = Cart::create(['user_id' => $userId]);
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $cartItem = CartItem::where('cart_id', $cart->id)
                                ->where('product_id', $product->id)
                                ->first();

            if ($cartItem) {
                // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm một mục mới
                $cartItem = new CartItem();
                $cartItem->cart_id = $cart->id;
                $cartItem->product_id = $product->id;
                $cartItem->quantity = 1;
                $cartItem->save();
            }

            // Trả về thông báo thành công hoặc dữ liệu cần thiết
            return response()->json([
                'success' => true,
                'message' => 'Thêm giỏ hàng thành công!',
                'cartCount' => Cart::where('user_id', $userId)->count() // Số lượng sản phẩm trong giỏ hàng
            ]);
        } else {
            // Trường hợp người dùng chưa đăng nhập
            return response()->json([
                'success' => false,
                'message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'
            ]);
        }
    }
    
    public function updateCartItem(Request $request)
    {
        $itemId = $request->item_id;
        $quantity = $request->quantity;

        $cartItem = CartItem::find($itemId);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return response()->json(['success' => 'Cart item updated successfully']);
    }

    public function removeCartItem(Request $request)
    {
        $itemId = $request->item_id;

        $cartItem = CartItem::find($itemId);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found'], 404);
        }

        $cartItem->delete();

        return response()->json(['success' => 'Cart item removed successfully']);
    }
}
