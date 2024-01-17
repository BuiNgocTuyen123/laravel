@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            cập nhật danh mục sản phẩm
                        </header>
                        <?php
	$message = Session::get('message');
	if($message){
		echo'<b style="color:green; text-align:center;">'.$message.'</b>';
		Session::put('message',null);
	}
	?>
    @foreach($edit_brand_products as $key => $edit_value)
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="{{ url('/update-brand-product/'.$edit_value->brand_id) }}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                                </div>
                                <button type="submit" name="add_brand_product" class="btn btn-info">cập nhật danh mục</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
@endsection