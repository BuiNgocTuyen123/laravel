@extends('welcome')
@section('content')
<style>
body {
    overflow-x: hidden; /* Tắt thanh cuộn ngang */
}
</style>
<body>
    <section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info" style="width:85%;">
            <?php
                $content = Cart::content();
                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img class="img" src="{{URL::to('uploads/product/'.$v_content->options->image)}}" alt="" width="75px" height="75px"/>
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field()}}
                                <input class="cart_quantity_input" type="number" name="quantity_cart" value="{{$v_content->qty}}">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="btn btn-default btn-sm">
                                <button type="sunmit"  name="update_qty" class="btn btn-default btn-sm">Cập nhật</button>
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                $subtotal = $v_content->price*$v_content->qty;  
                                echo number_format($subtotal).' vnđ';  
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h4 style="margin: 40px 0; font-size:20px;">Chọn hình thức thanh toán</h4>
        <form action="{{URL::to('order-place')}}" method="POST">
            {{csrf_field()}}
        <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="radio">Trả bằng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="radio">Tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="radio">Ví điện tử</label>
                </span>
                <button type="sunmit"  name="send_order_place" class="btn btn-primary btn-sm">Đặt hàng</button>

            </div>
        </form>
    </div>
</section> <!--/#cart_items-->
</body>
@endsection