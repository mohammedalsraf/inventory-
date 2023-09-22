<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)

    {
       $myid=$id;
       
        return view('transaction.create',compact('myid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = new Transaction([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'type' => $request->type,
        ]);
        $transaction->save();
    
        // Update the item's quantity
        if($request->type=="ادخال"){
            $item = Product::find($request->item_id);
            $item->quantity += $request->quantity;
            $item->save();

        }else{
            $item = Product::find($request->item_id);
            $item->quantity -= $request->quantity;
            $item->save();
        }
        

       

        return redirect()->route('products.index')->with('success', 'تم تحديث الكمية بنجاح');
       
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function createe($id, $product_name)


    {
       $myid=$id;
     
      
       
        return view('transaction.create',compact('myid','product_name'));
    }
    public function precord($id, $product_name)


    {
        $myid = $id;
        $precord = Transaction::where('item_id', $myid)->get(); // Retrieve all records where id = myid
        // dd($precord);
    
        return view('transaction.precord', compact('myid', 'product_name', 'precord'));

    }
    public function report()
    {
        $products = Transaction::select(
            'transactions.item_id',
            'transactions.type',
            DB::raw('SUM(transactions.quantity) as total_quantity'),
            'products.product_name' // Include the product_name column
        )
        ->leftJoin('products', 'transactions.item_id', '=', 'products.id') // Assuming 'item_id' in transactions is related to 'id' in products
        ->groupBy('transactions.item_id', 'transactions.type', 'products.product_name') // Group by 'item_id', 'type', and 'product_name'
        ->get();

    // Group the results by item_id in the format ['item_id' => ['ادخال' => quantity, 'اخراج' => quantity, 'product_name' => name, ...]]
    $groupedProducts = [];

    foreach ($products as $record) {
        $item_id = $record->item_id;
        $type = $record->type;
        $total_quantity = $record->total_quantity;
        $product_name = $record->product_name;

        if (!isset($groupedProducts[$item_id])) {
            $groupedProducts[$item_id] = [];
        }

        $groupedProducts[$item_id][$type] = $total_quantity;
        $groupedProducts[$item_id]['product_name'] = $product_name;
    }

   
    
   
        
    return view('transaction.report', compact('groupedProducts'));

    }



    public function getTotalIncoming()
{
    $totalIncoming = Transaction::where('type', 'ادخال')->sum('quantity');

    return $totalIncoming;
}
public function getTotalOutgoing()
{
    $totalOutgoing = Transaction::where('type', '!=', 'ادخال')->sum('quantity');

    return $totalOutgoing;
}
}
