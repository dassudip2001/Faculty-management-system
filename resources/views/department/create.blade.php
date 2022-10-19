<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Department') }}
        </h2>
    </x-slot>
   
<div class="container  mt-4">
  <div class="row">
    <div class="col">
    @role('admin')
      <div class="card">
         
          @if(session('success'))
              <div class="alert alert-primary" role="alert">
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
        <form action="/department" method="POST">
          @csrf
            <div class="card-title mx-2 mt-2">
                <h6>Department Form<span class="required" style="color: red;">*</span></h6>
               
            </div>
            <hr>
            <div class="card-body">
            <div class="row">
               <div class="col">
                 <!-- Department Name -->
            <div class="mb-6">
               <label for="department_name">Department Name<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm  @error('dept_name') is-invalid @enderror" name="dept_name"  id="department_name" aria-describedby="department_name" placeholder="Enter Department Name" require>
             </div>
             @error('dept_name')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="col">
                  <!-- Department code -->
                    <div class="mb-6">
                      <label for="department_code">Department Code<span class="required" style="color: red;">*</span></label>
                      <input type="text" class="form-control form-control-sm  @error('dept_code') is-invalid @enderror" name="dept_code"  id="department_code" aria-describedby="department_code" placeholder="Enter Department Code">
                    </div>
                    @error('dept_code')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                   </div>
                </div>
             <!-- Department Details -->
             <div class="mb-6">
               <label for="department_details">Department Details</label>
               <input type="text" class="form-control form-control  @error('description') is-invalid @enderror" name="description"  id="department_details" aria-describedby="department_details" placeholder="Enter Department Description">
             </div>
             @error('description')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
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
            <a class="  float-end" href="{{ url('/department/download') }}"><i class="fa-solid fa-print"></i>Print All</a>
            <h6>Department Details</h6>
        </div>
        <!-- <div class="card-body"> -->
         <!-- output -->
         
         <div class="table-responsive">
         <table class="table table-striped table-hover">
           <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Department Name</th>
              <th>Code</th>
              <th>Description</th>
              @role('admin')
              <th>Action</th>
              <th>print</th>
              @endrole
            </tr>
           </thead>
           <div class="overflow-auto">
         <tbody>
            @foreach ($department as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->dept_name}}</td>
             <td> {{$item->dept_code}}</td>
             <td> {{$item->description}}</td>
             {{-- <td>{{ $item->jdcontent }} --}}
            </td>
             <td>
              @role('admin')
             <a href=" {{ url('/department/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/department/delete',$item->id) }} ">
            <button type="submit"><i class="fa-solid fa-trash"></i></button>
             @endrole
             </td>
                </a>
              <td>
                <a href=" {{ url('/department/pdfForm',$item->id) }} ">
                  <i class="fa-regular fa-solid fa-print"></i>
                 </a>
                
              </td>

          </tr>
          @endforeach
        </tbody>
        </div>
       </table>
        </div>
      </div>
    </div>
   </div>
</div>

</x-admin-layout>

