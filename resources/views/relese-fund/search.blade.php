<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>


    {{-- <div class="container mt-4 mx-4"> --}}
        <div class="card mt-4 mx-4">
            <div class="card-title mt-4 mx-4">
                <button type="button" class="btn btn-success float-end"><a href=" {{ url('/relesefund') }} ">Back</a></button>
                <br>
                <h6>Search Fund</h6>
                <hr>
            </div>
            <div class="card-body">
                @if($fundSearch->isNotEmpty())
        @foreach ($fundSearch as $post)
    
        <table class="table">
            <thead>
              <tr>
                
                <th scope="col"> Trnastation No</th>
                <th scope="col"> Date</th>
              
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>{{ $post->date }}</td>
                <td>{{ $post->transaction_no }}</td>
                
                
              </tr>
            
              
            </tbody>
          </table>
            <div class="post-list">
          
               
            </div>
        @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
            </div>
    
        </div>
        


</x-admin-layout>
