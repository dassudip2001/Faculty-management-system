<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
       {{ __('Create Project') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/projectDetails.css') }}">

    <div class="container  mt-4 ">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="mt-2 mx-2">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-plus"></i> Create New Project
                    </button>
                   <!-- Modal -->
                   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="staticBackdropLabel">Project Form</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         @if ($errors->any())
                           <div class="alert alert-danger">
                               <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                               </ul>
                           </div>
                       @endif
                         <div class="modal-body">
                            <!-- form Start -->
                        <form action="" method="POST" name="budgetForm">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md">
                                    <div >
                                        <label for="name">Project No<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="project_no"    id="project_no" aria-describedby="project_no" placeholder="Enter Project No">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_title">Project Title<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="project_title" id="project_title" aria-describedby="project_title" placeholder="Enter Project Title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-6">
                                        <label for="funding_agency">Funding Agency<span class="required" style="color: red;">*</span></label>

                                        <br>
                                        <select name="funding_agency_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected hidden>Select</option>
                                            @foreach ($data as $funding)
                                                <option value="{{$funding->id}}" selected>{{$funding->agency_name}}
                                                </option>
                                            @endforeach
                                            {{-- @foreach($data as $id => $agency_name )
                                            <option value="{{ $id }}" {{ old('agency_name') == $id ? "selected" :""}}>{{ $agency_name }}</option>
                                            @endforeach --}}
                                            {{-- @foreach($data as $tag)
                                                <option value="{{ $tag->id }}"
                                                           @if($selectedTags->contains($tag->id)) selected
    
                                                           @endif >{{ $tag->agency_name }}</option>    
                                               @endforeach  --}}
                                          </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-6">
                                        <label for="name">Principle Investigator<span class="required" style="color: red;">*</span></label>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <select name="create_user_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                    <option selected hidden>Select</option>
                                                    @foreach ($data2 as $funding)
                                                        <option value="{{$funding->id}}">{{$funding->name}} - {{$funding->dept_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div >
                                        <label for="project_scheme">Project Scheme<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="project_scheme" id="project_scheme" aria-describedby="project_scheme" placeholder="Enter Project Scheme">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_duration">Project Duration<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="project_duration" id="project_duration" aria-describedby="project_duration" placeholder="Enter Project Duration">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_cost">Project Cost<span class="required" style="color: red;">*</span></label>
                                        <input type="number" class="form-control form-control-sm" name="project_total_cost" id="amount" aria-describedby="project_cost" placeholder="Enter Project Cost">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    Budget Details
                                </div>

                                <div class="card-body">
                                    <table class="table" id="products_table">
                                        <thead>
                                            <tr>
                                                <th >Budget Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (old('budget_id', ['']) as $index => $oldProduct)
                                                <tr id="product{{ $index }}">
                                                    <td>
                                                        <select name="budget_id[]" class="form-control budget-names" id="cars" onclick="checkValue()">
                                                            {{-- Check whether option is already selected or not --}}
                                                            <option value="" >-- choose Budget Name --</option>
                                                            @foreach ($budget as $product)
                                                                <option value="{{ $product->id }}">
                                                                    {{ $product->budget_title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control" onblur="findTotal()" id="inst_amount" name="budget_details_amount[]" id="clear" placeholder="Enter Budget Amount" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr id="product{{ count(old('budget_id', [''])) }}"></tr>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <button  id="add_row" class="btn  btn-success pull-left" >+ Add Row</button>
                                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                        </div>

                                         <div class="col-sm-2">

                                    <label for="total_amount">Total Amount</label>
                                    <input type="number" class="form-control form-control" name="totalAmount"  id="grandTotal" aria-describedby="total_amount" placeholder="0" readonly>
                                </div>
                                    </div>
                                </div>
                            <hr>
                            <div class=" my-2 mx-2">
                                <button id="submit" type="submit" disabled  class="btn btn-primary float-end" value="{{ trans('global.save') }}">Create Project</button>

                            </div>

                         </form>
                         </div>

                       </div>
                     </div>
                   </div>
                    </div>

                    <div class="card-title mt-2 mx-2">
                        <!-- Button trigger modal -->
                         <!-- success massage -->

                    <a href=" {{ url('/projectdetail/download') }} ">
                        <i class="fa-solid fa-print"></i>Print All
                    </a>
                        <h6>Project Details</h6><hr>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                        <br>
                        <form action=" {{ route('projectdetail.search') }} " method="GET" class="d-flex">
                            <input class="form-control me-2"  type="text" name="search" placeholder="Search Project Title" aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                          <br>
                    </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                 <table class="table table-striped table-hover">
                     <thead class="table-dark">
                     <tr>
                        <td>Project No</td>
                        {{-- <td> Name</td> --}}
                        <td>Project Title</td>
                        <td>Project Scheme</td>
                        <td>Project Duration</td>
                        {{-- <td>Project Total Cost</td> --}}
                         {{-- <td>Funding Agency</td> --}}
                         {{-- <td>Budget Name</td> --}}
                         {{-- <td>Budget Details Cost</td> --}}
                         <td>Total Project Cost</td>
                         <td>Action</td>
                         <td>Print</td>
                         <td>View</td>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($project_details as $key=> $pro)
                         <tr>
                            <td>{{$pro->project_no}}</td>
                            {{-- <td>{{$pro->name}}</td> --}}
                            <td>{{$pro->project_title}}</td>
                            <td>{{$pro->project_scheme}}</td>
                            <td>{{$pro->project_duration}} year</td>
                             {{-- <td>{{$pro->project_total_cost}}</td> --}}
                             {{-- <td>{{$pro->agency_name}}</td> --}}
                             {{-- <td>{{$pro->budget_title}}</td>
                             <td>
                                <ul>
                                    <li>{{$pro->budget_title}} ( {{$pro->budget_details_amount}} )</li>
                                </ul>
                             </td> --}}
                                {{-- <ul>
                                @foreach($projectDetail as $key => $item)
                                    <li>{{ $item->budget_title }} ({{ $item->budget_details_amount}} </li>
                                @endforeach
                                </ul> --}}

                             {{-- <td>{{$pro->budget_details_amount}}</td> --}}
                             <td>Rs {{$pro->project_total_cost}}</td>
                             <th>
                                <a href=" {{ url('/projectdetail/edit',$pro->id) }} ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href=" {{ url('/projectdetail/delete',$pro->id) }} ">
                                     <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                 </a>
                             </th>
                             <th>
                                <a href=" {{ url('/projectdetail/pdfForm',$pro->id) }} ">
                                    <i class="fa-solid fa-print"></i>
                                </a>


                             </th>
                             <th>
                                <a href=" {{ url('projectdetails/showall',$pro->id) }} ">
                                    <i class="fa-solid fa-street-view"></i>
                                </a>
                             </th>
                         </tr>
                     @endforeach
                     </tbody>
                  </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @section('script')

        <script>



            var arr = [];
            var checkValue = function(event) {

                // const mySelect = document.getElementById("cars");
                // let currentValue = mySelect.options[mySelect.selectedIndex].value;

                // if ($.inArray(currentValue, arr) != "-1") {

                // alert("already selected");
                // console.log("already selected");
                // } else {
                // arr.push(currentValue);
                // console.log(currentValue);
                // }
                const data = $budget.filter((item) => item.id !== event.target.value);
                $budget=data;
            }



            //
                $(document).ready(function(){
                    let row_number = {{ count(old('budget_id', [''])) }};
                    $("#add_row").click(function(e){
                      e.preventDefault();
                      let new_row_number = row_number - 1;
                      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                      row_number++;
                    });

                    $("#delete_row").click(function(e){
                      e.preventDefault();
                      if(row_number > 1){
                        $("#product" + (row_number - 1)).html('');
                        row_number--;
                      }
                    });
                  });

                //calculation
                function findTotal() {

                    var arr = document.getElementsByName('budget_details_amount[]');
                    var tot = 0;
                    //button
                    var Amount = document.getElementById('amount').value;
                    var button = document.querySelector("#submit");
                      //setting button state to disabled
                    //button complete
                    for (var i = 0; i < arr.length; i++) {
                        if (parseInt(arr[i].value))
                            tot += parseInt(arr[i].value);
                        console.log(tot);
                    }
                    document.getElementById('grandTotal').value = tot;
                    console.log(tot);
                    if (tot==Amount){
                         alert('Equal To The Grand Total ');
                        add_row.disabled=true;
                        button.disabled = false;
                      $('#budgetForm').submit();
                    }
                    else{
                        button.disabled = true;
                        // alert('Somethings Went Wrong ');
                    }

                }

            </script>


    @endsection
</x-admin-layout>
