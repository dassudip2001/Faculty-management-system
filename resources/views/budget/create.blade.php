<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget') }}
        </h2>
    </x-slot>
    <div class="container  mt-4">
  <div class="row">
    <div class="col">
    @role('admin')
      <div class="card">
          @if(session('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <form action=" " method="POST">
          @csrf
            <div class="card-title mx-2 mt-2">
                <h6>Budget Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
            <div class="row">
               <div class="col">
                 <!-- Budget Name -->
            <div class="mb-6">
               <label for="budget_title">Budget Title<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm @error('budget_title') is-invalid @enderror" name="budget_title"  id="budget_name" aria-describedby="budget_name" placeholder="Enter Budget Title">
             </div>
             @error('budget_title')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="col">
                  <!-- Budget code -->
                    <div class="mb-6">
                      <label for="budget_type">Budget Type<span class="required" style="color: red;">*</span></label>
                      <!-- <input type="text" class="form-control form-control-sm" name="budget_type"  id="budget_type" aria-describedby="budget_type" placeholder="Enter Budget Type"> -->
                      <select name="budget_type" class="form-select form-select-sm @error('budget_type') is-invalid @enderror" aria-label=".form-select-sm example">
                       <option selected hidden>Budget Type</option>
                       <option >Recurring</option>
                     <option >Non-Recurring</option>
               </select>
                    </div>
                    @error('budget_type')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                   </div>
                </div>
             <!-- Button -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
        </div>
       @endrole
      </div>
    </div>
    <div class="col">
      <div class="card max-h-96">
        <div class="card-title mx-2 mt-2">
            <h6>Budget Details</h6>
        </div>
       <!-- <div class="card-body"> -->
         <!-- output -->
         <table class="table table-striped table-hover">
           <thead class="table-dark">
            <tr>
              <th >#</th>
              <th >Budget Title</th>
              <th >Budget Type</th>

              @role('admin')
              <th >Action</th>
              @endrole
            </tr>
           </thead>
           <div class="overflow-auto">
         <tbody>
            @foreach ($budget as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->budget_title}}</td>

             <td> {{$item->budget_type}}</td>
             <td>
             @role('admin')
             <a href=" {{ url('/budget/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/budget/delete',$item->id) }} ">
             <i class="fa-solid fa-trash" style=""></i>
             @endrole
             </td>
             </a>
          </tr>
          @endforeach
        </tbody>
</div>
       </table>
        <!-- </div> -->
      </div>
    </div>
   </div>
</div>
</x-admin-layout>
