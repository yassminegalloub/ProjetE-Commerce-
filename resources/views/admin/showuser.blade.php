
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
            <div class="container" align="center">
            @if(session()->has('message'))
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
            @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table table-dark table-striped" id="dataTable" width="80%" cellspacing="0">
                        
                          <tr>
                              <td>Name Client</td>
                              <td>Email</td>
                              <td>Phone</td>
                              <td>Address</td>
                              <td>Actions</td>
                          </tr>
                          @foreach($user as $users)
                          @if($users->usertype=='0')
                          <tr>
                           <td>{{$users->name}}</td>
                           <td>{{$users->email}}</td>
                           <td>{{$users->phone}}</td>
                           <td>{{$users->address}}</td>
                           <td>
                              <a class="btn btn-light" href="{{url('updateuser', $users->id)}}">Update </a>
                              <a class="btn btn-danger" onclick="return confirm('Are You Sure')" href="{{url('deleteuser',$users->id)}}">Delete </a>
                           </td>
                          </tr>
                          @endif
                         @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
          <!-- partial -->
       @include('admin.script')

       <footer class="footer" >
          <div class="text-center">
            
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © BOUTIQUE SHOP.com 2022</span>
            
        </div>
          </footer>
  </body>
</html>
