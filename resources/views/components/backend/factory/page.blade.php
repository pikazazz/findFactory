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
                                @if ($type == 'edit')
                                    แก้ไขข้อมูลโรงงาน
                                @else
                                    ข้อมูลโรงงาน
                                @endif

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    @foreach ($factory as $factoryS)
                                        <form action="{{ route('manage-factory.updateFac', $factoryS->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>ชื่อโรงงาน</label>
                                                    <input type="name" name="fac_name"
                                                        value="{{ $factoryS->fac_name }}" class="form-control"
                                                        placeholder="" {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>
                                                <div class="form-group">
                                                    <label>ทะเบียนโรงงานเลขที่</label>
                                                    <input type="name" name="fac_no" value="{{ $factoryS->fac_no }}"
                                                        class="form-control" placeholder=""
                                                        {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>

                                                @if ($type == 'edit')
                                                    <div class="form-group">
                                                        <label>เกี่ยวกับโรงงาน</label>
                                                        <textarea id="summernote" name="fac_des">{!! $factoryS->fac_des !!}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="fac_category" id="fac_category"
                                                            value="{{ $factoryS->fac_category }}">
                                                        <label>ประกอบกิจการ</label>
                                                        <br>
                                                        <input id="fac1" type="checkbox" onclick="setFac()"
                                                            value="โรงงานรีไซเคิล">
                                                        <a class="mt-1" style="color:black;">โรงงานรีไซเคิล</a>
                                                        <input id="fac2" type="checkbox" onclick="setFac()"
                                                            value="โรงงานผลิตอุปกรณ์ก่อสร้าง">
                                                        <a class="mt-1" style="color:black;">โรงงานผลิตอุปกรณ์ก่อสร้าง</a>
                                                        <input id="fac3" type="checkbox" onclick="setFac()"
                                                            value="โรงงานผลิตอุปกรณ์เกษตร">
                                                        <a class="mt-1" style="color:black;">โรงงานผลิตอุปกรณ์เกษตร</a>
                                                        <input id="fac4" type="checkbox" onclick="setFac()"
                                                            value="โรงปูนเปลี่ยนเป็นเชื้อเพลิง">
                                                        <a class="mt-1"
                                                            style="color:black;">โรงปูนเปลี่ยนเป็นเชื้อเพลิง</a>
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label>เกี่ยวกับโรงงาน</label>
                                                        <textarea id="summernote" name="fac_des">
                                                    {!! $factoryS->fac_des !!}
                                                </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ประกอบกิจการ</label>
                                                        {{ $factoryS->fac_category }}
                                                    </div>
                                                @endif


                                                <div class="form-group">
                                                    <label>ที่อยู่โรงงาน</label>
                                                    <input type="name" name="fac_address"
                                                        value="{{ $factoryS->fac_address }}" class="form-control"
                                                        placeholder="" {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>
                                                <div class="form-group">
                                                    <label>พิกัด UTM N</label>
                                                    <input type="name" name="fac_utm1"
                                                        value="{{ $factoryS->fac_utm1 }}" class="form-control"
                                                        placeholder="" {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>
                                                <div class="form-group">
                                                    <label>พิกัด UTM E</label>
                                                    <input type="name" name="fac_utm2"
                                                        value="{{ $factoryS->fac_utm2 }}" class="form-control"
                                                        placeholder="" {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>
                                                <div class="form-group">
                                                    <label>เบอร์โทร</label>
                                                    <input type="name" name="fac_tel" value="{{ $factoryS->fac_tel }}"
                                                        class="form-control" placeholder=""
                                                        {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>
                                                <div class="form-group">
                                                    <label>fax</label>
                                                    <input type="name" name="fac_fax" value="{{ $factoryS->fac_fax }}"
                                                        class="form-control" placeholder=""
                                                        {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                </div>

                                                @if ($type == 'edit')
                                                    <div class="form-group">
                                                        <div id="msg"></div>
                                                        <label for="exampleInputEmail1">อัพโหลดรูปภาพโรงงาน</label>
                                                        <input type="file" name="img[]" class="file" accept="image/*"
                                                            hidden {{ $type === 'edit' ? 'required' : 'readonly' }}>
                                                        <div class="input-group my-3">
                                                            <input type="text" class="form-control" disabled
                                                                placeholder="Upload File" id="file">
                                                            <div class="input-group-append">
                                                                <button type="button"
                                                                    class="browse btn btn-primary">Browse...</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNzUycHQiIGhlaWdodD0iNzUycHQiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDc1MiA3NTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiA8Zz4KICA8cGF0aCBkPSJtNTE5LjAyIDQ1OS44MmMtMS44OTQ1IDEuODk0NS00LjczNDQgMS44OTQ1LTYuNjI4OSAwbC0xNS4xNTYtMTUuMTU2djQ3LjM1OWMwIDIuMzY3Mi0xLjg5NDUgNC43MzQ0LTQuNzM0NCA0LjczNDRzLTQuNzM0NC0yLjM2NzItNC43MzQ0LTQuNzM0NHYtNDcuMzU5bC0xNS4xNTYgMTUuMTU2Yy0wLjk0NTMxIDAuOTQ1MzEtMi4zNjcyIDEuNDIxOS0zLjMxNjQgMS40MjE5LTEuNDIxOSAwLTIuMzY3Mi0wLjQ3MjY2LTMuMzE2NC0xLjQyMTktMS44OTQ1LTEuODk0NS0xLjg5NDUtNC43MzQ0IDAtNi42Mjg5bDIzLjIwNy0yMy4yMDdjMC40NzI2Ni0wLjQ3MjY2IDAuOTQ1MzEtMC45NDUzMSAxLjQyMTktMC45NDUzMSAwLjk0NTMxLTAuNDcyNjYgMi4zNjcyLTAuNDcyNjYgMy43ODkxIDAgMC40NzI2NiAwIDAuOTQ1MzEgMC40NzI2NiAxLjQyMTkgMC45NDUzMWwyMy4yMDcgMjMuMjA3YzEuODkwNiAxLjg5NDUgMS44OTA2IDQuNzM0NC0wLjAwMzkwNiA2LjYyODl6Ii8+CiAgPHBhdGggZD0ibTI4Ni4wMiAzMjAuMTJjLTE2LjU3NCAwLTMwLjMwOS0xMy4yNjItMzAuMzA5LTMwLjMwOSAwLTE2LjU3NCAxMy4yNjItMjkuODM2IDMwLjMwOS0yOS44MzYgMTYuNTc0IDAgMjkuODM2IDEzLjI2MiAyOS44MzYgMjkuODM2IDAgMTcuMDUxLTEzLjI1OCAzMC4zMDktMjkuODM2IDMwLjMwOXoiLz4KICA8cGF0aCBkPSJtNDk3LjI0IDM5Ny43OXYtMTU4LjE4YzAtNy41NzgxLTYuMTU2Mi0xNC4yMDctMTQuMjA3LTE0LjIwN2gtMjY3LjFjLTguMDUwOCAwLTE0LjIwNyA2LjYyODktMTQuMjA3IDE0LjIwN3YyMTMuNTljMCA3LjU3ODEgNi4xNTYyIDE0LjIwNyAxNC4yMDcgMTQuMjA3aDIxMS42OWMyLjM2NzIgMzMuNjI1IDMwLjc4MSA2MC42MTcgNjQuODc5IDYwLjYxNyAzNS45OTIgMCA2NS4zNTUtMjkuMzYzIDY1LjM1NS02NS4zNTUtMC40NzI2Ni0zNC4wOTQtMjYuOTkyLTYyLjUxMi02MC42MTctNjQuODc5em0tMjg2LjA0LTE1OC4xOGMwLTIuMzY3MiAxLjg5NDUtNC43MzQ0IDQuNzM0NC00LjczNDRoMjY3LjFjMi44Mzk4IDAgNC43MzQ0IDIuMzY3MiA0LjczNDQgNC43MzQ0djEzOC43NmwtNjkuMTQxLTYwLjYxN2MtMS44OTQ1LTEuNDIxOS00LjczNDQtMS40MjE5LTYuMTU2MiAwbC04My4zNTIgNzcuNjY4LTM4LjM1OS0zNy44ODdjLTEuNDIxOS0xLjQyMTktNC4yNjE3LTEuODk0NS02LjE1NjItMC40NzI2NmwtNzMuNDA2IDUzLjUxNnptMjgxLjMxIDI3OC45NGMtMzAuNzgxIDAtNTUuNDEtMjUuMTAyLTU1LjQxLTU1Ljg4M3MyNS4xMDItNTUuODgzIDU1LjQxLTU1Ljg4M2MzMC43ODEgMCA1NS44ODMgMjUuMTAyIDU1Ljg4MyA1NS44ODMtMC40NzY1NiAzMC43ODEtMjUuMTAyIDU1Ljg4My01NS44ODMgNTUuODgzeiIvPgogPC9nPgo8L3N2Zz4K"
                                                                width="360px" height="360px" id="preview"
                                                                class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                @else
                                                @endif

                                                <!-- /.card-body -->
                                            </div>
                                            @if ($type == 'edit')
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" style="background-color: #78909c;color:#FFFFFF"
                                                        class="btn">บันทึก</button>
                                                </div>
                                            @else
                                            @endif

                                        </form>
                                    @endforeach
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
    <script>
        var fac_category = document.getElementById("fac_category").value.split(",");
        var checkBox1 = document.getElementById("fac1");
        var checkBox2 = document.getElementById("fac2");
        var checkBox3 = document.getElementById("fac3");
        var checkBox4 = document.getElementById("fac4");
        console.log(fac_category[0]);
        // If the checkbox is checked, display the output text
        if (fac_category[0] == 'โรงปูนเปลี่ยนเป็นเชื้อเพลิง') {
            checkBox4.checked = true;
        } else if (fac_category[1] == 'โรงงานผลิตอุปกรณ์เกษตร') {
            checkBox3.checked = true;
        } else if (fac_category[2] == 'โรงงานผลิตอุปกรณ์ก่อสร้าง') {
            checkBox2.checked = true;
        } else if (fac_category[3] == 'โรงงานรีไซเคิล') {
            checkBox1.checked = true;
        }
    </script>
@endsection
<script>
    function setFac() {
        // Get the checkbox
        var checkBox1 = document.getElementById("fac1");
        var checkBox2 = document.getElementById("fac2");
        var checkBox3 = document.getElementById("fac3");
        var checkBox4 = document.getElementById("fac4");
        // Get the output text
        var fac_category = document.getElementById("fac_category");
        var text = [];
        var i = 0;
        // If the checkbox is checked, display the output text
        if (checkBox1.checked == true) {
            text.push(checkBox1.value);
        } else if (checkBox1.checked == false) {
            fac_category.value = '';
        }
        if (checkBox2.checked == true) {
            text.push(checkBox2.value);
        } else if (checkBox2.checked == false) {
            fac_category.value = '';
        }
        if (checkBox3.checked == true) {
            text.push(checkBox3.value);
        } else if (checkBox3.checked == false) {
            fac_category.value = '';
        }
        if (checkBox4.checked == true) {
            text.push(checkBox4.value);
        } else if (checkBox4.checked == false) {
            fac_category.value = '';
        }
        fac_category.value = text;

        console.log(text);
    }
</script>
