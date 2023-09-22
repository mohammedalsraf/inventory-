@extends('products.layout')

@section('title', 'Home')

@section('content')
<div class="container mt-4  ">
  <div class="col-6 mt-3 me-5 "><form action="{{ route('search') }}" method="GET" class="form-inline">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control" placeholder="ابحث عن اسم موظف">
      <div class="input-group-append">
        <button type="submit" class="btn btn-primary">ابحث</button>
      </div>
      <div class="input-group-append me-1">
        <a href="{{route('products.index')}}" class="btn btn-warning text-light">عرض الكل</a>
      </div>
    </div>
  </form></div>
</div>
<div id="content" class="p-4 p-md-5 pt-5 text-right">
  @if ($msg=Session::get('success'))
<div class="alert alert-success" role="alert">
  {{$msg}}
</div>
@endif

<div class="container ">
 
  <div class="row">
    <div class="col-1">
        <a class="btn btn-primary" href="{{ route('products.create') }}" style="width: 100px;">اضافة مادة</a>
    </div>

    <div class="col-1 mr-4">
        <a class="btn btn-primary" style="width: 180px" href="{{ route('pdfn') }}" target='_blank'>طباعة تقرير كل المخزن</a>
    </div>

    <div class="col-4" style="margin-bottom: 10px; margin-right: 100px;">
        <form action="{{route('catq')}}" method="post" target='_blank'>
          @csrf
          @method('post')
            <div class="row">
                <div class="col">
                    <select class="form-control bg-warning" data-live-search="true" name="cat">
                        <option value="">-- قم باختيار صنف</option>
                      
                        @foreach ($cat as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="طباعة تقرير صنف" style="margin-right: 10px;"  >
                </div>
            </div>
        </form>
    </div>
</div>
</div>


<div class="container my-1">
  <table class="table   table-hover table-bordered  table-striped table-sm ">
    <thead class="thead-dark">
      <tr>
       
        <th scope="col">ID</th>
        <th scope="col">اسم المنتج</th>
        <th scope="col">الباركود</th>
        <th scope="col">الصنف</th>
        <th scope="col">الكمية</th>
        <th scope="col">الملاحضات</th>
      

        <th scope="col" class="thg">الاجراء</th>
        <th scope="col" class="thg">عمليات المخزن</th>

      </tr>
    </thead>
 
            <tbody>
              @foreach ($products as $item )
              <tr>

                <td>{{$item->id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->barcode}}</td>
                <td>{{$item->cat_name}}</td>
                <td>{{$item->quantity}}</td>
             
                <td>{{$item->notes}}</td>
               
               
                
               
             
                <td> 
                 <div class="row">
                  <div class="col-3 ms-2">
                    <a  class='btn btn-info btn' href='{{route('products.show',$item->id)}}'>عرض </a>
                   </div>
                  
                   <div class="col-3 ms-2">
                    <a  class='btn btn-primary btn' href='{{route('products.edit',$item->id)}}'>تحديث </a>
                   </div>
                   
                 <div class="col-3 ms-2">
                  <form action="{{route('products.destroy',$item->id)}}" method="post">
                    @csrf
                   @method('delete')
                 <input  class="form-controler btn btn-danger btn" type="submit" value="حذف">
                 </form> 
                 </div>
                
                     
                 
                 
                
                  
               
               
             
                 </div>
      
                </td>  
                <td> 
                 
                    <div class="row ">
                      <div class="col-4 ">
                        <a style="width: 80px" class='btn btn-primary btn-sm' href='{{ route('transaction.createe', ['id' => $item->id, 'product_name' => $item->product_name]) }}'>ادخال واخراج مخزني</a>
                      </div>
                      <div class="col-4 ">
                        <a style="width: 80px" class='btn btn-primary btn-sm' href='{{ route('transaction.precord', ['id' => $item->id, 'product_name' => $item->product_name]) }}'>سجل حركات المادة</a>
                      </div>
                     </div>
                  

                </td>
              </tr>
                
              @endforeach

            
            
            </tbody>
  
    
  </table>
  {{$products->links('pagination::bootstrap-4') }}


</div>
    
  </div>
   
@endsection