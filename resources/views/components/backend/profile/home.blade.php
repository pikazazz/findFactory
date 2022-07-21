@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการผู้ใช้งาน
@endsection


@section('backend-header-content')
@endsection



@section('backend-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                แก้ไขข้อมูลส่วนตัว
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อ - นามสกุล</label>
                                            <input type="name" value="วิศรุต คงจำเนียร" class="form-control" id="exampleInputEmail1"
                                                placeholder="กรุณากรอกชื่อ  - นามสกุล">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">อีเมล์</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                            value="nongmixnatr@gmail.com" placeholder="กรุณากรอก อีเมล์">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">รหัสผ่าน</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="กรุณากรอก รหัสผ่าน">
                                        </div>
                                        <div class="form-group">
                                           <button type="submit" class="btn btn-success">แก้ไข</button>

                                        </div>
                                    </div>
                                </form>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>


            <!-- ./row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
