<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\message;


class HomeController extends Controller
{
   public function redirect()
   {
      if(Auth::id())
      {

          $usertype=Auth::user()->usertype;

          if($usertype=='1')
          {
              return view('admin.home');
          }
          else 
          {
              $data = product::paginate(3);


              $user=auth()->user();

              $count=cart::where('phone', $user->phone)->count();

              return view('user.home',compact('data', 'count'));
          }
       }
       else 
       {
              $data = product::paginate(3);
              return view('user.home',compact('data'));   

       }

   }


   public function index()
   {
       if(Auth::id())
       {
           return redirect('redirect');
       }
       else
       {
           $data = product::paginate(3);

           return view('user.home',compact('data'));
       }
      
   }

   public function contactus()
   {
    if(Auth::id())
    {
        $data = product::paginate(3);
        $user=auth()->user();
        $count=cart::where('phone', $user->phone)->count();
           return view('user.contactus',compact('count'));
    }
    else
    {
        return view('user.contactus');
    }
 
   }

   public function allproduct()
   {
      if(Auth::id())
      {
       $data = product::all();
       $user=auth()->user();
       $count=cart::where('phone', $user->phone)->count();
       
       return view('user.allproduct',compact('count','data'));
      }else{
        $data = product::all();
        return view('user.allproduct',compact('data'));
      }
   }

   public function search(Request $request)
   {
       if(Auth::id())
       {

       $search=$request->search;
       
       if($search=='')
       {
        $data = product::paginate(3);

        return view('user.home',compact('data'));
       }
       $user=auth()->user();
       $count=cart::where('phone', $user->phone)->count();
       $data=product::where('title','Like','%'.$search.'%')->get();
       

       return view('user.home',compact('data', 'count'));
       }
       else {
        $search=$request->search;
        $data=product::where('title','Like','%'.$search.'%')->get();
        return view('user.home',compact('data',));
       }
      
   }

   public function addcart(Request $request ,$id)
   {
      if(Auth::id())
      {
         $user=auth()->user();
         
         $product=product::find($id);

         $cart= new cart;

         $cart->name=$user->name;
         $cart->phone=$user->phone;
         $cart->address=$user->address;

         $cart->product_title=$product->title;

         $cart->price=$product->price;

         $cart->quantity=$request->quantity;

         $cart->save();

        return redirect()->back()->with('message','Product Added
         successfully');
      } 
      else 
      {
          return redirect('login');
      }
    
   }


   public function showcart()
   {

    $user=auth()->user();

    $cart=cart::where('phone', $user->phone)->get();

    $count=cart::where('phone', $user->phone)->count();

       return view('user.showcart',compact('count','cart'));
   }


   public function deletecart($id)
   {
       $data=cart::find($id);

       $data->delete();

       return redirect()->back()->with('message','Product removed
       successfully');
   }

   public function confirmorder(Request $request)
   {

     $user=auth()->user();

     $name=$user->name;
     $phone=$user->phone;
     $address=$user->address;

     foreach($request->productname as $key=>$productname)
     {
          $order=new order; 
          $order->product_name=$request->productname[$key];
          $order->price=$request->price[$key];
          $order->quantity=$request->quantity[$key];

          $order->name=$name;   
          $order->phone=$phone; 
          $order->address=$address; 
          $order->status='not delivred';

          $order->save();

     }
       DB::table('carts')->where('phone', $phone)->delete();


       return redirect()->back()->with('message','Product Ordered
       successfully');
   }


   public function sendmessage(Request $request)
   {
    $mesg= new message ;
    $mesg->name=$request->name;
    $mesg->email=$request->email;
    $mesg->subject=$request->subject;
    $mesg->message=$request->message;
    $mesg->save();
    return redirect()->back()->with('message','your message has been sent successfully');

   }
}
