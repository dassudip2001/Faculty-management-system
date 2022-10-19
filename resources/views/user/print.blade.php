
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
        
          @foreach ($createUser as $item)
           <tr>
             {{-- <td>{{$item->id}}</td> --}}
             <td>{{$item->faculty->fac_code}}</td>
               <td>{{$item->faculty->fac_title}}{{$item->user->name}}</td>
               <td>{{$item->user->email}} </td>
             <td>{{$item->faculty->fac_status}}</td>

             <td>{{$item->faculty->fac_phone}}</td>
             <td>{{$item->faculty->fac_join}}</td>
             <td>{{$item->faculty->fac_retirement}}</td>
             <td>{{$item->department->dept_name}}</td>
             <td>{{$item->faculty->fac_designtion}}</td>

          </tr>
          @endforeach
    </table>