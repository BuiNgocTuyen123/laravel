<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
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
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    
    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array(); // Khai báo một mảng để lưu dữ liệu
        $request->validate([
            'brand_product_name' => 'required', // Bắt buộc và có thể thêm các quy tắc khác
            'brand_product_desc' => 'required', // Tùy chọn, thêm nếu cần
            'brand_product_status' => 'required', // Tùy chọn, thêm nếu cần
        ]);
        // Gán dữ liệu từ request vào mảng $data
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status' => 1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }   
        public function active_brand_product($brand_product_id){
            $this->AuthLogin();
            DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update(['brand_status' => 0]);
            Session::put('message',' kích hoạt thương hiệu sản phẩm thành công');
            return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_products = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $manager_brand_products = view('admin.edit_brand_product')->with('edit_brand_products',$edit_brand_products);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_products);
    }
    public function update_brand_product(Request $request, $brand_product_id){
        $data = array(); // Khai báo một mảng để lưu dữ liệu
        $this->AuthLogin();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message','cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_product_id)->delete();
        Session::put('message','xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
}
