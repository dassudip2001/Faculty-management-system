<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show invoice') }}
        </h2>
    </x-slot>

 <div class="container">
    <div class="card mt-4 mx-2">
        <div class="card-title mt-4 mx-2">
            <button type="button" class="btn btn-primary float-end mx-2" >
                <a class="dropdown-item" href=" {{url('/invoiceuoload')}} ">Back To Invoice</a>
                
              </button>
            <h5>Invoice View</h5>
            
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                       <tr>
                        <th>Project ID</th>
                        <th>PDF</th>
                       </tr>
                    </thead>
                   <tbody>
                    <tr>
                        <td>
                            {{$data->name}}
                        </td>
                        <td>
                            <iframe height="400px" width="100%" src="/assets/{{$data->file}}" frameborder="0"></iframe>
                        </td>
                    </tr>
                   </tbody>
                </table>
            </div>
            

        </div>
    </div>
 </div>
</x-admin-layout>