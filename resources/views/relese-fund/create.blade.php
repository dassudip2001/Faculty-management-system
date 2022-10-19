<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>
    {{-- script add   for drop down --}}
    <script src="{{ asset('js/relese.js') }}" defer></script>
    {{-- main code  --}}
   <div class="card mt-4 mx-2">
    <div class="card-title mt-2 mx-2">
        <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New
       </button>
       <h6 class="mt-2">Relese Fund</h6>
       <hr>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fund Relese Module</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                     {{-- Contant page --}}
                     <div class="card">
                       
                        <div class="card-title mt-2 mx-2">
                            <h6>Fund Relese Form</h6>
                            <hr>
                        </div>
                        <div class="card-body">
                            {{-- form --}}
                            <form action="" method="POST">
                                @csrf
                                {{-- form value  --}}
                                <div class="row">
                                    <div class="col">
                                        {{-- date --}}
                                        <label for="datfilde">Date<span class="required" style="color: red;">*</span></label>
                                        <input type="date" class="form-control form-control-sm " name="date"  id="datefild" aria-describedby="datefild" placeholder="Enter Date" require>
                                    </div>
                                    <div class="col">
                                        {{-- Transtation no --}}
                                        <label for="transtation_no">Transtation No<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm " name="transaction_no"  id="transtation_no" aria-describedby="transtation_no" placeholder="Enter Your Transtation No" require>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="faculty_designation">Payment Recive Method<span class="required" style="color: red;">*</span></label>
                                        <div>

                                           <select  name="payment_method" class="form-select" aria-label="Default select example" id="selector" onchange="yesnoCheck(this);">
                                               <option   value="select">Select payment mathod</option>
                                               <option   value="CHECK">Check</option>
                                               <option   value="NEFT">NEFT</option>
                                           </select>
                                       </div>
                                    
                                       <div id="input" style="display: none;" class="mt-2">
                                         <div class="row">
                                           <div class="col">
                                               <!-- <label for="payment_method_no">Enter Check No.</label>  -->
                                           <input class="form-control" type="text" id="payment_method_no" name="payment_method_no" placeholder="Enter payment Method No"/>
                                           </div>
                                           <div class="col">
                                                  <!-- <label for="transtation_date">Enter  Date</label>  -->
                                           <input class="form-control" type="date" id="transtation_date" name="transtation_date" />
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
                                           </div>
                                       </div>

                                     <!-- <div id="neft" style="display: none;" class="mt-2">
                                     <div class="row">
                                         <div class="col">
                                            <label for="payment_method_no">Enter Transeation No.</label> 
                                         <input class="form-control"type="text" id="payment_method_no" name="payment_method_no" />
                                         </div>
                                         <div class="col">
                                             <label for="transtation_date">Enter Transeation Date</label> 
                                         <input class="form-control" type="date" id="transtation_date" name="transtation_date" />
                                         </div>
                                     </div> -->

                                     <!-- <label for="pan">Enter Pan Card No.</label> 
                                     <input type="text" id="pan" name="pan" /><br /> -->
                                     <!-- </div> -->
                                    </div>
                                </div>
                                {{--  --}}
                                
                                {{--  --}}

                           
                        </div>
                     </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div> 
        </form>
          </div>
        </div>
    </div>
    <div class="card-title mx-3">


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
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
             <tr>
                <th>Date</th>
                <th>Transtation No</th>
                <th>Type</th>
                <th>No</th>
                <th>Transtation  Date</th>
                <th>Action</th>
             </tr>
            </thead>
            <tbody>
                @foreach ($fund as $trans)
                    
               
                <tr>
                    <td> {{$trans->date}} </td>
                    <td>{{$trans->transaction_no}}</td>
                    <td>{{$trans->payment_method}}</td>
                    <td>{{$trans->payment_method_no}}</td>
                    <td>{{$trans->transtation_date}}</td>
                    <th>
                        <a href=" {{ url('/relesefund/edit',$trans->id) }} ">
                            <i class="fa-regular fa-pen-to-square"></i>
                           </a>
                           <a href=" {{ url('/relesefund/delete',$trans->id) }} ">
                            <button type="submit">
                              <i class="fa-solid fa-trash">
                              </i>
                            </button>
                                </a>
                    </th>
                </tr>
            </tbody>
             @endforeach
        </table>
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
   
}

        </script>
    @endsection 
</x-admin-layout>