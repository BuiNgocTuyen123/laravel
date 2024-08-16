<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon; // Nếu bạn chưa import Carbon, hãy thêm dòng này.
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
           return Redirect::to('dashboard');
        }
        else{
           return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->cus_name;
        $data['customer_email'] = $request->cus_email;
        $data['customer_password'] = $request->cus_pass;
        $data['customer_phone'] = $request->cus_phone;
        $cus_id = DB::table('=tbl_nguoidung')->insertGetId($data);

        Session::put('customer_id',$cus_id);
        Session::put('customer_name',$request->cus_name);
        return Redirect::to('/login-checkout');
    }
    public function checkout(){
        $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function save_checkout_customers(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['order_date'] = Carbon::now()->toDateString(); // Định dạng YYYY-MM-DD
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function payment(){
        $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);

    }
    public function order_place(Request $request){
        //insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'đang chờ xử lý';
        $order_id = DB::table('tblorer')->insertGetId($order_data);
        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
        $order_d_data['order_id'] = $order_id;
        $order_d_data['product_id'] = $v_content->id;
        $order_d_data['product_name'] = $v_content->name;
        $order_d_data['product_price'] = $v_content->price;
        $order_d_data['product_sales_quantity'] = $v_content->qty;
        DB::table('tblorer_details')->insertGetId($order_d_data);
        }
        if($data['payment_method']==1){
            echo 'Thanh toán thẻ ATM';
        }
        else if($data['payment_method']==2){
            Cart::destroy();
            $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        else{
            echo 'Thanh toán ví điện tử';
        }
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
        $tk = $request->tk;
        $mk = $request->mk;
        $result =DB::table('=tbl_nguoidung')->where('customer_name',$tk)->where('customer_password',$mk)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }
        else{
            return Redirect::to('/login-checkout');
        }
    }
    public function all_bill(Request $request){
        $this->AuthLogin();
        $all_order = DB::table('tblorer')
            ->join('=tbl_nguoidung', 'tblorer.customer_id', '=', '=tbl_nguoidung.customer_id')
            ->select('tblorer.*','=tbl_nguoidung.customer_name')
            ->orderby('tblorer.order_id','desc')->get();
    
        $manager_order = view('admin.bill')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.bill', $manager_order);

    }
    public function view_order($orderId){
        $this->AuthLogin();
        // Thay đổi ở đây
        $order_details = DB::table('tblorer_details')
            ->join('tbl_product', 'tblorer_details.product_id', '=', 'tbl_product.product_id')
            ->where('tblorer_details.order_id', $orderId)
            ->select('tblorer_details.*', 'tbl_product.product_qty AS product_quantity')
            ->get(); // Sử dụng get() thay vì first()
    
        $order_info = DB::table('tblorer')
            ->join('=tbl_nguoidung', 'tblorer.customer_id', '=', '=tbl_nguoidung.customer_id')
            ->join('tbl_shipping', 'tblorer.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->where('tblorer.order_id', $orderId)
            ->first(); // Giữ nguyên để lấy thông tin đơn hàng
    
        // Gửi cả thông tin đơn hàng và chi tiết đơn hàng đến view
        $manager_order_by_id = view('admin.view_order')
            ->with('order_info', $order_info)
            ->with('order_details', $order_details);
    
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
    
    public function update_quantity($product_id, $quantity_ordered){
        // Lấy số lượng tồn kho của sản phẩm
        $product = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $remaining_quantity = $product->product_qty;

        // Trừ đi số lượng đã đặt từ số lượng tồn kho
        $remaining_quantity -= $quantity_ordered;

        // Cập nhật số lượng tồn kho mới vào cơ sở dữ liệu
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_qty' => $remaining_quantity]);
    }
}
