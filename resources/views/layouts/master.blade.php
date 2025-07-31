<!-- master.blade.php ใช้เป็นหน้าจอ ต้องเชื่อม routes/web.php ด้วย -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'BikeShop | จําหน่ายอะไหล่จักรยานออนไลน์')</title> <!--add yield-->

    <!-- เชื่อม Bootstrap CSS จาก public -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- เชื่อม jQuery จาก public/js -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar navbar-default navbar-static-top">

            <div class="navbar-header">
                <a href="#" class="navbar-brand">BikeShop</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">หน้าแรก</a></li>
                    <li><a href="{{ URL::to('product') }}">ข้อมูลสินค้า</a></li>
                    <li><a href="#">รายงาน</a></li>
                </ul>
            </div>
            <!--
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัสสินค้า </th>
                        <th>ชื่อสินค้า </th>
                        <th>ราคาขาย</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A001</td>
                        <td>เบาะจักรยาน PROXIM NEMBO TIROX</td>
                        <td>5800.00</td>
                    </tr>
                    <tr>
                        <td>A002</td>
                        <td>ชุดล้อเสือหมอบคาร์บอน MEROCA </td>
                        <td>6300.00</td>
                    </tr>
                    <tr>
                        <td>A003</td>
                        <td>เฟรมจักรยานเสือหมอบ De rosa SUPER KING E</td>
                        <td>21300.00</td>
                    </tr>
                    <tr>
                        <td>A004</td>
                        <td>เฟืองจักรยานเสือหมอบ</td>
                        <td>5300.00</td>
                    </tr>
                    <tr>
                        <td>A005</td>
                        <td>แฮนด์จักรยาน MAN.INTEGR </td>
                        <td>27300.00</td>
                    </tr>
                    <tr>
                        <td>A006</td>
                        <td>กระเป๋าหัวจักรยาน</td>
                        <td>459.00</td>
                    </tr>
                    <tr>
                        <td>A007</td>
                        <td>ที่จอดจักรยาน</td>
                        <td>729.00</td>
                    </tr>
                    <tr>
                        <td>A008</td>
                        <td>แฮนด์จักรยาน FSA</td>
                        <td>1200.00</td>
                    </tr>
                    <tr>
                        <td>A009</td>
                        <td>ชุดขับจักรยานเสือภูเขา SRAM X0 T-TYPE EAGLE</td>
                        <td>64300.00</td>
                    </tr>
                </tbody>
            </table>
        
            <a href="#" class="btn btn-success"><i class="fa fa-save"></i> Confirm</a>
            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Cancel</a>
        -->
        </nav> @yield('content') <!-- add yield-->
    </div>
    <!-- แสดงข้อความแจ้งเตือนหากมีการส่งข้อความ -->
    @if (session('msg'))
        @if (session('ok'))
            <script>
                toastr.success("{{ session('msg') }}")
            </script>
        @else
            <script>
                toastr.error("{{ session('msg') }}")
            </script>
        @endif
    @endif
    <!-- เชื่อม Bootstrap JS จาก public -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>
