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
                <h6>Funding Agency Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
             <!-- funding Name -->
             <div class="mb-6">
               <label for="funding_agency">Funding Agency Name<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control  @error('agency_name') is-invalid @enderror" name="agency_name"  id="funding_agency" aria-describedby="funding_agency" placeholder="Enter Funding Agency Name">
                 @error('agency_name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
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
          <a class="  float-end" href="{{ url('/funding/download') }}"><i class="fa-solid fa-print"></i>Print All</a>

            <h6>Funding Agency Details</h6>
            <br>
            <form action="{{route('funding.search')}}" method="GET" class="d-flex">
              <input class="form-control me-2  type="text" name="search" placeholder="Search" aria-label="Search" required>
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <br>
        </div>

        <!-- <div class="card-body"> -->
         <!-- output -->
         <div class="table-responsive">
         <table class="table table-striped table-hover">
           <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Funding Agency Name</th>
              @role('admin')
              <th>Action</th>
              @endrole
              <th>Print</th>
            </tr>
           </thead>
         <tbody>
           @foreach ($agency as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->agency_name}}</td>
             <td>
             @role('admin')
             <a href=" {{ url('/funding/edit',$item->id) }} ">
              <i class="fa-regular fa-pen-to-square"></i>
             </a>
            <a href=" {{ url('/funding/delete',$item->id) }} ">
             <i class="fa-solid fa-trash" ></i>
            </a>
             @endrole
             </td>
            <td>
              <a href=" {{ url('/funding/pdfForm',$item->id) }} ">
                <i class="fa-regular fa-solid fa-print"></i>
               </a>

            </td>
          </tr>
          @endforeach
        </tbody>
       </table>
      </div>
        <!-- </div> -->
      </div>
    </div>
   </div>
</div>

</x-admin-layout>
