@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการผู้ใช้งาน
@endsection


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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                        <th>เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $employeeS)
                                        <tr>
                                            <td><?= $employeeS->name ?></td>
                                            <td><?= $employeeS->email ?></td>
                                            <td><?= $employeeS->tel ?></td>
                                            <td><?= $employeeS->fac_category?></td>
                                            <td><?= $employeeS->role ?></td>
                                            <td>
                                                <a type="button"
                                                    href="{{ route('manage-factory.show', $employeeS->id . ',view') }}"
                                                    class="btn btn-primary mt-1" style="color: #FFFFFF;width: 60px"> <i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a type="button"
                                                    href="{{ route('manage-factory.show', $employeeS->id . ',edit') }}"
                                                    class="btn btn-warning mt-1" style="color: #FFFFFF;width: 60px"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <form action="{{ route('manage-factory.destroy', $employeeS->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="color: #FFFFFF;width: 60px"
                                                        class="btn btn-danger mt-1"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tfoot>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: #78909c;color:#FFFFFF;">
                    <h4 class="modal-title">เพิ่มผู้ใช้งานระบบ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manage-employee.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อ - นามสกุล</label>
                                        <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="กรุณากรอกชื่อ  - นามสกุล">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">อีเมล์</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="กรุณากรอก อีเมล์">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">เบอร์โทร</label>
                                        <input type="text" name="tel" class="form-control" id="exampleInputEmail1"
                                            placeholder="กรุณากรอก เบอร์โทร">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">รหัสผ่าน</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="กรุณากรอก รหัสผ่าน">
                                    </div>
                                    <div class="form-group">
                                        <label>ระดับผู้ใช้งาน</label>
                                        <select class="form-control select2" name="role" style="width: 100%;">

                                            <option value="0">ผู้ใช้งานทั่วไป</option>
                                            <option value="1">ผู้ดูแลระบบ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>หน่วยงาน</label>
                                        <select class="form-control select2" name="factory" style="width: 100%;">
                                            @foreach ($factory as $factoryS)
                                                <option value="{{ $factoryS->id }}">{{ $factoryS->fac_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" style=" background-color: #78909c;color:#FFFFFF"
                                class="btn">บันทึก</button>
                        </div>
                        </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endsection
