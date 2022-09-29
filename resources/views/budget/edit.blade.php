<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget') }}
        </h2>
    </x-slot>

    <div class="container text-center mt-4">
  <div class="card">
    <div class="card-title mt-2">
        <h6>Edit Budget Details</h6>
        <hr>
    </div>

    <div class="card-body">
    <form action=" " method="POST">
    @csrf
    @method('PUT')
    <div class="row">
               <div class="col">
                 <!-- Budget Name -->
            <div class="mb-6">
               <label for="budget_title">Budget Name</label>
               <input type="text" class="form-control form-control-sm"  value="{{$budget->budget_title}}"  id="budget_title" aria-describedby="budget_title" placeholder="Enter Budget Title">
             </div>
               </div>
               <div class="col">
                  <!-- Budget code -->
                    <div class="mb-6">
                      <label for="budget_type">Budget Code</label>
                      <input type="text" class="form-control form-control-sm" value="{{$budget->budget_type}}" name="budget_type"  id="budget_type" aria-describedby="budget_type" placeholder="Enter Your Budget Type">
                    </div>
                   </div>
                </div>
             <!-- Button -->

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">update</button>
    </form>
    </div>
    </div>
</div>
</x-admin-layout>
