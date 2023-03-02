@extends('cms.parent')

@section('title', 'INDEX Admin')
@section('main-title', 'Index Admin')

@section('sub-title', 'Index Admin')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              {{-- <h3 class="card-title">List Data of Admin</h3> --}}
              <a href="{{ route('admins.create') }}" type="button" class="btn btn-info">ADD NEW Admin</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>mobile</th>
                    <th>gender</th>
                    <th>status</th>
                    <th>City Name</th>
                    <th>Setting</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin )
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image ?? "")}}"
                           width="50" height="50" alt="User Image">
                      </td>
                        <td>{{ $admin->user->first_name . " " . $admin->user->last_name ?? ""}}</td>
                        {{-- <td>{{ $admin->user->last_name ?? ""}}</td> --}}
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->user->mobile ?? ""}}</td>
                        <td>{{ $admin->user->gender ?? ""}}</td>
                        <td>{{ $admin->user->status ?? ""}}</td>


                        <td><span class="badge bg-info">{{ $admin->user->city->city_name ?? ""}}</span></td>


                        <td>
                          <div class="btn group">
                            <a href="{{ route('admis.edit' , $admin->id )}}" type="button" class="btn btn-info">
                              <i class="fas fa-edit-left"></i>
                              {{-- <i class="fas fa-edit"></i> --}}
                            </a>
                            <a type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-denger">
                              <i class="fas fa-trash-alt"></i>
                              {{-- <i class="fas fa-trash-alt"></i> --}}
                            </a>
                          
                          </div>
                        </td>
                      </tr> 
                    @endforeach
                 
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{ $admins->links() }}
            
          </div>
        
        
      </div>
      
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('scripts')
<script>
  function performDestroy(id , referance){
    confirmDestroy('/cms/admin/admins/' +id , referance) 
    


  }

</script>

@endsection