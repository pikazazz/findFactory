@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการข้อมูลโรงงาน
@endsection

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('backend-header-content')
    @if (\Session::has('message'))
        <script>
            Swal.fire(
                'ข้อความจากระบบ',
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
                                @if ($type == 'edit')
                                    แก้ไขข้อมูลพนักงาน
                                @else
                                    ข้อมูลพนักงาน
                                @endif

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('manage-employee.update', $employee->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">ชื่อ - นามสกุล</label>
                                                        <input type="name" name="name" value="{{ $employee->name }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            placeholder="กรุณากรอกชื่อ  - นามสกุล"
                                                            {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">อีเมล์</label>
                                                        <input type="email" name="email" value="{{ $employee->email }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            placeholder="กรุณากรอก อีเมล์"
                                                            {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">เบอร์โทร</label>
                                                        <input type="text" name="tel" value="{{ $employee->tel }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            placeholder="กรุณากรอก เบอร์โทร"
                                                            {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">รหัสผ่าน <sup style="color: red">*หากไม่ต้องการเปลี่ยนรหัสไม่ต้องกรอก</sup></label>
                                                        <input type="password" name="password"
                                                            value="" class="form-control"
                                                            id="exampleInputPassword1" placeholder="กรุณากรอก รหัสผ่าน"
                                                           >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ระดับผู้ใช้งาน</label>
                                                        <select class="form-control select2" name="role"
                                                            style="width: 100%;"
                                                            {{ $type === 'edit' ? 'required' : 'disabled' }}>
                                                            <option value="{{ $employee->role }}">
                                                                {{ $employee->role === '0' ? 'ผู้ใช้งานทั่วไป' : 'ผู้ดูแลระบบ' }}
                                                            </option>
                                                            <option value="0">ผู้ใช้งานทั่วไป</option>
                                                            <option value="1">ผู้ดูแลระบบ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>หน่วยงาน</label>
                                                        <select class="form-control select2" name="factory"
                                                            style="width: 100%;"
                                                            {{ $type === 'edit' ? 'required' : 'disabled' }}>
                                                            <option value="{{ $employee->factory }}">
                                                                {{ $employee->fac_category }}</option>
                                                            @foreach ($factory as $factoryS)
                                                                <option value="{{ $factoryS->id }}">
                                                                    {{ $factoryS->fac_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @if ($type == 'edit')
                                            <div class="modal-footer justify-content-between">
                                                <button type="submit" style="background-color: #78909c;color:#FFFFFF"
                                                    class="btn">บันทึก</button>
                                            </div>
                                        @else
                                            <div class="modal-footer justify-content-between">
                                                <a type="button"
                                                    href="{{ route('manage-employee.show', $employee->id . ',edit') }}"
                                                    class="btn btn-warning mt-1" style="color: #FFFFFF;width: 60px"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                            </div>
                                        @endif

                                    </form>
                                </div>
                            </div>



                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>


            <!-- ./row -->
        </div><!-- /.container-fluid -->
    </section>

    <script></script>
@endsection
