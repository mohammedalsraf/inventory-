<?php


namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

use ArPHP\I18N\Arabic;







class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('products.id', 'products.product_name', 'products.barcode', 'categories.cat_name','products.quantity', 'products.notes','products.category_id')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->latest('products.created_at')
        ->paginate(7);
        $cat=Category::get();
        // $products = Product::latest()->paginate(5); //Get the latest record from the DB and then paginate it 
        return view('products.index', compact('products','cat'));
        
        

        
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat=Category::get();
        return view('products.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=> 'required',
            'barcode' => 'required|unique:products',
            'category_id'=> 'required',
            'notes' => 'nullable',
            // 'quantity' => 'required|integer',
            
       
        ]);
        
        $input = $request->all();
       
        Product::create($input);
        return redirect()->route('products.index')->with('success','تم اضافة المادة بنجاح');

       
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
       $product=Product::find($id);
       return view('products.show',compact('product'));
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $cat=Category::get();
        $product=Product::find($id);
       
        return view('products.edit', compact('product'))->with(['cat' => $cat]);

       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'product_name'=> 'required',
            'barcode'=> 'required',
            'category_id'=> 'required',
             'notes' => 'nullable',
            // 'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'

        ]);
        $input = $request->all();
      
        // dd($input);
        $product = Product::findOrFail($id); 
        $product->update($input);
        return redirect()->route('products.index')
        ->with('success', 'تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id); // Assuming your model is named Crudm
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'تم الحذف بنجاح');
        
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $cat=Category::get();
        if($keyword!=""){
            $products = Product::where('product_name', 'LIKE', "%$keyword%")
            ->orWhere('barcode', 'LIKE', "%$keyword%")->latest()
            ->paginate(7);
    
        return view('products.index', compact('products','cat'));
    
        }else{
            return redirect()->route('products.index');
        }
    
        // Use the where method to filter products based on the keyword.
        
    }
    
    public function generatePDF()
    {
        $products=Product::get();
        $reportHtml = view('products.pdf',compact('products') )->render();
        
        $arabic = new Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p)-1; $i >= 0; $i-=2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
        }

        $pdf = PDF::loadHTML($reportHtml);
        return $pdf->stream('products.pdf');
        // $products=Product::get();
        // $pdf = PDF::loadView('products.pdf',compact('products')); // Replace 'arabic-pdf' with your view file
    
        // return $pdf->stream('products.pdf');
        
    }

    public function pdfn(){
        $products=Product::get();

        return view('products.pdfn',compact('products'));
    }

    public function catq(Request $request){

        if( $request->cat!=""){
            $id = $request->cat;
        $products = Product::where('category_id', $id)->get();
        return view('products.catq', compact('products'));


        }
        return redirect()->route('products.index')->with('success','قم باختيار الصنف اولا');


      
        
      



    }

   

    
}
