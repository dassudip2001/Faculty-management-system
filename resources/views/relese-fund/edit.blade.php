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
              <div class="row">
                <div class="col">
                    <label for="datfilde">Date</label>
                    <input type="text" class="form-control form-control-sm " name="date" value=" {{$releseFund->date}} "  id="datefild" aria-describedby="datefild" placeholder="Enter Date" require>
                </div>
                <div class="col">
                     {{-- Transtation no --}}
                     <label for="transtation_no">Transtation No</label>
                     <input type="text" class="form-control form-control-sm " name="transaction_no" value=" {{$releseFund->transaction_no}} "  id="transtation_no" aria-describedby="transtation_no" placeholder="Enter Your Transtation No" require>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <label for="faculty_designation">Payment Recive Method<span class="required" style="color: red;">*</span></label>
                    <div>

                       <select  name="payment_method"  class="form-select" aria-label="Default select example" id="selector" value="{{$releseFund->payment_method}}" onchange="yesnoCheck(this);">
                           <option   value="select">Select payment mathod</option>
                           <option   value="CHECK">Check</option>
                           <option   value="NEFT">NEFT</option>
                       </select>
                   </div>
                
                   <div id="input" style="display: none;" class="mt-2">
                     <div class="row">
                       <div class="col">
                           <!-- <label for="payment_method_no">Enter Check No.</label>  -->
                       <input class="form-control" type="text" id="payment_method_no" value=" {{$releseFund->payment_method_no}} " name="payment_method_no" placeholder="Enter payment Method No"/>
                       </div>
                       <div class="col">
                              <!-- <label for="transtation_date">Enter  Date</label>  -->
                       <input class="form-control" type="text" id="transtation_date" value=" {{$releseFund->transtation_date}} " name="transtation_date" />
                       </div>
                       <div class="col">
                        <!-- <label for="transtation_date">Enter  Date</label>  -->
                       <input class="form-control" type="number" id="relese_amount" name="relese_funds_amount"  value=" {{$releseFund->relese_funds_amount}} " />
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
       </script>
   @endsection 
</x-admin-layout>