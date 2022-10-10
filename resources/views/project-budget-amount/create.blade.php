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
               Add New
             </button>
        <h6 >Budget Amount Calculation</h6>       
    </div><hr>
    <div class="card-body"> 
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Budget Amount Calculation</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal-lg" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
          ...
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save </button>
                   </div>
                 </div>
               </div>
             </div>
    </div>
</div>

</x-admin-layout>