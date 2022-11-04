
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
        
          @foreach ($createUser1 as $pro)
           <tr>
            <td>{{$pro->project_no}}</td>
            {{-- <td>{{$pro->name}}</td> --}}
            <td>{{$pro->project_title}}</td>
            <td>{{$pro->project_scheme}}</td>
            <td>{{$pro->project_duration}} year </td>
             {{-- <td>{{$pro->project_total_cost}}</td> --}}
             <td>{{$pro->agency_name}}</td>
             <td>{{$pro->budget_title}}</td>
             <td>{{$pro->budget_details_amount}}</td>
            <td>{{$pro->project_total_cost}}</td>


          </tr>
          @endforeach
    </table>