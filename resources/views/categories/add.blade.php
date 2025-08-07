@extends('layouts.master')
@section('title') BikeShop | เพิ่มประเภทสินค้า @stop
@section('content')
    <h1>เพิ่มประเภทสินค้า </h1>

    <ul class="breadcrumb">
        <li><a href="{{ URL::to('category') }}">หน้าแรก</a></li>
        <li class="active">เพิ่มประเภทสินค้า </li>
    </ul>

    {!! Form::model($category, [
        'url' => '/category/insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong> เพิ่มประเภทสินค้า </strong>
            </div>
        </div>
        <div class="panel-body">
            <table>
                <tr>
                    <td>{{ Form::label('name', 'ชื่อประเภทสินค้า ') }}</td>
                    <td>{{ Form::text('name', $category->name, ['class' => 'form-control']) }}</td>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
