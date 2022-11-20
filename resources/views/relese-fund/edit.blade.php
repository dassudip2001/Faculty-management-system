<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>
   <div class="container mt-3">
    <div class="card">
        <div class="card-title mx-3 mt-2">
            <h6>Update Relese Funds</h6>
            <hr>
        </div>
        <div class="card-body" >
            <div class="container" >
                <form action=" " method="POST">
                 @method('PUT')
                 @csrf
                {{-- form value  --}}
                <div class="row">
                <div class="col">
                    {{-- select project --}}
                    <label for="faculty_designation">Select Project<span class="required" style="color: red;">*</span></label>
                    <div>
                
                        <select  name="projec_fund_relese_id" class="form-select" aria-label="Default select example" id="selector" onchange="yesnoCHEQUE(this);">
                            <option   value="select">Select Project</option>
                                                               
                             @foreach ($projectDetail as $funding)
                            <option value="{{$funding->id}}">Project No:{{$funding->project_no}} ||  Project Name:{{$funding->project_title}} || Project Cost: {{$funding->project_total_cost}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                
                </div>
                <br>
            </div>
              <div class="row">
                <div class="col">
                    <label for="datfilde">Date</label>
                    <input type="text" class="form-control form-control-sm " name="date" value=" {{$relese_funds->date}} "  id="datefild" aria-describedby="datefild"  require>
                </div>
                <div class="col">
                     {{-- Transtation no --}}
                     <label for="transtation_no">Transtation No</label>
                     <input type="text" class="form-control form-control-sm " name="transaction_no" value=" {{$relese_funds->transaction_no}} "  id="transtation_no" aria-describedby="transtation_no" placeholder="Enter Your Transtation No" require>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="faculty_designation">Payment Recive Method<span class="required" style="color: red;">*</span></label>
                    <div>

                       <select  name="payment_method"  class="form-select" aria-label="Default select example" id="selector" value=" {{$relese_funds->payment_method}} " onchange="yesnoCheck(this);">
                           <option   value="select">Select payment mathod</option>
                           <option   value="CHECK">Cheque</option>
                           <option   value="NEFT">NEFT</option>
                       </select>
                   </div>
                   <br>
                
                   <div id="input" style="display: none;" class="mt-2">
                     <div class="row">
                       <div class="col">
                           <!-- <label for="payment_method_no">Enter Check No.</label>  -->
                       <input class="form-control" type="text" id="payment_method_no" value=" {{$relese_funds->payment_method_no}} " name="payment_method_no" placeholder="Enter payment Method No"/>
                       </div>
                       <div class="col">
                              <!-- <label for="transtation_date">Enter  Date</label>  -->
                       <input class="form-control" date="text" id="transtation_date" value=" {{$relese_funds->transtation_date}} " name="transtation_date" />
                       </div>
                       <div class="col">
                        <!-- <label for="transtation_date">Enter  Date</label>  -->
                       <input class="form-control" type="number" id="relese_amount" name="relese_funds_amount"  value="{{$relese_funds->relese_funds_amount}} " />
                      </div>
                     </div>
                   </div>

                   <div id="neft" style="display: none;" class="mt-2">
                      <div class="row">
                        <div class="col">
                            <label for="payment_method_no">Enter Check No.</label>
                        </div>
                        <div class="col">
                             <label for="transtation_date">Enter  Date</label>
                        </div>
                        <div class="col">
                            <label for="relese_amount">Enter  Amount</label>
                       </div>
                      </div>
                   </div>

                   <div id="neft" style="display: none;" class="mt-2">
                       <div class="row">
                        <div class="col">
                            <label >Enter Transeation No.</label>
                        </div>
                        <div class="col">
                            <label>Enter Transeation Date</label>
                        </div>
                        <div class="col">
                            <label for="relese_amount">Enter  Amount</label>
                       </div>
                       </div>
                   </div>

                <br>
                <hr>
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
                                @foreach (old('relese_fund_budget_id', ['']) as $index => $oldProduct)
                                    <tr id="product{{ $index }}">
                                        <td>
                                            <select name="relese_fund_budget_id[]" class="form-control">
                                                <option value="">-- choose Budget Name --</option>
                                                 @foreach ($budget_heads as $budget )
                                                     <option value=" {{$budget->id}} ">
                                                      {{ $budget->budget_title }}
                                                    </option>
                                                 @endforeach
                                                    
                                          
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control" onblur="findTotal()" id="inst_amount" name="fund_relese_budget_amount[]" id="clear" placeholder="Enter Budget Amount" />
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="product{{ count(old('relese_fund_budget_id', [''])) }}"></tr>
                            </tbody>
                        </table>
    
                        <div class="row">
                            <div class="col-sm-10">
                                <button  id="add_row" class="btn  btn-success pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                            
                             <div class="col-sm-2">
                            
                        <label for="total_amount">Total Amount</label>
                        <input type="number"  class="form-control form-control" name="totalAmount"  id="grandTotal" aria-describedby="total_amount" placeholder="0" readonly>
                    </div>
                    </div>
                    </div>
               
                
                </div>

                 
                </div>
            </div>
                </div>
              </div>
              <div class="mt-2 my-2 mx-4">
                <button type="submit" class="btn btn-primary float-end">Update changes</button>

              </div>

            </form>
            </div>
            
        </div>
    </div>
   </div>
   @section('script')
   <script>
 function yesnoCheck(that) 
{
    if (that.value == "CHECK") 
    {
        document.getElementById("check" && "input").style.display = "block";
    }
    else
    {
        document.getElementById("check" && "input").style.display = "none";
    }
    if (that.value == "NEFT")
    {
        document.getElementById("neft" && "input").style.display = "block";
    }
    else
    {
        document.getElementById("neft" ).style.display = "none";
    }
    if (that.value=="AMOUNT") {
        document.getElementById("amount" && "input").style.display = "block";
    } else {
        document.getElementById("amount" ).style.display = "none";
        
    }
   
}


// amount Drop down
$(document).ready(function(){
                let row_number = {{ count(old('relese_fund_budget_id', [''])) }};
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

                var arr = document.getElementsByName('fund_relese_budget_amount[]');
                var tot = 0;
                //button
                var Amount = document.getElementById('relese_amount').value;
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