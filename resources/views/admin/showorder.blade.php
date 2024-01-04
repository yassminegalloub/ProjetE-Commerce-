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
      
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <table class="table table-dark table-striped" width="80%" style="padding: top 50px;">
                    <tr style="background-color: grey;">
                        <td style="padding:20px;">
                        Customer name
                        </td>
                        <td style="padding:20px;">
                         Phone 
                        </td>
                        <td style="padding:20px;">
                           Address 
                        </td>
                        <td style="padding:20px;">
                           Product title 
                        </td>
                        <td style="padding:20px;" >
                           Price 
                        </td>
                        <td style="padding:20px;">
                           Quantity 
                        </td>
                        <td style="padding:20px;">
                           Current_Status 
                        </td>
                        <td style="padding:20px;">
                           Status 
                        </td>
                    </tr>
                @foreach($order as $orders)
                    <tr align="center" style="background-color:black;">
                        <td style="padding:20px;">{{$orders->name}}</td>
                        <td style="padding:20px;">{{$orders->phone}}</td>
                        <td style="padding:20px;">{{$orders->address}}</td>
                        <td style="padding:20px;">{{$orders->product_name}}</td>
                        <td style="padding:20px;">{{$orders->price}}</td>
                        <td style="padding:20px;">{{$orders->quantity}}</td>
                        <td style="padding:20px;">{{$orders->status}}</td>
                        <td style="padding:20px;"><a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Delivred</a></td>
                    </tr>
                @endforeach
                </table>
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
