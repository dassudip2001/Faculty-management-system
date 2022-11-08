<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>
    {{-- script add   for drop down --}}
    <script src="{{ asset('js/relese.js') }}" defer></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/relesefund.css') }}">

    {{-- main code  --}}
   <div class="card mt-4 mx-2">
    <div class="card-title mt-2 mx-2">
        <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New
       </button>
       <a class=" mx-4 mt-2  float-end" href="{{ url('/relesefund/download') }}"><i class="fa-solid fa-print"></i>Print All</a>
       <h6 class="mt-2">Relese Fund </h6>

       <hr>
       {{-- @if(session('success'))
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
   @endif --}}
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
                                        {{-- select project --}}
                                        <label for="faculty_designation">Payment Recive Method<span class="required" style="color: red;">*</span></label>
                                        <div>

                                           <select  name="projec_fund_relese_id" class="form-select" aria-label="Default select example" id="selector" onchange="yesnoCheck(this);">
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
                                        {{-- date --}}
                                        <label for="datfilde">Date<span class="required" style="color: red;">*</span></label>
                                        <input type="date" class="form-control form-control-sm " name="date"  id="datefild" aria-describedby="datefild" placeholder="Enter Date" require>
                                        @error('date')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        {{-- Transtation no --}}
                                        <label for="transtation_no">Transtation No<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm " name="transaction_no"  id="transtation_no" aria-describedby="transtation_no" placeholder="Enter Your Transtation No" require>
                                        @error('transaction_no')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                           @error('payment_method_no')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                           </div>
                                           <div class="col">
                                                  <!-- <label for="transtation_date">Enter  Date</label>  -->
                                           <input class="form-control" type="date" id="transtation_date" name="transtation_date" />
                                           @error('transtation_date')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                           </div>
                                           <div class="col">
                                            <!-- <label for="transtation_date">Enter  Date</label>  -->
                                           <input class="form-control" type="number" id="relese_amount" name="relese_funds_amount" />
                                           @error('relese_funds_amount')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
        <form action="" method="GET" class="d-flex">
            <input class="form-control me-2  type="text" name="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

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

                <th>Project Name</th>
                <th>Date</th>
                <th>Transtation No</th>
                <th>Type</th>
                <th>No</th>
                <th>Transtation  Date</th>
                <th>Amount</th>
                <th>Action</th>
                <th>Print</th>

             </tr>
            </thead>
            <tbody>
                @foreach ($fund as $trans)              
                <tr>
                    <td>{{$trans->project_no}} ||  {{$trans->project_title}} </td>
                    <td> {{$trans->date}} </td>
                    <td>{{$trans->transaction_no}}</td>
                    <td>{{$trans->payment_method}}</td>
                    <td>{{$trans->payment_method_no}}</td>
                    <td>{{$trans->transtation_date}}</td>
                    <td>{{$trans->relese_funds_amount}}</td>
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
                    <th>
                        <a href=" {{ url('/relesefund/pdfForm',$trans->id) }} ">
                            <i class="fa-regular fa-solid fa-print"></i>
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
    if (that.value=="AMOUNT") {
        document.getElementById("amount" && "input").style.display = "block";
    } else {
        document.getElementById("amount" ).style.display = "none";
        
    }
   
}

        </script>
    @endsection 
</x-admin-layout>