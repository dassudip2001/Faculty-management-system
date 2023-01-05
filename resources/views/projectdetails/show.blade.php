<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
       {{ __(' Project Details') }}
        </h2>
    </x-slot>




    <div class="card mt-3 m-4 table-responsive">
        <div class="card-body mt-2">
            <table class="table table-striped table-hover">
            <thead class="table-dark">
      <tr>
        <th scope="col">Project No</th>
        <th scope="col">Project Title</th>
        <th scope="col">Project Scheme</th>
        <th scope="col">Project Duration</th>
        <th scope="col">Total Project Cost</th>
        <th scope="col">Funding Agency</th>
        <th scope="col">Budget Name</th>
        <th scope="col">Budget Amount</th>
        <th scope="col">Name</th>

        <th scope="col">Email</th>
        <th scope="col">Department</th>
        <th scope="col">Phone</th>
        {{-- <th>Print</th> --}}




      </tr>
    </thead>
    <tbody>
        @foreach ($printPage as $print)
            <tr>
        <th scope="row"> {{$print->project_no}} </th>
        <td>{{$print->project_title}}</td>
        <td>{{$print->project_scheme}}</td>
        <td> {{$print->project_duration}} years </td>

        <td>Rs: {{$print->project_total_cost}} </td>

        <td> {{$print->agency_name}} </td>

        <td> {{$print->budget_title}} </td>

        <td>Rs: {{$print->budget_details_amount}} </td>

        <td> {{$print->name}} </td>
        <td> {{$print->email}} </td>
        <td> {{$print->dept_name}} </td>
        <td> {{$print->fac_phone}} </td>
        {{-- <th>
            <a href=" {{ url('/projectdetail/pdfForm',$print->id) }} "> print
                <i class="fa-solid fa-print"></i>
            </a>
        </th> --}}



      </tr>
        @endforeach


    </tbody>
  </table>
        </div>
    </div>


</x-admin-layout>
