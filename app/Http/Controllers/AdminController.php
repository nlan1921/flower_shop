<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User; // Import model User
use App\Models\Cart; // Import model User
use App\Models\CartItem;


class AdminController extends Controller
{
//hien thi trang    
    public function dashboard()
    {
        return view('backend.admin');
    }

// Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
//Quan Ly San Pham
        public function Admin_Products()    
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ database
        return view('backend.admin_products', compact('products'));
    }

    public function storeproducts(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|string|max:255',
            'category' => 'required|string|max:100',
        ]);

        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $request->image_url,
            'category' => $request->category,
        ]);

        $product->save();

        return response()->json(['success' => true]);
    }

        public function updateproducts(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string|max:255',
            'category' => 'required|in:HoaTuoi,HoaSap,BoHoa'

        ]);
        
        $product->update($request->all());

        return response()->json(['success' => 'Product updated successfully']);
    }

        public function destroyproduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['success' => true]);
    }


//Quan Ly User
public function Admin_Users()
{
    $users = User::all(); // Lấy tất cả người dùng từ database
    return view('backend.admin_users', compact('users')); // Gửi dữ liệu đến view
}

public function storeusers(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|string|max:10',
    ]);

    $user = new User([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    $user->save();

    return response()->json(['success' => true]);
}

public function editusers($id)
{
    try {
        $user = User::findOrFail($id);
        return response()->json($user); // Trả về thông tin người dùng dưới dạng JSON
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'User not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while fetching user data'], 500);
    }
}
public function updateusers(Request $request, $id)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|max:10',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return response()->json(['success' => true]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'User not found'], 404);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['error' => 'Validation failed', 'messages' => $e->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while updating the user'], 500);
    }
}

public function destroyusers($id)
{
    try {
        User::findOrFail($id)->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete user'], 500);
    }
}
    
    //Quản lý đơn hàng
    public function Admin_Orders()
    {
        // Lấy danh sách tất cả các đơn hàng với thông tin người đặt hàng
        $orders = Cart::with('user')->orderBy('created_at', 'desc')->get();

        return view('backend.admin_orders', compact('orders'));
    }

    public function deleteOrder($id)
    {
        try {
            Cart::findOrFail($id)->delete();
            return response()->json(['message' => 'Đơn hàng đã được xóa thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Xóa đơn hàng thất bại'], 500);
        }
    }

    public function orderDetail($id)
    {
        $order = Cart::findOrFail($id);
        return view('backend.order_detail', compact('order'));
    }
    
}