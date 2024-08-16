@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin người mua
    </div>
    <div class="table-responsive">
      @php
        $message = Session::get('message');
        if($message){
            echo'<b style="color:green; text-align:center;">'.$message.'</b>';
            Session::put('message',null);
        }
      @endphp
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người mua</th>
            <th>Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_info->customer_name }}</td>
            <td>{{ $order_info->customer_phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_info->shipping_name }}</td>
            <td>{{ $order_info->shipping_address }}</td>
            <td>{{ $order_info->shipping_phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng kho</th>
            <th>Số lượng đặt</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_details as $detail)
            <tr>
              <td>{{ $detail->product_name }}</td>
              <td>{{ $detail->product_quantity }}</td>
              <td>{{ $detail->product_sales_quantity }}</td>
              <td>{{ number_format($detail->product_price) }}</td>
              <td>{{ number_format($detail->product_price * $detail->product_sales_quantity) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
