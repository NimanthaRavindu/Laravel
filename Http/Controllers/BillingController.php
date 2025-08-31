<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\view;
use Illuminate\Support\Facades\DB;
use App\Models\bill;

class BillingController extends Controller
{
    public function index()
    {
        $query = DB::table('bills')
            ->join('customers', 'bills.customer_id', '=', 'customers.id')
            ->select('bills.*', 'customers.name as customer_name')
            ->orderBy('bills.created_at', 'desc');
        $bills = $query->get();
        return view('billing.index', compact('bills'));
    }

    public function create()
    {
        $customers = DB::table('customers')->get();
        $products = DB::table('products')->get();
        return view('billing.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required|exists:customers,id',
            'items'=>'required|array|min:1',
            'items.*.product_id'=>'required|exists:products,id',
            'items.*.quantity'=>'required|integer|min:1'
        ]);
        $total = 0;
        $itemsData = [];
        foreach ($request->items as $item) {
            $query = DB::table('products')->where('id', $item['product_id']);
            $product = $query->first();
            $subtotal = $product->price * $item['quantity'];
            $total += $subtotal;
            $itemsData[] = [
                'product_id'=>$item['product_id'],
                'quantity'=>$item['quantity'],
                'price'=>$product->price,
                'subtotal'=>$subtotal,
            ];
        }
        $query = DB::table('bills');
        $billId = $query->insertGetId([
            'customer_id'=>$request->customer_id,
            'total'=>$total,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        foreach ($itemsData as $item) {
            DB::table('bill_items')->insert([
                'bill_id'=>$billId,
                'product_id'=>$item['product_id'],
                'quantity'=>$item['quantity'],
                'price'=>$item['price'],
                'subtotal'=>$item['subtotal'],
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        return redirect()->route('billing.index')->with('success', 'Bill created successfully!');
    }

    public function show($id)
    {
        $bill = DB::table('bills')
            ->join('customers', 'bills.customer_id', '=', 'customers.id')
            ->select('bills.*', 'customers.name as customer_name')
            ->where('bills.id', $id)->first();

        $items = DB::table('bill_items')
            ->join('products', 'bill_items.product_id', '=', 'products.id')
            ->select('bill_items.*', 'products.name as product_name')
            ->where('bill_items.bill_id', $id)->get();

        return view('billing.show', compact('bill', 'items'));
    }
}
?>