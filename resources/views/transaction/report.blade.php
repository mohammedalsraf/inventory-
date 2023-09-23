@extends('cat.layout')
@section('content')
<div class="col-1 mt-3  " style="margin-right: 260px ;margin-bottom: 5px">
    <a class="btn btn-primary " href="{{ route('products.index') }}" style="width: 100px;">العودة </a>
  </div>
<div id="content" class=" text-right">
    @if ($msg = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $msg }}
    </div>
    @endif

    <div class="container">
        {{-- ########################## --}}
        <div class="mt-3 mr-3">
        
            <table class="table   table-hover table-bordered  table-striped table-sm ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">اسم المادة</th>
                        <th scope="col">اجمالي الداخل</th>
                        <th scope="col">اجمالي الخارج</th>
                        <th scope="col"> اجمالي المتبقي</th>
                      
                       
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupedProducts as $item_id => $quantities)
                    <tr>
                        <td>  {{$quantities['product_name'] ?? 'N/A' }}</td>
                        <td>  {{ $quantities['ادخال'] ?? 0 }}</td>
                        <td>  {{ $quantities['اخراج'] ?? 0 }}</td>
                        <td>  {{ ($quantities['ادخال'] ?? 0) - ($quantities['اخراج'] ?? 0) }}</td>
                        
                     
               
                    @endforeach
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
@endsection
