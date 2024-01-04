
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
        <div class="row">
         <div class="col-12 grid-margin">
                <div class="card">
                <h4 class="card-title">All Messages</h4>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          
                          
                            <th> Client Name </th>
                            <th> E-mail </th>
                            <th> Subject </th>
                            <th> Message</th>
                            <th> Sending Date </th>

                          </tr>
                        </thead>
                        <tbody>
                        @foreach($mesg as $message)
                          <tr>
                          

                            <td >{{$message->name}}</td>
                            <td >{{$message->email}}</td>
                            <td >{{$message->subject}}</td>
                            <td >{{$message->message}}</td>
                            <td >{{$message->created_at}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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
