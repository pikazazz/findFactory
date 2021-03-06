@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการข่าวประชาสัมพันธ์
@endsection


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
                                จัดการข่าวประชาสัมพันธ์
                            </h3>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                เพิ่มข่าวประชาสัมพันธ์
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
                            <h3 class="card-title">ตารางรายการข่าวประชาสัมพันธ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>หัวข้อข่าว</th>
                                        <th>โรงงาน</th>
                                        <th>เมนู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infomation as $infomationS)
                                        <tr>
                                            <td>{{ $infomationS->info_title }}</td>
                                            <td>{{ $infomationS->fac_category }}</td>

                                            <td>

                                                <a type="button"
                                                    href="{{ route('manage-infomation.show', $infomationS->id . ',view') }}"
                                                    class="btn btn-primary mt-1" style="color: #FFFFFF;width: 60px"> <i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a type="button"
                                                    href="{{ route('manage-infomation.show', $infomationS->id . ',edit') }}"
                                                    class="btn btn-warning mt-1" style="color: #FFFFFF;width: 60px"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <form action="{{ route('manage-infomation.destroy', $infomationS->id) }}"
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

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                    <h4 class="modal-title">แบบฟอร์มเพิ่มข้อมูลโรงงาน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <form action="{{ route('manage-infomation.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>หัวข้อข่าว</label>
                                        <input type="name" name="info_title" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>โรงงาน</label>
                                        <select class="form-control select2" name="info_factory" style="width: 100%;"
                                            required>
                                            @foreach ($factory as $factoryS)
                                                <option value="{{ $factoryS->id }}">{{ $factoryS->fac_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="summernote" name="info_detail"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div id="msg"></div>
                                        <label for="exampleInputEmail1">อัพโหลดรูปประกอบ</label>
                                        <input type="file" name="img" class="file" accept="image/*" hidden>
                                        <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Upload File"
                                                id="file">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNzUycHQiIGhlaWdodD0iNzUycHQiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDc1MiA3NTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiA8Zz4KICA8cGF0aCBkPSJtNTE5LjAyIDQ1OS44MmMtMS44OTQ1IDEuODk0NS00LjczNDQgMS44OTQ1LTYuNjI4OSAwbC0xNS4xNTYtMTUuMTU2djQ3LjM1OWMwIDIuMzY3Mi0xLjg5NDUgNC43MzQ0LTQuNzM0NCA0LjczNDRzLTQuNzM0NC0yLjM2NzItNC43MzQ0LTQuNzM0NHYtNDcuMzU5bC0xNS4xNTYgMTUuMTU2Yy0wLjk0NTMxIDAuOTQ1MzEtMi4zNjcyIDEuNDIxOS0zLjMxNjQgMS40MjE5LTEuNDIxOSAwLTIuMzY3Mi0wLjQ3MjY2LTMuMzE2NC0xLjQyMTktMS44OTQ1LTEuODk0NS0xLjg5NDUtNC43MzQ0IDAtNi42Mjg5bDIzLjIwNy0yMy4yMDdjMC40NzI2Ni0wLjQ3MjY2IDAuOTQ1MzEtMC45NDUzMSAxLjQyMTktMC45NDUzMSAwLjk0NTMxLTAuNDcyNjYgMi4zNjcyLTAuNDcyNjYgMy43ODkxIDAgMC40NzI2NiAwIDAuOTQ1MzEgMC40NzI2NiAxLjQyMTkgMC45NDUzMWwyMy4yMDcgMjMuMjA3YzEuODkwNiAxLjg5NDUgMS44OTA2IDQuNzM0NC0wLjAwMzkwNiA2LjYyODl6Ii8+CiAgPHBhdGggZD0ibTI4Ni4wMiAzMjAuMTJjLTE2LjU3NCAwLTMwLjMwOS0xMy4yNjItMzAuMzA5LTMwLjMwOSAwLTE2LjU3NCAxMy4yNjItMjkuODM2IDMwLjMwOS0yOS44MzYgMTYuNTc0IDAgMjkuODM2IDEzLjI2MiAyOS44MzYgMjkuODM2IDAgMTcuMDUxLTEzLjI1OCAzMC4zMDktMjkuODM2IDMwLjMwOXoiLz4KICA8cGF0aCBkPSJtNDk3LjI0IDM5Ny43OXYtMTU4LjE4YzAtNy41NzgxLTYuMTU2Mi0xNC4yMDctMTQuMjA3LTE0LjIwN2gtMjY3LjFjLTguMDUwOCAwLTE0LjIwNyA2LjYyODktMTQuMjA3IDE0LjIwN3YyMTMuNTljMCA3LjU3ODEgNi4xNTYyIDE0LjIwNyAxNC4yMDcgMTQuMjA3aDIxMS42OWMyLjM2NzIgMzMuNjI1IDMwLjc4MSA2MC42MTcgNjQuODc5IDYwLjYxNyAzNS45OTIgMCA2NS4zNTUtMjkuMzYzIDY1LjM1NS02NS4zNTUtMC40NzI2Ni0zNC4wOTQtMjYuOTkyLTYyLjUxMi02MC42MTctNjQuODc5em0tMjg2LjA0LTE1OC4xOGMwLTIuMzY3MiAxLjg5NDUtNC43MzQ0IDQuNzM0NC00LjczNDRoMjY3LjFjMi44Mzk4IDAgNC43MzQ0IDIuMzY3MiA0LjczNDQgNC43MzQ0djEzOC43NmwtNjkuMTQxLTYwLjYxN2MtMS44OTQ1LTEuNDIxOS00LjczNDQtMS40MjE5LTYuMTU2MiAwbC04My4zNTIgNzcuNjY4LTM4LjM1OS0zNy44ODdjLTEuNDIxOS0xLjQyMTktNC4yNjE3LTEuODk0NS02LjE1NjItMC40NzI2NmwtNzMuNDA2IDUzLjUxNnptMjgxLjMxIDI3OC45NGMtMzAuNzgxIDAtNTUuNDEtMjUuMTAyLTU1LjQxLTU1Ljg4M3MyNS4xMDItNTUuODgzIDU1LjQxLTU1Ljg4M2MzMC43ODEgMCA1NS44ODMgMjUuMTAyIDU1Ljg4MyA1NS44ODMtMC40NzY1NiAzMC43ODEtMjUuMTAyIDU1Ljg4My01NS44ODMgNTUuODgzeiIvPgogPC9nPgo8L3N2Zz4K"
                                                width="360px" height="360px" id="preview" class="img-thumbnail">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" style=" background-color: #78909c;color:#FFFFFF"
                                        class="btn">บันทึก</button>
                                </div>
                                </form>
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endsection
