@extends('cat.layout')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 text-right">
    @if ($msg=Session::get('success'))
    <div class="alert alert-success" role="alert">
      {{$msg}}
    </div>
    @endif

  
 <div class="container">
  
     <form id="myForm" enctype="multipart/form-data" action="{{route('cat.store')}}" method="post">
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
                 <label for="input2" class="form-label">اسم الصنف</label>
                 <input type="text" class="form-control input-text" id="input2" name="cat_name"  >
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
 <div class="mt-3 mr-3 ">
  <table class="table   table-hover table-bordered  table-striped table-sm ">
    <thead class="thead-dark">
          <tr>
           
            <th scope="col">ID</th>
            <th scope="col">اسم الصنف</th>
       
          
    
            <th scope="col" class="thg">الاجراء</th>
    
          </tr>
        </thead>
     
                <tbody>
                  @foreach ($cat as $item )
                  <tr>
    
                    <td>{{$item->id}}</td>
                    <td>{{$item->cat_name}}</td>
                
                   
                    
                   
                 
                    <td> 
                     <div class="row">
                   
                      
                      
                     <div class="col-3 ms-2">
                      <form action="{{route('cat.destroy',$item->id)}}" method="post">
                        @csrf
                       @method('delete')
                     <input  class="form-controler btn btn-danger btn-sm" type="submit" value="حذف" onclick="return doubleConfirm();">
                     </form> 
                     </div>
                         
                     
                     
                    
                      
                   
                   
                 
                     </div>
          
                    </td>  
                  </tr>
                    
                  @endforeach
    
                
                
                </tbody>
      
        
      </table>
 </div>
    </div>
   
@endsection
