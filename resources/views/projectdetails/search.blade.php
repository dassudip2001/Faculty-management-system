<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details ') }}
        </h2>
    </x-slot>


    {{-- <div class="container mt-4 mx-4"> --}}
        <div class="card mt-4 mx-4">
            <div class="card-title mt-4 mx-4">
                <button type="button" class="btn btn-success float-end"><a href=" {{ url('/department') }} ">Back</a></button>
                <br>
                <h6>Search Project</h6>
                <hr>
            </div>
            <div class="card-body">
                @if($ProjectPosts->isNotEmpty())
        @foreach ($ProjectPosts as $post)
    
        <table class="table">
            <thead>
              <tr>
                
                <th scope="col"> Project No</th>
                <th scope="col">  Project Name</th>
                <th scope="col">  Project Scheme</th>
                <th scope="col">  Project Duration</th>
                <th scope="col">  Project Amount</th>
              
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>{{ $post->project_no }}</td>
                <td>{{ $post->project_title }}</td> 
                <td> {{$post->project_scheme}} </td>
                <td> {{$post->project_duration}} </td> 
                <td> {{$post->project_total_cost}} </td>

              </tr>             
            </tbody>
          </table>
            <div class="post-list">
          
               
            </div>
        @endforeach
    @else 
        <div>
            <h2>No ProjectPosts found</h2>
        </div>
    @endif
            </div>
    
        </div>
        
        
    


</x-admin-layout>
