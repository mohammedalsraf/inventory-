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
          <h1>{{" سجل حركة المادة ".$product_name}}</h1>
            <table class="table table-primary  table-hover table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">نوع الحركة</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col" class="thg">الاجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($precord as $item)
                    <tr>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-3 ms-2">
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <input class="form-controler btn btn-danger btn-sm" type="submit"
                                            value="حذف">
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
</div>
@endsection
