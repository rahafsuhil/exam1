@extends('cms.parent')

@section('title', 'Edit Admin')
@section('main-title', 'Edit Admin')

@section('sub-title', 'Edit Admin')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>City</label>
                    <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                      {{-- <option selected="selected">Alabama</option> --}}
                      @foreach($cities as $city)

                      <option @if($city->id == $admins->user->city_id) selected  @endif value="{{ $city->id }}">{{ $city->city_name }}</option>
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                     
                    </select>
                  </div>
                </div>

                  <div class="form-group col-md-4">
                    <label for="first_name">Admin First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" 
                   value="{{$admins->user->first_name}}"  placeholder="Enter Admin First Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="last_name">Admin Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"
                    value="{{$admins->user->last_name}}" placeholder="Enter Admin Last Admin">
                  </div>
                </div>

              
            

              <div class="row">
              
                <div class="form-group col-md-4">
                  <label for="email">Admin Email</label>
                  <input type="email" class="form-control" name="email" id="email"
                 value="{{$admins->email}}"  placeholder="Enter Email of Admin ">
                </div>
                {{-- <div class="form-group col-md-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter street of Admin">
                </div> --}}
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile"
                 value="{{ $admins->user->mobile }}"  placeholder="Enter street of Admin">
                </div>
              </div>

              <div class="row">
              
                <div class="form-group col-md-6">
                  <label for="address">Admin Address</label>
                  <input type="text" class="form-control" name="address" id="address"
                  value="{{ $admins->user->address }}" placeholder="Enter Address of Admin ">
                </div>
                <div class="form-group col-md-6">
                  <label for="date_of_birth">Date of Birth</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                 value="{{ $admins->user->date_of_birth }}"  placeholder="Enter date_of_birth Admin">
                </div> 
              </div>
            
            
            <div class="row">
            <div class="form-group col-md-6">
              <label for="gender">Gender</label>
              <select class="" name="gender" style="width: 100%; "
               id="gender" aria-label="form-select-sm example">
               <option selected>{{$admins->user->gender}}</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="status">Choose Status</label>
              <select class="" name="status" style="width: 100%; "
               id="status" aria-label="form-select-sm example">
               <option selected>{{$admins->user->status}}</option>
               <option value="active">Male</option>
               <option value="inactive">Female</option>
              </select>
            </div>

          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="image">Choose Image</label>
              <input type="file" class="form-control" name="image" id="image" placeholder="Enter Address of Admin ">
            </div>
          </div>


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $admins->id }})"  class="btn btn-primary">Update</button>
                <a href="{{ route('admins.index') }}" type="button" class="btn btn-info">GO BACK</a>

              </div>
            </form>
          </div>
          

        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('scripts')
<script>
 function performUpdate(id){
  let formData = new FormData();
  formData.append('first_name' ,document.getElementById('first_name').value);
  formData.append('last_name' ,document.getElementById('last_name').value);
  formData.append('mobile' ,document.getElementById('mobile').value);
  formData.append('address' ,document.getElementById('address').value);
  formData.append('email' ,document.getElementById('email').value);
  // formData.append('password' ,document.getElementById('password').value);
  formData.append('date_of_birth' ,document.getElementById('date_of_birth').value);
  formData.append('gender' ,document.getElementById('gender').value);
  formData.append('status' ,document.getElementById('status').value);
  formData.append('city_id' ,document.getElementById('city_id').value);
  formData.append('image' ,document.getElementById('image').files [0]);

  storeRoute('/cms/admin/admins-update/'+id , formData);

 }



</script>
@endsection