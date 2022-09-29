<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
       {{ __('Create Project') }}
        </h2>
    </x-slot>
    <div class="container  mt-4 ">
        <div class="row">

            <div class="col">
                <div class="card ">
                    <div class="mt-2 mx-2">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create New Project
                    </button>

                   <!-- Modal -->
                   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                            <!-- form Start -->
                        <form action="" method="POST" name="budgetForm">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md">
                                    <div >
                                        <label for="name">Project No<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="project_no" id="project_no" aria-describedby="project_no" placeholder="Enter Project No">
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
                                                <option value="{{$funding->id}}">{{$funding->agency_name}}
                                                </option>
                                            @endforeach
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

                            <div class="card-title overflow-auto">
                                <hr>
                                <h6>Budget Details </h6>
                                <hr>
                            </div>
                                <table name="budget" class="table table-bordered overflow-auto">
                                    <thead>
                                    <tr>
                                        <th>Budget Title</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr name="allBudget">
                                        <td>
                                            <select name="budget_id[]" class="form-select form-select-sm"   aria-label=".form-select-sm example">
                                                <option selected hidden>Budget Title </option>
                                                @foreach($budget as $bgt)
                                                    <option value="{{$bgt->id}}">{{$bgt->budget_title}}
                                                    </option>
                                            @endforeach
                                        </td>

                                        <td><input type="number" class="form-control form-control-sm" onblur="findTotal()" id="inst_amount" name="budget_details_amount[]" id="clear" placeholder="Enter Budget Amount" ></td>
                                        <td>
                                            <button class="btn btn-success" name="addBudget" type="button" id="add_btn" >
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>

                            <div class="row">
                                <div class="col">
                                    <!-- add options -->
                                </div>
                                <div class="col">
                                    <!-- add options -->
                                </div>
                                <div class="col">
                                    <div class="mb-6">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="number" class="form-control form-control" name="totalAmount"  id="grandTotal" aria-describedby="total_amount" placeholder="0" readonly>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <button id="submit" type="submit" disabled  class="btn btn-primary float-end">Create Project</button>

                         </form>
                         </div>

                       </div>
                     </div>
                   </div>
                    </div>

                    <div class="card-title mt-2 mx-2">
                        <!-- Button trigger modal -->
                         <!-- success massage -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                        <hr>
                        <h6>Project Details</h6>
                    </div>
                <div class="card-body p-0">
                 <table class="table table-striped table-hover">
                     <thead class="table-dark">
                     <tr>
                         <td>Project No</td>
                         <td>Project Title</td>
                         <td>Project Scheme</td>
                         <td>Project Duration</td>
                         <td>Project Total Cost</td>
                         <td>FunAgency</td>
                         <td>Budget Name</td>
                         <td>Budget Details Cost</td>
                         <td>Action</td>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($projectDetail as $pro)
                         <tr>
                             <td>{{$pro->project->project_no}}</td>
                             <td>{{$pro->project->project_title}}</td>
                             <td>{{$pro->project->project_scheme}}</td>
                             <td>{{$pro->project->project_duration}}</td>
                             <td>{{$pro->project->project_total_cost}}</td>
                             <td>{{$pro->fundingagency->agency_name}}</td>
                             <td>{{$pro->budget_id}}</td>

                             <td>{{$pro->budget_details_amount}}</td>
                             <th>
                                <a href=" {{ url('/projectdetail/edit',$pro->id) }} ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>                            <a href=" {{ url('/projectdetail/delete',$pro->id) }} ">
                                     <button type="submit"><i class="fa-solid fa-trash"></i></button>


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
        @section('script')
            <!-- budget Details -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#add_btn').on('click',function(){
                        var html='';
                        html+='<tr>';
                        html+='<td><select name="budget_id[]" class="form-select form-select-sm"  id="clear1" aria-label=".form-select-sm example"><option selected hidden>Budget Title </option>@foreach($budget as $bgt)<option value="{{$bgt->id}}">{{$bgt->budget_title}}</option>@endforeach</td>';
                        html+='<td><input type="number" class="form-control form-control-sm" onblur="findTotal()" name="budget_details_amount[]" placeholder="Enter Budget Amount" ></td>';
                        html+='<td><button type="button" onblur="findTotal()" id="remove" ><i class="fa-solid fa-trash"></i></button></td>';
                        html+='</tr>';
                        $('tbody').append(html);
                    })
                });
                $(document).on('click','#remove',function(){
                    $(this).closest('tr').remove();
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
                        add_btn.disabled=true;
                        button.disabled = false;
                      $('#budgetForm').submit();
                    }
                    else{
                        button.disabled = true;
                        alert('Somethings Went Wrong ');
                    }

                }

            </script>
    @endsection
</x-admin-layout>
