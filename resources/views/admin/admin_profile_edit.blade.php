@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">
   <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Profile Page</h4>
                                          <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                           @csrf
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name"  class="form-control" type="text" value="{{$editdata->name}}"  id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                                            <div class="col-sm-10">
                                                <input name="email"  class="form-control" type="email" value="{{$editdata->email}}"  id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">UserName</label>
                                            <div class="col-sm-10">
                                                <input name="username"  class="form-control" type="text" value="{{$editdata->username}}"  id="example-text-input">
                                            </div>
                                        </div>

                                         <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                                            <div class="col-sm-10">
                                                 <input name="profile_image" class="form-control" type="file"  id="image">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
		                                     <img class="rounded avatar-lg"  id="showImage" src="{{ (!empty($editdata->profile_image)) ? url('upload/admin_images/'.$editdata->profile_image) :  url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
                                        <!-- end row -->
                                        
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">                                                                       


                                          </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>         
   </div><!-- end col -->
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>



@endsection 