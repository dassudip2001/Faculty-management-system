<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         {{ __('Project') }}
        </h2>
    </x-slot>
<div class="container mt-4">
{{--    <div class="row">--}}
{{--        <div class="col">--}}
{{--          <!-- main contain -->--}}
{{--          <div class="card">--}}
{{--            <div class="card-title mt-2">--}}
{{--                <!-- card Title -->--}}
{{--                <h6>Project Form</h6>--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <!-- card body -->--}}
{{--                <form action="" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <!-- Project no -->--}}
{{--                        <div class="mb-6">--}}
{{--                          <label for="project_no">Project No<span class="required" style="color: red;">*</span></label>--}}
{{--                          <input type="text" class="form-control form-control-sm" name="project_no"  id="project_no" aria-describedby="project_no" placeholder="Enter  Project No">   --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <!--Project Title  -->--}}
{{--                        <div class="mb-6">--}}
{{--                          <label for="project_title">Project Title<span class="required" style="color: red;">*</span></label>--}}
{{--                          <input type="text" class="form-control form-control-sm" name="project_title"  id="project_title" aria-describedby="project_title" placeholder="Enter Project Title">   --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- scheme Duration -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <!-- Project Scheme -->--}}
{{--                        <div class="mb-6">--}}
{{--                          <label for="project_scheme"> Project Scheme<span class="required" style="color: red;">*</span></label>--}}
{{--                          <input type="text" class="form-control form-control-sm" name="project_scheme"  id="project_scheme" aria-describedby="project_scheme" placeholder="Enter Project Scheme">   --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <!--Project Duration  -->--}}
{{--                        <div class="mb-6">--}}
{{--                          <label for="project_duration"> Project Duration<span class="required" style="color: red;">*</span></label>--}}
{{--                          <input type="text" class="form-control form-control-sm" name="project_duration"  id="project_duration" aria-describedby="project_duration" placeholder="Enter Project Duration">   --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- cost -->--}}
{{--                <div class="mb-6">--}}
{{--                    <label for="project_cost">Project  cost<span class="required" style="color: red;">*</span></label>--}}
{{--                    <input type="text" class="form-control form-control-sm" name="project_total_cost"  id="project_cost" aria-describedby="project_cost" placeholder="Enter Project  Cost">   --}}
{{--                 </div>--}}
{{--                        <!-- button -->--}}
{{--                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>            --}}

{{--                </form>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
        <div class="col">
            <div class="card">
                <div class="card-title mx-2 mt-2">
                  <!-- card-title -->
                  <h4>Project Details</h4>
                </div>
                <div class="card-body p-0">
                    <!-- card-body -->
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                            <th>#</th>
                            <th> No</th>
                            <th> Title</th>
                            <th> Scheme</th>
                            <th> Duration</th>
                            <th> Cost</th>
                            @role('admin')
                            <th>Action</th>
                            @endrole
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($project as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td> {{$item->project_no}}</td>
                            <td> {{$item->project_title}}</td>
                            <td> {{$item->project_scheme}}</td>
                            <td> {{$item->project_duration}}</td>
                            <td> {{$item->project_total_cost}}</td>
                            <th>
                             @role('admin')
                            <a href=" {{ url('/project/edit',$item->id) }} ">
                            <i class="fa-regular fa-pen-to-square"></i>
                           </a>
                           <a href=" {{ url('/project/delete',$item->id) }} ">
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
<!-- footer contain -->
        </div>
    </div>
{{--</div>--}}


</x-admin-layout>
