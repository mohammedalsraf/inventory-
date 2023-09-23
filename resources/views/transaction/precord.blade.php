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
          <h1 >{{" سجل حركة المادة "}} <span style="color: red;font-weight: bold">{{$product_name}}</span></h1>
          <div class="row mb-2">
            <div class="col-1">
                <a class="btn btn-primary" href="{{ route('products.index') }}" style="width: 100px;">العودة </a>
            </div>
        
            <div class="col-1 mr-4">
                <a class="btn btn-primary" style="width: 180px" href="{{ route('recordrep',['id'=>$myid, 'product_name'=>$product_name]) }}" target='_blank'>طباعة تقرير  حركة مادة</a>
            </div>
            </div>
          <table class="table   table-hover table-bordered  table-striped table-sm ">
            <thead class="thead-dark input-text">
                    <tr >
                        <th scope="col">ID</th>
                        <th scope="col">نوع الحركة</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">التاريخ</th>
                 
                    </tr>
                </thead>
                <tbody class="input-text">
                    @foreach ($precord as $item)
                    <tr>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->created_at }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$precord->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
