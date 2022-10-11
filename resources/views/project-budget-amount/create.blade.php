<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget Amount Calculation') }}
        </h2>
    </x-slot>
<div class="card mt-4 mx-2">
    <div class="card-title mx-2 mt-2">
        <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i>Add New
             </button>
        <h6 >Budget Amount Calculation Details</h6>       
    </div><hr>
    <div class="card-body"> 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Budget Amount Calculation</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal-lg" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                   {{-- Budget amount form --}}
                   <form action="" method="POST">
                   @csrf
                   <h6 class="modal-title" >Project Details Form</h6>
                   <hr>
                   <div class="row">
                    <div class="col-sm-6">
                      {{-- project name --}}
                      <label for="project_name">Project Name<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Project</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              </option>
                          {{-- @endforeach --}}
                      </select>
                    </div>
                    <div class="col-sm-6">
                      {{-- Project Duration --}}
                      <label for="project_duration">Project Duration<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Project Duration</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              </option>
                          {{-- @endforeach --}}
                      </select>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      {{-- Budget Name --}}
                      <label for="budget_name">Budget Name<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Budget Name</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              </option>
                          {{-- @endforeach --}}
                      </select>
                    </div>
                    <div class="col-sm-6">
                      {{-- budget Amount --}}
                      <label for="project_name"> Budget Amount<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Budget Amount</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              </option>
                          {{-- @endforeach --}}
                      </select>
                    </div>
                   </div>
                  
                   </div>
                   <hr>
                   <h6 class="mx-3" >Project BUdget Amount Calculation Year Wish</h6>

                   <div class="modal-footer">
                    <hr>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save </button>
                   </div>
                 </div>
                 </form>
               </div>
             </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
         <tr>
           <th>#</th>
           <th>Project  Name</th>
           <th>Budget Details</th>
           <th>year</th>
           {{-- @role('admin') --}}
           <th>Action</th>
           {{-- @endrole --}}
         </tr>
        </thead>
        <div class="overflow-auto">
      <tbody>
         {{-- @foreach ($department as $item) --}}
        <tr>
          {{-- <td>{{$item->id}}</td> --}}
          {{-- <td> {{$item->dept_name}}</td> --}}
          {{-- <td> {{$item->dept_code}}</td> --}}
          {{-- <td> {{$item->description}}</td> --}}
          <td>
           {{-- @role('admin') --}}
          {{-- <a href="  "> --}}
          {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
         {{-- </a> --}}
         {{-- <a href=" "> --}}
         {{-- <button type="submit"><i class="fa-solid fa-trash"></i></button> --}}
          {{-- @endrole --}}
          {{-- </td> --}}
             {{-- </a> --}}

       </tr>
       {{-- @endforeach --}}
     </tbody>
     </div>
    </table>
     </div>

</div>

</x-admin-layout>