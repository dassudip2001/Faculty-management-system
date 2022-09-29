<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         {{ __('Faculty') }}
        </h2>
    </x-slot>
   <div class="container mt-4">
    <div class="row">
{{--        <div class="col">--}}
{{--            <!-- Select Form -->--}}
{{--            <!-- card -->--}}
{{--            <div class="card">--}}
{{--                <!-- card title -->--}}
{{--                <div class="card-title mx-3 mt-2">--}}
{{--                    <h6>Faculty</h6>--}}
{{--                    <hr>--}}
{{--                </div>--}}
{{--                <form action="" method="POST">--}}
{{--                    @csrf--}}
{{--                <div class="card-body">--}}
{{--                    <!-- card body -->--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Title -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_title">Faculty Title<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_title"  id="faculty_title" aria-describedby="faculty_title" placeholder="Enter  Faculty Title">   --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Code -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_code">Faculty Code<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_code"  id="faculty_code" aria-describedby="faculty_code" placeholder="Enter  Faculty Code">   --}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="card">--}}
{{--                            <!-- Faculty Designation -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_designation">Faculty Designation<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_designtion"  id="faculty_designation" aria-describedby="faculty_designation" placeholder="Enter  Faculty Designation">   --}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <!-- Faculty Join -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_join">Faculty Join<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_join"  id="faculty_join" aria-describedby="faculty_join" placeholder="Enter  Faculty Join">   --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Retirement -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_retirement">Faculty Retirement<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_retirement"  id="faculty_retirement" aria-describedby="faculty_retirement" placeholder="Enter  Faculty Retirement">   --}}
{{--                           </div>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Phone -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_phone">Faculty Phone<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_phone"  id="faculty_phone" aria-describedby="faculty_phone" placeholder="Enter  Faculty Phone Number">   --}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Status -->--}}
{{--                            <div class="mb-6">--}}
{{--                            <label for="faculty_status">Faculty Status<span class="required" style="color: red;">*</span></label>--}}
{{--                            <input type="text" class="form-control form-control-sm" name="fac_status"  id="faculty_status" aria-describedby="faculty_status" placeholder="Enter  Faculty Status">   --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <!-- Faculty Description -->--}}
{{--                            <div class="mb-6">--}}
{{--                             <label for="faculty_description">Faculty Description<span class="required" style="color: red;">*</span></label>--}}
{{--                             <input type="text" class="form-control form-control-sm" name="fac_description"  id="faculty_description" aria-describedby="faculty_description" placeholder="Faculty Description">   --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Button -->--}}
{{--                <div class="mx-2 mt-2">--}}
{{--                 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>            --}}

{{--                </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col">
            <!-- Show Form -->
            <div class="card">
                <!-- card title -->
            <div class="card-title mx-3 mt-2">
                <h6>Faculty Form</h6>
            </div>
            <div class="card-body p-0">
                <!-- table Show data -->
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Designation</th>
                            <th>Join</th>
                            <th>Retirement</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Description</th>
                            @role('admin')
                            <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($faculty as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td> {{$item->fac_title}}</td>
                            <td>{{$item->fac_code}}</td>
                            <td>{{$item->fac_designtion}}</td>
                            <td>{{$item->fac_join}}</td>
                            <td>{{$item->fac_retirement}}</td>
                            <td>{{$item->fac_phone}}</td>
                            <td>{{$item->fac_status}}</td>
                            <td>{{$item->fac_description}}</td>
                            <th>
                             @role('admin')
                             <a href=" {{ url('/faculty/edit',$item->id) }} ">
                              <i class="fa-regular fa-pen-to-square"></i>
                             </a>
                            <a href=" {{ url('/faculty/delete',$item->id) }} ">
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                            @endrole
                             </th>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            </div>

        </div>
    </div>

   </div>


</x-admin-layout>
