@extends('layouts.master')
@section('title')
    BikeShop | อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง และอุปกรณ์ตกแต่ง
@endsection
@section('content')
    <div class="container" ng-app="app" ng-controller="ctrl">
        <h1>@{ helloMessage }</h1>

        <input type="text" class="form-control" ng-model="query.name" placeholder="ค้นหา">

        <table class="table table-bordered" ng-if="products.length">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อสินค้า </th>
                    <th>ราคาขาย</th>
                    <th>คงเหลือ</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tr ng-repeat="p in products|filter:query">
                <td>@{p.code}</td>
                <td>@{p.name}</td>
                <td>@{p.price | number:2 }</td>
                <td>@{p.stock_qty | number:0} </td>
                <td>
                    <span ng-if="p.stock_qty > 0 && p.stock_qty < 5"
                        ng-class="{'label label-warning': p.stock_qty > 0 && p.stock_qty < 5}">สินค้าใกล้หมด</span>
                    <span ng-if="p.stock_qty == 0" ng-class="{'label label-danger': p.stock_qty == 0}">สินค้าหมด</span>
                </td>
            </tr>
        </table>
        <h3 ng-if="!products.length">ไม่พบข้อมูลสินค้า </h3>
    </div>

    <script type="text/javascript">
        var app = angular.module('app', []).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('@{').endSymbol('}');
        });

        app.controller('ctrl', function($scope) {
            $scope.products = [{
                    'code': 'A001',
                    'name': 'เบาะจักรยาน PROXIM NEMBO TIROX',
                    'price': 5800.00,
                    'stock_qty': 3,
                    'category_id': 4
                },
                {
                    'code': 'A002',
                    'name': 'MEROCA ชุดล้อเสือหมอบคาร์บอน',
                    'price': 6300.00,
                    'stock_qty': 2,
                    'category_id': 2
                },
                {
                    'code': 'A003',
                    'name': 'เฟรมจักรยานเสือหมอบ De rosa SUPER KING E',
                    'price': 21300.00,
                    'stock_qty': 4,
                    'category_id': 1
                },
                {
                    'code': 'A004',
                    'name': 'เฟืองจักรยานเสือหมอบ 11',
                    'price': 5300.00,
                    'stock_qty': 9,
                    'category_id': 6
                },
                {
                    'code': 'A005',
                    'name': 'แฮนด์จักรยาน MAN.INTEGR.',
                    'price': 27300.00,
                    'stock_qty': 0,
                    'category_id': 5
                },
                {
                    'code': 'A006',
                    'name': 'ชุดขับจักรยานเสือภูเขา SRAM X0 T-TYPE EAGLE',
                    'price': 64300.00,
                    'stock_qty': 5,
                    'category_id': 7
                }
            ];
        });
    </script>
@endsection
