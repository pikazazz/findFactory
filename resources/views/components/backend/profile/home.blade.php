@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการผู้ใช้งาน
@endsection

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('backend-header-content')
    @if (\Session::has('message'))
        <script>
            Swal.fire(
                'สำเร็จ',
                '{!! \Session::get('message') !!}',
                '{!! \Session::get('message-status') !!}',
            )
        </script>
    @endif
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
                                <form method="POST" action="{{ route('manage-profile.update', Auth::user()->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อ - นามสกุล</label>
                                            <input type="name" value="{{ Auth::user()->name }}" name="name"
                                                class="form-control" id="exampleInputEmail1"
                                                placeholder="กรุณากรอกชื่อ  - นามสกุล">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">อีเมล์</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1" value="{{ Auth::user()->email }}"
                                                placeholder="กรุณากรอก อีเมล์">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">เบอร์ติดต่อ</label>
                                            <input type="text" name="tel" value="{{ Auth::user()->tel }}"
                                                class="form-control" id="exampleInputPassword1"
                                                placeholder="กรุณากรอก เบอร์โทร">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">รหัสผ่าน</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="กรุณากรอก รหัสผ่าน">
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
