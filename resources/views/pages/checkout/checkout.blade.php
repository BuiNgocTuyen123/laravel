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
              <li class="active"><h1 style="color: brown">Thanh toán giỏ hàng</h1></li>
            </ol>
        </div>
        <div style="background: linear-gradient(to right, #c1d3e6, #f897c4);" class="register-req" style="width:70%;">
            <p>Quý khách vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p style="background: linear-gradient(to right, #c1d3e6, #f897c4);">Quý khách vui lòng điền mẫu gửi hàng</p>
                        <div class="form_one">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
                                {{csrf_field()}}
                  
                                <input type="text" style="margin-top:10px; " class="form-control" name="shipping_email" placeholder="Email" required>
                                <input type="text" style="margin-top:10px; " class="form-control" name="shipping_name" placeholder="Họ và tên" required>
                                <input type="text" style="margin-top:10px; " class="form-control" name="shipping_phone" placeholder="phone" required>
                                <input type="text" style="margin-top:10px; margin-bottom:20px; " class="form-control" name="shipping_address" placeholder="Địa chỉ" required>
                                <textarea style="background: linear-gradient(to right, #c1d3e6, #f897c4);" name="shipping_note" placeholder="ghi chú đơn hàng của bạn" rows="16"></textarea>
                             
                                </style>
                                <button type="sunmit"  name="send_order"  class="btn btn-sm" id="send_order">Gửi thông tin</button>
                                <style>
                                    #send_order {
                                        background: linear-gradient(to right, #c1d3e6, #f897c4);
                                        color: white;
                                        margin-top: 20px;
                                    }
                                
                                    #send_order:hover {
                                        background-color: brown;
                                    }
                                </style>
                            </form>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>


        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->
</body>
@endsection