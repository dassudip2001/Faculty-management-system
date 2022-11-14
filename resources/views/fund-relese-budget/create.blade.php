<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fund Relese Wish Budget Calculation') }}
        </h2>
    </x-slot>
     <div class="card mt-4 mx-4">
        <div class="card-tittle mt-2 mx-2"> 
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add new
        </button>
        <h6 class="mt-2">Fund Relese Budget</h6>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-striped table-hover">
            <thead class="table-dark">
             <tr>

                <th>Project Name</th>
                <th>Relese Found Amount</th>
                <th>Budget Name</th>
                <th>Budget Cost</th>
                <th>Action</th>
               </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
            </table>
        </div>
     </div>

     <!-- Model -->
      
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-xl modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fund Relese Module</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 <div class="row mb-2">
                      <div class="col">
                        <label for="faculty_designation">Project Name<span class="required" style="color: red;">*</span></label>
                        <select  name="payment_method" class="form-select" aria-label="Default select example" id="selector" onchange="yesnoCheck(this);">
                            <option   value="select">Select Project Name </option>
                            <option   value="CHECK">Check</option>
                            <option   value="NEFT">NEFT</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="faculty_designation">Fund Relese Budget<span class="required" style="color: red;">*</span></label>
                        <select name="funding_agency_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected hidden>Select</option>
                            @foreach ($funds as $funding)
                                <option value="{{$funding->id}}">{{$funding->relese_funds_amount}}
                                </option>
                            @endforeach
                        </select>
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
                                            <select name="budget_id[]" class="form-control">
                                                <option value="">-- choose Budget Name --</option>
                                               
                                                    <option value="">
                                                       
                                                    </option>
                                           
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
                                <button  id="add_row" class="btn  btn-success pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                            
                             <div class="col-sm-2">
                            
                        <label for="total_amount">Total Amount</label>
                        <input type="number" class="form-control form-control" name="totalAmount"  id="grandTotal" aria-describedby="total_amount" placeholder="0" readonly>
                    </div>
                    </div>
                    </div>
               
                
                </div>
            </div>
            <div class="modal-footer">
      
            <button id="submit" type="submit" class="btn btn-primary float-end" value="{{ trans('global.save') }}">Create Project</button>

            </div>
          </div>
     </div>


      @section('script')
        <script>
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
                    console.log("#add_row");
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
                        alert('Somethings Went Wrong ');
                    }

                }


            </script>
       @endsection

</x-admin-layout>