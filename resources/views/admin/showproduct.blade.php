
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
  .container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}
</style>
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
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
            @endif
            
            <div class="container">
  <div class="row">
    <div class="col-12">
		    <table style="padding: top 10px;" class="text-center" width="80%" cellspacing="0">
             <thead class="thead-dark">
              <tr style="background-color: grey; color:black;">
                  <td style="padding:20px">Title</td>
                  <td style="padding:20px">Description</td>
                  <td style="padding:20px">Quantity</td>
                  <td style="padding:20px;">Price</td>
                  <td style="padding:20px">Image</td>
                  <td style="padding:20px">Action</td>
              </tr>  
             </thead> 
             <tbody class="thead-light">
              @foreach($data as $product)
              <tr align-items="center" style="background-color: black; ">
                  <td >{{$product->title}}</td>
                  <td >{{$product->description}}</td>
                  <td  >{{$product->quantity}}</td>
                  <td >{{$product->price}}</td>
                  <td ><img class="img-thumbnail" height="100px" width="100px"  src="/productimage/{{$product->image}}"></td>
                  <td>
                      <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update </a>
                 
                      <a class="btn btn-danger" onclick="return confirm('Are You Sure')" href="{{url('deleteproduct',$product->id)}}">Delete </a>
                  </td>
              </tr>
              @endforeach
             </tbody>
            </table>
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
