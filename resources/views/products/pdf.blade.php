@extends('products.pdflayout')



@section('content')




<div class="container ">
    <p class="text-center " style="font-size: 25px">تقرير الكميات في المخزن </p>
    <p class="text-center " style="font-size: 25px">{{now()}} </p>
  <table class="table   table-hover table-bordered  table-striped table-sm ">
    <thead class="thead-dark text-right float-right">
       
      <tr>
        <th scope="col" class="text-center">الملاحضات</th>
        <th scope="col" class="text-center">الكمية</th>
        <th scope="col"class="text-center">الباركود</th>
        <th scope="col" class="text-center">اسم المنتج</th>
      
        
       
      
        
       
      

   

      </tr>
    </thead>
 
            <tbody>
              @foreach ($products as $item )
              <tr class="text-center">
                <td >{{$item->notes}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->barcode}}</td>
                <td>{{$item->product_name}}</td>
               
                
                
              
                
             
               
               
               
                
               
             
               
              </tr>
                
              @endforeach

            
            
            </tbody>
  
    
  </table>
  {{-- {{$products->links('pagination::bootstrap-4') }} --}}


</div>
    
  </div>
   
@endsection