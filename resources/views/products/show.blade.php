@extends('products.layout')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    
        <div class="row text-right">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{' المعرف :  '.$product->id}}</h2>
                        <h3 class="card-text">{{'اسم المادة : '.$product->product_name}}</h3>
                        <h3 class="card-text">{{'الباركود : '.$product->barcode}}</h3>
                        <h3 class="card-text">{{' الملاحضات : '.$product->notes}}</h3>
                       
        
                    </div>
                </div>
            </div>
        </div>



</div>

    
@endsection