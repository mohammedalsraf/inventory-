@extends('products.layout')
@section('content')
<div class="col-1 mt-5  " style="margin-right: 233px ;margin-bottom: 5px">
  <a class="btn btn-primary " href="{{ route('products.index') }}" style="width: 100px;">العودة </a>
</div>
<div id="content" class="" >

  
 <div class="container" >
  
     <form id="myForm" enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
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
             <div class="mb-2 " >
              
          
              
              </div>
             
               
               <div class="mb-3" >
                 <label for="input2" class="form-label ">اسم المادة</label>
                 <input type="text" class="form-control input-text" id="input2" name="product_name"  >
               </div>
               <div class="mb-3">
                 <label for="input2" class="form-label">الباركود</label>
                 <input type="text" class="form-control input-text" id="input2" name="barcode"  >
               </div>
               <div class="mb-3">
                 <label for="input2" class="form-label">الصنف</label>
                 <select class="form-control input-text" data-live-search="true" name="category_id" >
                  @foreach ($cat as $cat )
                  <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                    
                  @endforeach
                   
                  
                  </select>
               </div>
               <div class="mb-3">
                <label for="input2" class="form-label">الملاحضات</label>
                <input type="text" class="form-control input-text" id="input2" name="notes"  >
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
    </div>
@endsection
