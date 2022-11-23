
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
        
          @foreach ($releseFund2 as $item)
           <tr>
             {{-- <td>{{$item->id}}</td> --}}
             <td> project No:{{$item->project_no}} || Project Title: {{$item->project_title}} </td>
             <br>
             <br>

             <td> Date :{{$item->date}}</td>
             <td> Transtation No :{{$item->transaction_no}}</td>
             <td> {{$item->payment_method}}</td>
             <td> {{$item->transtation_date}}</td>
             <td> {{$item->payment_method_no}}</td>
             <td>{{$item->relese_funds_amount}}</td>
             <td> {{$item->fund_relese_budget_amount}} </td>
             <td> {{$item->budget_title}} </td>
             
          </tr>
          @endforeach
    </table>