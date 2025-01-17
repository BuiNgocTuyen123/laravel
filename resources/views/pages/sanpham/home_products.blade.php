@foreach($all_product as $key => $product)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                    <img class="img" style="width:150px; height:150px;" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="" />
                </a>
                <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                <p>{{$product->product_name}}</p>
                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach

<div class="pagination">
    {!! $all_product->links() !!}
</div>
