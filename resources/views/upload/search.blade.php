<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice ') }}
        </h2>
    </x-slot>
{{-- <div class="container mt-4 mx-4"> --}}
    <div class="card mt-4 mx-4">
        <div class="card-title mt-4 mx-4">
            <button type="button" class="btn btn-success float-end"><a href=" {{ url('/invoiceuoload') }} ">Back</a></button>
            <br>
           

            
            <h6>Search Invoice</h6>
            <hr>
        </div>
        <div class="card-body">
            @if($invoiceupload->isNotEmpty())
        @foreach ($invoiceupload as $post)

    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Project No</th>
            <th scope="col"> Bill No</th>
            <th scope="col"> Describption</th>
            <th scope="col"> Amount</th>
            <th scope="col"> File</th>
            
            <th scope="col"> Download</th>
            <th>View</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>{{ $post->name }}</td>
            <td>{{ $post->bill_no }}</td>
            
            <td>{{$post->description}}</td>
            <td>{{$post->amount}}</td>
            <td>{{$post->file}}</td>
            <td>
                <a href=" {{ url('/download',$post->file) }}  ">
                  <button type="submit"><i class="fa-sharp fa-solid fa-download"></i></button>
                 </a>
              </td>
              <td><a href="{{ url('/view/'.$post->id) }}   ">
                <button type="submit"><i class="fa-solid fa-eye"></i></button>
               </a></td>

            <td><a href=" {{url('invoiceuoload/delete',$post->id)}} ">
                <button type="submit"><i class="fa-solid fa-trash"></i></button>
               </a></td>
          </tr>
        
          
        </tbody>
      </table>
        <div class="post-list">
      
           
        </div>
    @endforeach
@else 
    <div>
        <h2>No invoiceupload found</h2>
    </div>
@endif
        </div>

    </div>

</x-admin-layout>
