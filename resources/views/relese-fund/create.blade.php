<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relese Fund') }}
        </h2>
    </x-slot>

   <div class="card mt-4 mx-2">
    <div class="card-title mt-2 mx-2">
        <h6>Relese Fund</h6>
        <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New
       </button>
        <hr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                            <form action="" method="post">
                                @csrf
                                {{-- form value  --}}
                                <div class="row">
                                    <div class="col">
                                        {{-- date --}}
                                        <label for="datfilde">Date<span class="required" style="color: red;">*</span></label>
                                        <input type="date" class="form-control form-control-sm " name="datefild"  id="datefild" aria-describedby="datefild" placeholder="Enter Date" require>
                                    </div>
                                    <div class="col">
                                        {{-- Transtation no --}}
                                        <label for="transtation_no">Transtation No<span class="required" style="color: red;">*</span></label>
                                        <input type="text" class="form-control form-control-sm " name="transtation_no"  id="transtation_no" aria-describedby="transtation_no" placeholder="Enter Your Transtation No" require>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="faculty_designation">Payment Recive Method<span class="required" style="color: red;">*</span></label>
                                        <!-- <input type="text" class="form-control form-control-sm" name="fac_designtion"  id="faculty_designation" aria-describedby="faculty_designation" placeholder="Enter  Faculty Designation"> -->
                                        <select name="fac_designtion" class="form-select form-select-sm @error('fac_designtion') is-invalid @enderror"  aria-label=".form-select-sm example">
                                          <option selected hidden> Select Payment method  </option>
                                          <option id="check" >Check </option>
                                           <option id="neft" > NeFT </option>
                                       </select>
                                    </div>
                                </div>


                            </form>
                        </div>
                     </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card-title">
            {{-- card body --}}
    </div>
   </div>
    @section('script')
        <script>

        </script>
    @endsection
</x-admin-layout>
