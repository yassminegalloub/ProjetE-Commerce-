
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.css')
    <style type="text/css">
    .title 
    {
        color:white;
         padding-top: 25px;
         font-size: 25px;
    }
    label{
       display: inline-block;
       width: 200px; 
    }
    </style>
  </head>
  <body>
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
            <h1 class="title">Update Client</h1>

            @if(session()->has('message'))
                 
            <div class="alert alert-primary">
                <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}
            </div>

            @endif
            <div class="card-body">
            <form action="{{url('confirmupdate',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf

                       <div style="padding:15px">
                        <label>Name Client</label>
                        <input  style="color:black;" type="text" name="name" value="{{$user->name}}" required>
            
             <div style="padding:15px">
                 <label >Email</label>
                 <input  style="color:black;" type="text" name="email" value="{{$user->email}}" required>
             </div>

             <div style="padding:15px">
                 <label>Phone</label>
                 <input style="color:black;" type="text" name="phone" value="{{$user->phone}}" required>
             </div>

             <div style="padding:15px">
                 <label>Address</label>
                 <input style="color:black;" type="text" name="address" value="{{$user->address}}" required>
             </div>
              

             <div style="padding:15px">
                 <input   class="btn btn-primary btn-lg" type="submit" >
             </div>
        </form>
         </div>
            </div>
        </div>
          <!-- partial -->
       @include('admin.script')
  </body>
</html>
