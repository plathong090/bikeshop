@extends('layouts.master')
@section('title') BikeShop | แก้ไขประเภทสินค้า @stop
@section('content')
    <h1>แก้ไขประเภทสินค้า </h1>

    <ul class="breadcrumb">
        <li><a href="{{ URL::to('category') }}">หน้าแรก</a></li>
        <li class="active">แก้ไขประเภทสินค้า </li>
    </ul>

    {!! Form::model($category, [
        'url' => '/category/update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}

    <!--แสดงข้อความแจ้งเตือนหากมีข้อผิดพลาดในการกรอกข้อมูล -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <input type="hidden" name="id" value="{{ $category->id }}">

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลประเภทสินค้า </strong>
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
