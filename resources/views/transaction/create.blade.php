@extends('cat.layout')
@section('content')
<div class="col-1 mt-5  " style="margin-right: 233px ;margin-bottom: 5px">
  <a class="btn btn-primary " href="{{ route('products.index') }}" style="width: 100px;">العودة </a>
</div>
<div id="content" class=" text-right">
    @if ($msg=Session::get('success'))
    <div class="alert alert-success" role="alert">
      {{$msg}}
    </div>
    @endif

  
 <div class="container">
  
     <form id="myForm" enctype="multipart/form-data" action="{{route('transaction.store')}}" method="post">
         @csrf
         @method('post')
         <div class="row text-right">
             <div class="col-md-4  bg-dark text-light">
              <div class="container my-3 col-12">
                @if ($errors->any())
                 <div class="alert alert-danger" role="alert">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
             
               
               <div class="mb-3">
                 <label for="input2" class="form-label ">معرف المادة</label>
                 <input type="text" class="form-control input-text" id="input2" name="item_id" value="{{$myid}}"  readonly>
               </div>
               <div class="mb-3">
                <label for="input2" class="form-label">اسم المادة</label>
                <input type="text" class="form-control input-text" id="input2"  value="{{$product_name}}" readonly >
              </div>
               <div class="mb-3">
               <label for="input2" class="form-label">نوع العملية (ادخال-اخراج)</label>
               <select name="type" id=""  class="form-control input-text">
                <option value="ادخال">ادخال</option>
                <option value="اخراج">اخراج</option>
               </select>
               </div>
               {{-- <div class="mb-3">
                <label for="input2" class="form-label">النوع </label>
                <input type="text" class="form-control" id="input2" name="type"  >
              </div> --}}
              <div class="mb-3">
                <label for="input2" class="form-label"> الكمية</label>
                <input type="number" class="form-control input-text" id="input2" name="quantity" >
              </div>
             
             
              <div class="my-2"> <button type="submit" class="btn btn-primary ">حفظ</button></div>
            
               <!-- Repeat similar code for input 3 to 8 -->
             </div>
            
           
           
             
          
           </div>
         
     
           {{-- <button type="submit" class="btn btn-primary" name="submit">حساب العلاوات والترفيعات</button>
           <button type="submit" class="btn btn-primary" name="add">اضافة</button> --}}
        
       
     
 
        
 
         
     </form>
 </div>
 
  </div>
{{-- ########################## --}}

    </div>
   
@endsection
