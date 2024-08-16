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
              <li ><a style="background-color: rgb(27, 27, 42)" href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
              <li class="active">giỏ hàng của bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info" style="width:75%;">
            <?php
                $content = Cart::content();
                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu" style="background: linear-gradient(to right, #4e5150, #c1d3e6, #f897c4,brown);">
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
                            <p style="">{{number_format($v_content->price).' vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field()}}
                                <input style="width:50px;" class="cart_quantity_input" type="number" name="quantity_cart" value="{{$v_content->qty}}">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="btn btn-default btn-sm">
                                <button type="sunmit"  name="update_qty" class="btn btn-default btn-sm">Cập nhật</button>
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p style="color: #4e5150" class="cart_total_price">
                                <?php
                                $subtotal = $v_content->price*$v_content->qty;  
                                echo number_format($subtotal).' vnđ';  
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete" style="background-color: rgb(27, 27, 42)">
                            <a style="background-color: rgb(27, 27, 42)" class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times" style="background-color: rgb(27, 27, 42)"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3 style="background-color: rgb(27, 27, 42);border-radius:20px; color:white; width:300px;">Thanh toán giỏ hàng</h3>

        </div>
        <div class="row">
           
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::subtotal(0).'.vnđ'}}</span></li>
                        <li>Thuế <span>{{Cart::tax(0)}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total(0).'.vnđ'}}</span></li>
                    </ul>
                    <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id != NUll){
                    ?>
                        <a style="background-color: rgb(27, 27, 42)" class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                   <?php }else{ ?>
                    <a style="background-color: rgb(27, 27, 42)" class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
</body>
@endsection