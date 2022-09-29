<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funding Agency') }}
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
        <form action=" " method="POST">
          @csrf
            <div class="card-title mx-2 mt-2">
                <h6>Funding Agency Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
             <!-- funding Name -->
             <div class="mb-6">
               <label for="funding_agency">Funding Agency Name<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control" name="agency_name"  id="funding_agency" aria-describedby="funding_agency" placeholder="Enter Funding Agency Name">
             </div>
             <!-- Button -->

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

        </form>
        </div>
        @endrole
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-title mx-2 mt-2">
            <h6>Funding Agency Details</h6>
        </div>

        <!-- <div class="card-body"> -->
         <!-- output -->
         <table class="table table-striped table-hover">
           <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Funding Agency Name</th>
              @role('admin')
              <th>Action</th>
              @endrole
            </tr>
           </thead>
         <tbody>
           @foreach ($agency as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->agency_name}}</td>
             <th>
             @role('admin')
             <a href=" {{ url('/funding/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/funding/delete',$item->id) }} ">
             <i class="fa-solid fa-trash" style=""></i>
             @endrole
             </th>
             <th>
                </a>
            </th>
          </tr>
          @endforeach
        </tbody>
       </table>
        <!-- </div> -->
      </div>
    </div>
   </div>
</div>

</x-admin-layout>
