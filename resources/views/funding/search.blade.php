<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funding') }}
        </h2>
    </x-slot>
    {{-- <div class="container mt-4 mx-4"> --}}
        <div class="card mt-4 mx-4">
        <div class="card-title mt-4 mx-4">
            <button type="button" class="btn btn-success float-end"><a href=" {{ url('/department') }} ">Back</a></button>
            <br>
            <h6>Search Funding</h6>
            <hr>
        </div>
        <div class="card-body">
            @if($posts->isNotEmpty())
    @foreach ($posts as $bud)
    <table class="table">
        <thead>
          <tr>
            <th scope="col"> Funding Agency  Name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $bud->agency_name }}</td>
          </tr>
        </tbody>
      </table>
        <div class="bud-list">          
        </div>
    @endforeach
    @else 
    <div>
    <h2>No Agency found</h2>
    </div>
    @endif
    </div>

    </div>
    
    



</x-admin-layout>



