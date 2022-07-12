@extends('layouts.adminlte')
{{-- setting title-web --}}
@section('backend-header', 'จัดการข้อมูลแบบสำรวจ')
@section('backend-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                จัดการข้อมูลแบบสำรวจ
                            </h3>
                        </div>
                        <div id="modal-list"></div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>วันที่บันทึก</th>
                                                <th>เมนู</th>
                                            </tr>
                                        </thead>
                                        <tbody id="survey-table">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->
    </section>

    <script type="text/javascript">
        const data = [];
        @foreach ($surveyList as $survey)
            data.push({
                id: Number(`{{ $survey->id }}`),
                data: JSON.parse(`{{ $survey->data }}`.replace(/(&quot\;)/g, "\"")),
                created_at: new Date(`{{ $survey->created_at }}`)

            });
        @endforeach
    </script>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.0/luxon.min.js"
        integrity="sha512-5OY/m4qoNRTzriZLTMtfojLGcf8oIchTuLWTsLpxR7Iog995oy9DaPdP2x6r1I8kqWa9xzTZVSSwim/XVVAkYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        const table = $("#survey-table");
        const modal = $('#modal-list')
        const {
            DateTime
        } = luxon;
        data.forEach((item, idx) => {
            const dateTime = new DateTime(item.created_at)
            modal.append(`
            <div class="modal fade" id="survey-${idx}" tabindex="-1" aria-labelledby="survey-${idx}-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="survey-${idx}-label">${dateTime.setLocale('th').toFormat("วันที่ dd MMMM yyyy (เวลา HH:mm:ss)")}</h5>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">จำนวนวันทำงาน: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["totalDaysPerWeek"]} วันต่อสัปดาห์ ${item.data["totalDaysPerYear"]} วันต่อปี" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h6>รายละเอียดเครื่องจักรที่ใช้ และอัตราการใช้ไฟฟ้า   <a data-toggle="collapse" href="#electrical-collapse" role="button" aria-expanded="false" aria-controls="electrical-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse" id="electrical-collapse">
                                <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">รายการ</th>
                                                                    <th scope="col" class="text-center">ขนาด (KW)</th>
                                                                    <th scope="col" class="text-center">จำนวน (เครื่อง)</th>
                                                                </tr>
                                                            </thead>
                                                                <tbody>
                                                                    ${item.data["electrical-machine"].map((v,i)=>(
                                                                    `<tr>
                                                                                                <td>${v}</td>
                                                                                                <td align="center">${item.data["electrical-size"][i]}</td>
                                                                                                <td align="center">${item.data["electrical-quantity"][i]}</td>
                                                                                            </tr>`
                                                                    )).join("")}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                </div>
                            <hr/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
            `);
            table.append(`
                <tr>
                    <td>${idx+1}</td>
                        <td>${dateTime.setLocale('th').toFormat("วันที่ dd MMMM yyyy (เวลา HH:mm:ss)")}</td>
                         <td><button type="submit" class="btn btn-primary" style="color: #FFFFFF" data-bs-toggle="modal" data-bs-target="#survey-${idx}"><i class="fa-solid fa-eye"></i></button>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>`)
        })
    </script>
@endsection
