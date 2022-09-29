<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>
<div class="container  mt-4">
    <div class="row">
        <!-- main contain -->
        <div class="col">
            <div class="card">
                <!-- Edit project -->
                <div class="card-title">
                    <h6>Edit Project </h6>
                    <hr>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- project no -->
                            <div class="col">
                            <div class="mb-6">
                              <label for="project_no">Project No</label>
                              <input type="text" class="form-control form-control-sm" name="project_no" value="{{$project->project_no}}"  id="project_no" aria-describedby="project_no" placeholder="Enter your project no">
                            </div>
                            </div>
                            <!-- project name -->
                            <div class="col">
                            <div class="mb-6">
                              <label for="project_title">Project Title</label>
                              <input type="text" class="form-control form-control-sm" name="project_title" value="{{$project->project_title}}"  id="project_title" aria-describedby="project_title" placeholder="Enter your project Title">
                            </div>
                            </div>
                           </div>
                           <div class="row">
                            <!-- project scheme -->
                            <div class="col">
                            <div class="mb-6">
                              <label for="project_scheme">Project Scheme</label>
                              <input type="text" class="form-control form-control-sm" name="project_scheme" value="{{$project->project_scheme}}"  id="project_scheme" aria-describedby="project_scheme" placeholder="Enter your project Scheme">
                            </div>
                            </div>
                            <!-- project duration -->
                            <div class="col">
                            <div class="mb-6">
                              <label for="project_duration">Project Duration</label>
                              <input type="text" class="form-control form-control-sm" name="project_duration" value="{{$project->project_duration}}"  id="project_duration" aria-describedby="project_duration" placeholder="Enter Project Duration">
                            </div>
                            </div>
                            <div class="mb-6">
                              <label for="project_cost">Project Cost</label>
                              <input type="text" class="form-control form-control-sm" name="project_total_cost" value="{{ $project->project_total_cost}}"  id="project_cost" aria-describedby="project_cost" placeholder="Change  Project Cost">
                            </div>

                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</x-admin-layout>
