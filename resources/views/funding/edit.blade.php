<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funding Agency') }}
        </h2>
    </x-slot>
    <div class="container text-center mt-4">
  <div class="card">
    <div class="card-title mt-2">
        <h6>Edit Funding Agency Details</h6>
        <hr>
    </div>

    <div class="card-body">
    <form action=" " method="POST">
    @csrf
    @method('PUT')
    <div class="row">
             <!-- Funding Agency Details -->
             <div class="mb-6">
               <label for="funding_agency">Funding Agency Details</label>
               <input type="text" class="form-control form-control-sm" name="agency_name" value="{{$agency->agency_name}}" id="funding_agency" aria-describedby="funding_agency" placeholder="Enter Funding agency Name">
             </div>
             <!-- Button -->

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">update</button>
    </form>
    </div>
    </div>
</div>

</x-admin-layout>
