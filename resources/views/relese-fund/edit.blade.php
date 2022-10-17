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
                       
                       <select value=" {{$releseFund->payment_method}} " name="payment_method" class="form-select" aria-label="Default select example" id="selector" onchange="yesnoCheck(this);">
                           <option   value="select">_Select payment mathod_</option>
                           <option   name="payment_method"  value="cHECK" >Check</option>
                           <option  name="payment_method"   value="nEFT">NEFT</option>
                           {{-- <option   name="payment_method"  value="cHECK" >Check</option> --}}
                       </select>
                   </div>

                   <div id="check" style="display: none;" class="mt-2">
                     <div class="row">
                       <div class="col">
                           <label for="payment_method_no">Enter Check No.</label> 
                       <input class="form-control" type="text" value="{{$releseFund->payment_method_no}}" id="payment_method_no" name="transtation_date" />
                       </div>
                       <div class="col">
                              <label for="transtation_date">Enter Transeation Date</label> 
                       <input class="form-control" type="text" value="{{$releseFund->transtation_date}}" id="transtation_date" name="payment_method_no" />
                       </div>
                     </div>
                   </div>
                 <div id="neft" style="display: none;" class="mt-2">
                 <div class="row">
                     <div class="col">
                        <label for="payment_method_no">Enter Transeation No.</label> 
                     <input class="form-control"type="text" id="payment_method_no" value="{{$releseFund->payment_method_no}}" name="payment_method_no" />
                     </div>
                     <div class="col">
                         <label for="transtation_date">Enter Transeation Date</label> 
                     <input class="form-control" type="text" value="{{$releseFund->transtation_date}}" id="transtation_date" name="transtation_date" />
                     </div>
                 </div>

                 <!-- <label for="pan">Enter Pan Card No.</label> 
                 <input type="text" id="pan" name="pan" /><br /> -->
                 </div><div class="mt-4 my-3">
                <button type="submit" class="btn btn-primary float-end">Update</button>

              </div>
                </div>
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
   if (that.value == "cHECK") 
   {
       document.getElementById("check").style.display = "block";
   }
   else
   {
       document.getElementById("check").style.display = "none";
   }
   if (that.value == "nEFT")
   {
       document.getElementById("neft").style.display = "block";
   }
   else
   {
       document.getElementById("neft").style.display = "none";
   }
  
}
       </script>
   @endsection 
</x-admin-layout>