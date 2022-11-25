<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>


    <div class="card mt-3 m-4">
        <div class="card-body mt-2">
            <table class="table">
            <thead>
      <tr>
        <th scope="col">Project No</th>
        <th scope="col">Date</th>
        <th scope="col">Transtation No</th>
        <th scope="col">Method </th>
        <th scope="col">Date</th>
        <th scope="col">Payament Method No</th>
        <th scope="col">Amout</th>
        <th scope="col">Budget Amount</th>
        <th scope="col">Name</th>

       



        
      </tr>
    </thead>
    <tbody>
        @foreach ($printfund as $item)
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
      
    </tbody>
  </table>
        </div>
    </div>
        
</x-admin-layout>
