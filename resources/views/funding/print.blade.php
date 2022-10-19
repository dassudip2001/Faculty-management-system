
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
        
          @foreach ($fundingAgency as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->agency_name}}</td>

          </tr>
          @endforeach
    </table>