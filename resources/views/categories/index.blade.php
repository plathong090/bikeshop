@extends('layouts.master')
@section('title') BikeShop | รายการประเภทสินค้า @stop
@section('content')
    <h1>รายการประเภทสินค้า </h1>

    <div class="panel panel-default"> <!-- สร้างกรอบ panel -->
        <div class="panel-heading"><!-- HEAD-->
            <div class="panel-title"><strong>รายการ</strong></div>
        </div>

        <div class="panel-body">
            <form action="{{ url('/category') }}" method="get" class="form-inline">
                <input type="text" name="c" class="form-control" placeholder="ค้นหาประเภท"
                    value="{{ request('c') }}">
                <button type="submit" class="btn btn-primary">ค้นหาประเภท</button>
                <a href="{{ URL::to('category/add') }}" class="btn btn-success mb-3">เพิ่มประเภท</a>
            </form>
        </div>

        <div class="container">
            <table class="table table-bordered bs_table">
                <thead>
                    <tr>
                        <th> ชื่อประเภท </th>
                        <th>การทํางาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
        
                            <td class="bs-center">
                                <a href="{{ url('category/edit/' . $c->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $c->id }}"><i
                                        class="fa fa-trash"></i> ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <script>
                $('.btn-delete').on('click', function() {
                    if (confirm("คุณต้องการลบข้อมูลประเภทสินค้าหรือไม่?")) {
                        var url = "{{ URL::to('category/remove') }}" + '/' + $(this).attr('id-delete');
                        window.location.href = url;
                    }
                });
            </script>
        </div>
    </div>
@endsection
