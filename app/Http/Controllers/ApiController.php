<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHistory;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function goodsRequest()
    {
        return response()->json([
            'product_histories' => ProductHistory::with(['product', 'user_request'])->orderBy('product_id')->get(),
            'user_requests' => UserRequest::all(),
            'products' => Product::all()
        ]);
    }

    public function goodsRequestPost(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            foreach ($data['data'] as $item) {
                $productHistory = new ProductHistory();
                $productHistory->user_request_id = $request->get('user_selected');
                $productHistory->product_id = $item['product'];
                $productHistory->type = 'out';
                $productHistory->quantity = $item['quantity'];
                $productHistory->save();
                $product = Product::find($item['product']);
                $product->stock_quantity = $product->stock_quantity - $item['quantity'];
                $product->save();
            }
            DB::commit();
            return [
                'status' => true,
                'message' => "Your data has been successfully submitted"
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}