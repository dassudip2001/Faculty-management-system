<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget Amount Calculation') }}
        </h2>
    </x-slot>
<div class="card mt-4 mx-2">
    <div class="card-title mx-2 mt-2">
        <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i>Add New
             </button>
        <h6 >Budget Amount Calculation Details</h6>       
    </div><hr>
    <div class="card-body"> 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Budget Amount Calculation</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal-lg" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                   {{-- Budget amount form --}}
                   <form action="" method="POST">
                   @csrf
                   <h6 class="modal-title" >Project Details Form</h6>
                   <hr>
                   <div class="row">
                    <div class="col-sm-12">
                      {{-- project name --}}
                      {{-- <label for="project_name">Project Details<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected hidden>Select Project</option>
                        @foreach ($amountCal as $funding)
                            <option value="{{$funding->id}}">Project No-{{$funding->project_no}}-Project Title-{{$funding->project_title}}-Project Duration-{{$funding->project_duration}}--{{$funding->budget_title}}--{{$funding->budget_details_amount}}
                            </option>
                        @endforeach
                    </select> --}}
                    </div>
                    
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      {{-- Budget Name --}}
                      <label for="budget_name">Budget Name<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Budget Name</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              </option>
                          {{-- @endforeach --}}
                      </select>
                    </div>
                    <div class="col-sm-6">
                      {{-- budget Amount --}}
                      {{-- <label for="project_name"> Budget Amount<span class="required" style="color: red;">*</span></label>
                      <br>
                      <select name="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected hidden>Select Budget Amount</option>
                          {{-- @foreach ($data as $funding) --}}
                              {{-- <option value="{{$funding->id}}">{{$funding->agency_name}} --}}
                              {{-- </option> --}}
                          {{-- @endforeach --}}
                      {{-- </select> --}} 
                    </div>
                   </div>
                  {{-- start dropdown --}}
                  <div class="form-group mb-3">
                    <label for="project_name">Project Details<span class="required" style="color: red;">*</span></label>
                    
                    <select  id="project-dropdown" class="form-control">

                        <option value="">-- Select Project --</option>

                        @foreach ($amountCal as $data)

                        <option value="{{$data->id}}">

                            {{$data->project_no}} {{$data->project_title}}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="form-group mb-3">
                  <label for="budget_name">Budget Name<span class="required" style="color: red;">*</span></label>
                   
                    <select id="state-dropdown" class="form-control">

                    </select>

                </div>

                <div class="form-group">
                  <label for="project_name"> Budget Amount<span class="required" style="color: red;">*</span></label>
                    
                    <select id="city-dropdown" class="form-control">

                    </select>

                </div>
                  {{-- end drop down --}}
                   </div>
                   <hr>
                   <div class="card">
                    <div class="card-header">
                        Budget Details Calculation year Wish
                    </div>
    
                    <div class="card-body">
                        <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th >Budget Name</th>
                                    <th>Year</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (old('budget_id', ['']) as $index => $oldProduct)
                                    <tr id="product{{ $index }}">
                                        <td>
                                            <select name="project_details_id[]" class="form-control">
                                                <option value="">-- choose Budget Name --</option>
                                                @foreach ($amountCal as $funding)
                                                    <option value="{{$funding->id}}">
                                                      {{$funding->budget_title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control" onblur="findTotal()" id="inst_amount" name="year[]" id="clear" placeholder="Enter Budget Amount" />
                                        </td>
                                        <td>
                                          <input type="number" class="form-control form-control" onblur="findTotal()" id="inst_amount" name="project_budge_amount[]" id="clear" placeholder="Enter Budget Amount" />
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

                   <div class="modal-footer">
                    <hr>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save </button>
                   </div>
                 </div>
                 </form>
               </div>
             </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
         <tr>
           <th>#</th>
           <th>Project  Name</th>
           <th>Budget Details</th>
           <th>year</th>
           {{-- @role('admin') --}}
           <th>Action</th>
           {{-- @endrole --}}
         </tr>
        </thead>
        <div class="overflow-auto">
      <tbody>
         {{-- @foreach ($department as $item) --}}
        <tr>
          {{-- <td>{{$item->id}}</td> --}}
          {{-- <td> {{$item->dept_name}}</td> --}}
          {{-- <td> {{$item->dept_code}}</td> --}}
          {{-- <td> {{$item->description}}</td> --}}
          <td>
           {{-- @role('admin') --}}
          {{-- <a href="  "> --}}
          {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
         {{-- </a> --}}
         {{-- <a href=" "> --}}
         {{-- <button type="submit"><i class="fa-solid fa-trash"></i></button> --}}
          {{-- @endrole --}}
          {{-- </td> --}}
             {{-- </a> --}}

       </tr>
       {{-- @endforeach --}}
     </tbody>
     </div>
    </table>
     </div>

</div>
@section('script')
<script>
  // Drop down code
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $(document).ready(function () {



        /*------------------------------------------

        --------------------------------------------

         Dropdown Change Event

        --------------------------------------------

        --------------------------------------------*/

        $('#project-dropdown').on('change', function () {

            var idproject = this.value;

            $("#state-dropdown").html('');

            $.ajax({

                url: "{{url('api/fetch-states')}}",

                type: "POST",

                data: {

                    project_id: idproject,

                    _token: '{{csrf_token()}}'

                },

                dataType: 'json',

                success: function (result) {

                    $('#state-dropdown').html('<option value="">-- Select State --</option>');

                    $.each(result.states, function (key, value) {

                        $("#state-dropdown").append('<option value="' + value

                            .id + '">' + value.name + '</option>');

                    });

                    $('#city-dropdown').html('<option value="">-- Select City --</option>');

                }

            });

        });



        /*------------------------------------------

        --------------------------------------------

         Dropdown Change Event

        --------------------------------------------

        --------------------------------------------*/

        $('#state-dropdown').on('change', function () {

            var idState = this.value;

            $("#city-dropdown").html('');

            $.ajax({

                url: "{{url('api/fetch-cities')}}",

                type: "POST",

                data: {

                    state_id: idState,

                    _token: '{{csrf_token()}}'

                },

                dataType: 'json',

                success: function (res) {

                    $('#city-dropdown').html('<option value="">-- Select City --</option>');

                    $.each(res.cities, function (key, value) {

                        $("#city-dropdown").append('<option value="' + value

                            .id + '">' + value.name + '</option>');

                    });

                }

            });

        });



    });

</script>
@endsection

</x-admin-layout>