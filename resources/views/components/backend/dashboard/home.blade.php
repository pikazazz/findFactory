@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    Admin
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
                                จัดการข้อมูลผู้ใช้งานระบบ
                            </h3>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                เพิ่มผู้ใช้งานระบบ
                            </button>
                            <br />
                            <br />
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>


            <!-- ./row -->
        </div><!-- /.container-fluid -->
    </section>




    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มผู้ใช้งานระบบ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style=" background-color: #78909c;color:#FFFFFF;">
                                    <h3 class="card-title">แบบฟอร์มเพิ่มผู้ใช้งาน</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อ - นามสกุล</label>
                                            <input type="name" class="form-control" id="exampleInputEmail1"
                                                placeholder="กรุณากรอกชื่อ  - นามสกุล">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">อีเมล์</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="กรุณากรอก อีเมล์">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">รหัสผ่าน</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="กรุณากรอก รหัสผ่าน">
                                        </div>
                                        <div class="form-group">
                                            <label>ระดับผู้ใช้งาน</label>
                                            <select class="form-control select2" style="width: 100%;">

                                                <option value="0">ผู้ใช้งานทั่วไป</option>
                                                <option value="1">ผู้ดูแลระบบ</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" style=" background-color: #78909c;color:#FFFFFF" class="btn">บันทึก</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
