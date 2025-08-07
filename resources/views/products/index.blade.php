@extends('layouts.master')
@section('title') BikeShop | รายการสินค้า @stop
@section('content')
    <h1>รายการสินค้า </h1>

    <div class="panel panel-default"> <!-- สร้างกรอบ panel -->
        <div class="panel-heading"><!-- HEAD-->
            <div class="panel-title"><strong>รายการ</strong></div>
        </div>

        <div class="panel-body">
            <form action="{{ URL::to('/product/search') }}" method="post" class="form-inline"> <!-- สร้างฟอร์มค้นหาสินค้า -->
                <!-- ใช้ method post เพื่อค้นหาสินค้า -->
                @csrf <!-- สร้าง token เพื่อป้องกันการโจมตี CSRF -->
                <input type="text" name="q" class="form-control" placeholder="ค้นหาสินค้า"
                    value="{{ request('q') }}">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form> <!-- สร้าง name q เพื่อใช้ไว้รับค่า textbox -->
        </div>

        <div class="container">
            <table class="table table-bordered bs_table">
                <thead>
                    <tr>
                        <th>รูปสินค้า </th>
                        <th>รหัส</th>
                        <th>ชื่อสินค้า </th>
                        <th>ประเภท</th>
                        <th>คงเหลือ</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>การทํางาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td><img src="{{ $p->image_url }}" width="50px"></td> <!-- แสดงรูปสินค้า -->
                            <td>{{ $p->code }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->category->name }}</td>
                            <td class="bs-price">{{ number_format($p->stock_qty, 0) }}</td>
                            <td class="bs-price">{{ number_format($p->price, 2) }}</td>
                            <td class="bs-center">
                                <a href="{{ URL::to('product/edit/' . $p->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}"><i
                                        class="fa fa-trash"></i> ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th class="bs-price">{{ number_format($products->sum('stock_qty'), 0) }}</th>
                        <th class="bs-price">{{ number_format($products->sum('price'), 2) }}</th>
                    </tr>
                </tfoot>
            </table>
            <div class="panel-footer">

            </div>
            <script>
                $('.btn-delete').on('click', function() {
                    if (confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")) {
                        var url = "{{ URL::to('product/remove') }}" + '/' + $(this).attr('id-delete');
                        window.location.href = url;
                    }
                });
            </script>

        </div>
    @endsection
