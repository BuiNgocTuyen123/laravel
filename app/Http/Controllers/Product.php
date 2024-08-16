<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Product extends Controller
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
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_cateory_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_products = DB::table('tbl_product')
            ->join('tbl_cateory_product', 'tbl_cateory_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->select('tbl_product.*', 'tbl_cateory_product.category_name', 'tbl_brand_product.brand_name')
            ->get();
    
        // Tính toán số lượng còn lại cho mỗi sản phẩm
        foreach ($all_products as $product) {
            $totalSold = DB::table('tblorer_details')
                            ->where('product_id', $product->product_id)
                            ->sum('product_sales_quantity');
            $product->qty_remaining = $product->product_qty - $totalSold;
        }
    
        $manager_product = view('admin.all_product')->with('all_product', $all_products);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    
    
    
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array(); // Khai báo một mảng để lưu dữ liệu
    
        // Gán dữ liệu từ request vào mảng $data
        $data['product_name'] = $request->product_name;
        $data['product_qty'] = $request->product_qty;

        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
                if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $path = public_path('uploads/product');
$get_image->move($path, $new_image);

                    $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }   
        public function active_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
            Session::put('message',' kích hoạt sản phẩm thành công');
            return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_cateory_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
                                                     ->with('cate_product',$cate_product)
                                                     ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    
    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array(); // Khai báo một mảng để lưu dữ liệu

        $data['product_name'] = $request->product_name;
        $data['product_qty'] = $request->product_qty;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;


        
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $path = public_path('uploads/product');
$get_image->move($path, $new_image);

            $data['product_image'] = $new_image;
    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    Session::put('message','cập nhật sản phẩm thành công');
    return Redirect::to('all-product');
}
DB::table('tbl_product')->where('product_id',$product_id)->update($data);
Session::put('message','cập nhật sản phẩm thành công');
return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //end admin pages
    public function detail_product($product_id){
        $cate_product = DB::table('tbl_cateory_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_cateory_product', 'tbl_cateory_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id',$product_id)->get();
            foreach ($details_product as $product) {
                $totalSold = DB::table('tblorer_details')
                                ->where('product_id', $product->product_id)
                                ->sum('product_sales_quantity');
                $product->qty_remaining = $product->product_qty - $totalSold;
            }
        
    
        $category_id = null; // Khởi tạo $category_id với giá trị mặc định
    
        // Kiểm tra và gán giá trị cho $category_id
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
            break; // Thoát vòng lặp sau khi đã tìm được $category_id
        }
    
        $related_product = collect(); // Khởi tạo một collection trống nếu không tìm được $category_id
    
        if($category_id !== null) {
            $related_product = DB::table('tbl_product')
            ->join('tbl_cateory_product', 'tbl_cateory_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_cateory_product.category_id', $category_id)
            ->whereNotIn('tbl_product.product_id', [$product_id])
            ->get();
        }
    
        return view('pages.sanpham.show_detail')->with('cate_product', $cate_product)
                                                ->with('brand_product', $brand_product)
                                                ->with('product_details', $details_product)
                                                ->with('relate', $related_product);
    }
    public function updateProductQuantities()
{
    // Lấy tất cả sản phẩm từ bảng tbl_product
    $products = DB::table('tbl_product')->get();

    foreach ($products as $product) {
        // Tính tổng số lượng đã bán của mỗi sản phẩm dựa trên product_id
        $totalSold = DB::table('tblorer_details')
                        ->where('product_id', $product->product_id)
                        ->sum('product_sales_quantity');

        // Cập nhật qty_cl (số lượng còn lại trong kho) cho mỗi sản phẩm
        $qty_cl = $product->product_qty - $totalSold;

        // Thực hiện cập nhật trong bảng tbl_product
        DB::table('tbl_product')
            ->where('product_id', $product->product_id)
            ->update(['qty_cl' => $qty_cl]);
    }
}

    
}
