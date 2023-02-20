<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Invoice') }}
        </h2>
    </x-slot>
    <div class="container text-center mt-4">
  <div class="card">
    <div class="card-title mt-2">
        <h6>Edit Status</h6>
        <hr>
    </div>

    <div class="card-body">
    @if(session('success'))
              <div class="alert alert-success">
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
    <form action=" " method="POST">
    @csrf
    @method('PUT')
    <div class="row">
               <div class="col">
                
            <div class="mb-6">
            <label for="status">Status<span class="required"
                                                                style="color: red;">*</span></label>
                                                        <!-- <input type="text" class="form-control form-control-sm" name="fac_title"  id="status" aria-describedby="status" placeholder="Enter  Faculty Title"> -->
                                                        <select name="status"
                                                            class="form-select form-select-sm @error('status') is-invalid @enderror"
                                                            aria-label=".form-select-sm example">
                                                            <option selected hidden>Status </option>
                                                            <option>Approved</option>
                                                            <option>pending</option>
                                                            <option>Cancle</option>
                                                        </select>
             </div>
               </div>
               


             
             <!-- Button -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">update</button>
    </form>
    </div>
    </div>
</div>

</x-admin-layout>