<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Mail;
session_start();
class HomeController extends Controller
{
    public function send_mail(){
        $to_name = "Ngoctuyen";
        $to_email = "bntuyena2.2019c3locthanh@gmail.com";//send to this email

        $data = array("name"=>"mail từ tài khoản khách hàng","mail gửi về vấn đề hàng hóa"); //body of mail.blade.php

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
    $message->to($to_email)->subject('Quên mật khẩu');
    $message->from($to_email,$to_name);

});
   return redirect('')->with('message','');
}

  // Đảm bảo rằng phương thức ajaxProducts trả về đúng view và dữ liệu
public function ajaxProducts(Request $request){
    if ($request->ajax()) {
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->paginate(8);
        return view('pages.home_products', compact('all_product'))->render();
    }
}

    
    public function index(){
        $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->paginate(8);    
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product);
    }
    
    public function search(Request $request){
        $keyword = $request->keywords_submit;
        $cate_product = DB::table('tbl_cateory_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }
}
