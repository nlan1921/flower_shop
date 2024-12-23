<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Product_FontendController extends Controller
{
    public function index()
    {
        // Lấy các sản phẩm thuộc category "Hoa Tươi" và sắp xếp theo ngày tạo mới nhất
        $hoaTuoiProducts = Product::where('category', 'HoaTuoi')->orderBy('created_at', 'desc')->take(10)->get();
        $hoaSapProducts = Product::where('category', 'HoaSap')->orderBy('created_at', 'desc')->take(10)->get();
        $boHoaProducts = Product::where('category', 'BoHoa')->orderBy('created_at', 'desc')->take(10)->get();

        return view('fontend.welcome', compact('hoaTuoiProducts','hoaSapProducts','boHoaProducts'));
    }
}