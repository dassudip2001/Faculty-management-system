<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Faculty') }}
        </h2>
    </x-slot>
<div class="container mt-4">
    <div class="card">
        <div class="card-title mx-3 my-2">
            <h6>Edit Faculty Details</h6>
            <hr>
        </div>
        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
<div class="card-body">
    <form action="" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col">
            <!-- Faculty Title -->
            <div class="mb-6">
            <label for="faculty_title">Faculty Title</label>
            <input type="text" class="form-control form-control-sm" name="fac_title"  id="faculty_title" aria-describedby="faculty_title" value="{{$faculty->fac_title}}" placeholder="Enter  Faculty Title">
            </div>
        </div>
        <div class="col">
             <!-- Faculty Code -->
            <div class="mb-6">
             <label for="faculty_code">Faculty Code</label>
            <input type="text" class="form-control form-control-sm" name="fac_code"  id="faculty_code" aria-describedby="faculty_code" value="{{$faculty->fac_code}}"  placeholder="Enter  Faculty Code">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Faculty Designation -->
            <div class="mb-6">
            <label for="faculty_designation">Faculty Designation</label>
            <input type="text" class="form-control form-control-sm" name="fac_designtion"  id="faculty_designation" aria-describedby="faculty_designation" value="{{$faculty->fac_designtion}}"  placeholder="Enter  Faculty Designation">
            </div>
        </div>
        <div class="col">
            <!-- Faculty Join -->
            <div class="mb-6">
            <label for="faculty_join">Faculty Join</label>
            <input type="text" class="form-control form-control-sm" name="fac_join"  id="faculty_join" aria-describedby="faculty_join" value="{{$faculty->fac_join}}"  placeholder="Enter  Faculty Join">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Faculty Retirement -->
            <div class="mb-6">
            <label for="faculty_retirement">Faculty Retirement</label>
            <input type="text" class="form-control form-control-sm" name="fac_retirement"  id="faculty_retirement" aria-describedby="faculty_retirement" value="{{$faculty->fac_retirement}}"  placeholder="Enter  Faculty Retirement">
            </div>
        </div>
        <div class="col">
            <!-- Faculty Phone -->
            <div class="mb-6">
            <label for="faculty_phone">Faculty Phone</label>
            <input type="text" class="form-control form-control-sm" name="fac_phone"  id="faculty_phone" aria-describedby="faculty_phone" value="{{$faculty->fac_phone}}"  placeholder="Enter  Faculty Phone Number">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Faculty Status -->
        <div class="mb-6">
        <label for="faculty_status">Faculty Status</label>
        {{-- <input type="text" class="form-control form-control-sm" name="fac_status"  id="faculty_status" aria-describedby="faculty_status" value="{{$faculty->fac_status}}"  placeholder="Enter  Faculty Status"> --}}
        <select name="fac_status" value="{{$faculty->fac_status}}" class="form-select form-select-sm @error('fac_status') is-invalid @enderror" aria-label=".form-select-sm example">
            <option selected hidden>Faculty Status </option>
            <option >Active </option>
           <option >Dactive </option>
            </select>
        </div>
        </div>
        <div class="col">
            <!-- Faculty Description -->
        <div class="mb-6">
            <label for="faculty_description">Faculty Description</label>
            <input type="text" class="form-control form-control-sm" name="fac_description"  id="faculty_description" aria-describedby="faculty_description" value="{{$faculty->fac_description}}"  placeholder="Faculty Description">
        </div>
        </div>
    </div>
    </div>
        <div class="mx-3 my-1">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </div>
    </div>

    </form>
</div>
</x-admin-layout>
