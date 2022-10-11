<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice Upload') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
<div class="card mt-4 mx-2">
    <div class="card-title mx-2 mt-2">
        <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Add New
             </button>
        <h6 >Budget Amount Calculation Details</h6>       
    </div><hr>
    <div class="card-body"> 
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if(session('success'))
              <div class="alert alert-primary" role="alert">
                  {{session('success')}}
              </div>
              @endif
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Invoice Generate</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal-lg" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                    {{-- main body --}}
                    <div class="row">
                        <div class="col">
                          {{-- select  --}}
                          <div class="container">
                            <div class="card mb-3 mt-3">
                                <div class="row">
                                  <div class="col-sm-8 mt-4 mx-5">
                                    {{-- project name --}}
                                    <label for="project_name">Please Select budget <span class="required" style="color: red;">*</span></label>
                                    <br>
                                    <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected hidden>Select Budget</option>
                                        {{-- @foreach ($amountCal as $funding) --}}
                                            {{-- <option value="{{$funding->id}}">Project No-{{$funding->project_no}}-Project Title-{{$funding->project_title}}-Project Duration-{{$funding->project_duration}}--{{$funding->budget_title}}--{{$funding->budget_details_amount}} --}}
                                            </option>
                                        {{-- @endforeach --}}
                                    </select>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          {{-- upload module --}}
                          <div class="container"  >
                            <div class="card mb-3 mt-3" style="max-width: 540px;">
                              <div class="row g-0 fleax">
                                <div class="col-md-4">
                                  <img src="{{ asset('/img/upload.png') }}" class="img-fluid rounded-start mt-3 mx-1" alt="...">
                                </div>
                                <br>
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">Upload File</h5>
                                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                                    <div>
                                      <label for="formFileLg" class="form-label">Please Upload Invoice</label>
                                      <input class="form-control form-control-lg" id="formFileLg" type="file">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save </button>
                   </div>
                 </div>
               </div>
             </div>
    </div>
</div>

</x-admin-layout>