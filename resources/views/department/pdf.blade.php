
   <style>
    table,thead{
        border-collapse: collapse;
        width: 100%;
    }
    th,td,tr,th{
        text-align: left;
        padding: 8px;

    }
    th{
        background-color: rebeccapurple;
        color: white;
    }
   </style>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Describption</th>
            </tr>
        </thead>
          @foreach ($department as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->dept_name}}</td>
             <td> {{$item->dept_code}}</td>
             <td> {{$item->description}}</td>
          </tr>
          @endforeach
    </table>
          
       


