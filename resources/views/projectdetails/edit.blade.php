<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Edit Project') }}
        </h2>
    </x-slot>
    <div class="container  mt-4 ">
        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="mt-2 mx-2">
                            <!-- form Start -->
                        <form action="" method="POST" name="budgetForm">
                            @csrf
                            @method('PUT')
                            <div class="row g-2">
                                <div class="col-md">
                                    <div >
                                        <label for="name">Project No</label>
                                        <input type="text" class="form-control form-control-sm" name="project_no" id="project_no" aria-describedby="project_no" value="{{$projectDetail->project->project_no}}" placeholder="Enter Project No">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_title">Project Title</label>
                                        <input type="text" class="form-control form-control-sm" name="project_title" id="project_title" aria-describedby="project_title" value="{{$projectDetail->project->project_title}}" placeholder="Enter Project Title">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col">
                                    
                                </div>
                                <div class="col">
                                    <div class="mb-6">
                                        <label for="name">Principle Investigator</label> -->
                                        <!-- <br>
                                        <div class="row">
                                           
                                        </div> -->
                                    <!-- </div>
                                </div>
                            </div> -->
                            <div class="row g-2">
                                <div class="col-md">
                                    <div >
                                        <label for="project_scheme">Project Scheme</label>
                                        <input type="text" class="form-control form-control-sm" name="project_scheme" id="project_scheme" value="{{$projectDetail->project->project_scheme}}" aria-describedby="project_scheme" placeholder="Enter Project Scheme">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_duration">Project Duration</label>
                                        <input type="text" class="form-control form-control-sm" name="project_duration" id="project_duration" aria-describedby="project_duration" value="{{$projectDetail->project->project_duration}}"  placeholder="Enter Project Duration">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-6">
                                        <label for="project_cost">Project Cost</label>
                                        <input type="number" class="form-control form-control-sm" name="project_total_cost" id="amount" aria-describedby="project_cost" value="{{$projectDetail->project->project_total_cost}}"  placeholder="Enter Project Cost">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-title overflow-auto">
                                <hr>
                                <h6>Budget Details </h6>
                                <hr>
                            </div> -->
                                <!-- <table name="budget" class="table table-bordered overflow-auto">
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
                                               
                                                    <option value=""
                                                    </option>
                                           
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm" onblur="findTotal()" id="inst_amount" name="budget_details_amount[]" id="clear" placeholder="Enter Budget Amount" ></td>
                                        <td>
                                            <button class="btn btn-success" name="addBudget" type="button" id="add_btn" >
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table> -->
                            <!-- <div class="row"> -->
                                <!-- <div class="col"> -->
                                    <!-- add options -->
                                <!-- </div> -->
                                <!-- <div class="col"> -->
                                    <!-- add options -->
                                <!-- </div> -->
                                <!-- <div class="col"> -->
                                    <!-- <div class="mb-6"> -->
                                        <!-- <label for="total_amount">Total Amount</label> -->
                                        <!-- <input type="number" class="form-control form-control" name="totalAmount"  id="grandTotal" aria-describedby="total_amount" placeholder="0" readonly> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- </div> -->
                          
                            <button type="submit"   class="btn btn-primary m-2 float-end">Create Project</button>
                         </form>
                         </div>
                </div>
            </div>
        </div>
        
</x-admin-layout>
