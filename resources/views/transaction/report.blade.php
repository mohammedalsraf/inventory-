@extends('cat.layout')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 text-right">
    @if ($msg = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $msg }}
    </div>
    @endif

    <div class="container">
        {{-- ########################## --}}
        <div class="mt-3 mr-3">
        
            <table class="table table-primary  table-hover table-bordered ">
                <thead>
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
