
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
            {{-- <tr>ID</tr> --}}
            <tr>Date</tr>
            <tr>Transtation No</tr>
            <tr>Payment Method</tr>
            <tr>Transtation Date</tr>
            <tr>Payment Method no</tr>
        </thead>
          @foreach ($releseFund1 as $item)
           <tr>
             {{-- <td>{{$item->id}}</td> --}}
             <td>{{$item->project_no}} ||  {{$item->project_title}} </td>

             <td> {{$item->date}}</td>
             <td> {{$item->transaction_no}}</td>
             <td> {{$item->payment_method}}</td>
             <td> {{$item->transtation_date}}</td>
             <td> {{$item->payment_method_no}}</td>
             <td>{{$item->relese_funds_amount}}</td>
             <td> {{$item->fund_relese_budget_amount}} </td>
             <td> {{$item->budget_title}} </td>


          </tr>
          @endforeach
    </table>