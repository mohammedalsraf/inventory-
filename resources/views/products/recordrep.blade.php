<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
      /* @page {
    size: A4 portrait;
    margin: 10;
} */
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;

    }
    </style>
  </head>
  <body onload="print()">
    <div class="container ">
      <p class="text-center " style="font-size: 25px">تقرير الكميات في المخزن </p>
      <p class="text-center " style="font-size: 25px color:black">  <?php echo date("d-m-Y"); ?> </p>
    <table class="table   table-hover table-bordered  table-striped table-sm ">
      <thead class="thead-dark  ">
         
        <tr class="text-center font-weight-bold">
            <th scope="col">التاريخ</th>
            <th scope="col">الكمية</th>
            <th scope="col">نوع الحركة</th>
            <th scope="col">ID</th>
           
            
            
        
        </tr>
      </thead>
   
              <tbody>
                @foreach ($precord as $item )
                <tr class="text-center">
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->item_id }}</td>
                    
                    
                   
                 
                </tr>
                  
                @endforeach
  
              
              
              </tbody>
    
      
    </table>
    {{-- {{$products->links('pagination::bootstrap-4') }} --}}
  
  
  </div>
      
    </div>
     
  </body>
</html>