<style>
    table,thead{
        border-collapse: collapse;
        width: 100%;
    }
    th,td,tr,th{
        text-align: left;
        padding: 8px;

    }
    /* th{
        background-color: rebeccapurple;
        color: white;
    } */
   </style>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Budget_title</th>
                <th>Budget_type</th>
            </tr>
        </thead>
          @foreach ($budgetHead1 as $item)
           <tr>
            <td>{{$item->id}}</td>
            <td> {{$item->budget_title}}</td>

            <td> {{$item->budget_type}}</td>

          </tr>
          @endforeach
    </table>