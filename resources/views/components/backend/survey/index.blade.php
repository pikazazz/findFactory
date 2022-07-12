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
                                        <span class="input-group-text">จำนวนวันทำงาน: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["totalDaysPerWeek"]} วันต่อสัปดาห์ หรือ ${item.data["totalDaysPerYear"]} วันต่อปี" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                            <h6>รายละเอียดเครื่องจักรที่ใช้ และอัตราการใช้ไฟฟ้า   <a data-toggle="collapse" href="#electrical-collapse" role="button" aria-expanded="false" aria-controls="electrical-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse mx-sm-4" id="electrical-collapse">
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
                                                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">อัตราการใช้ไฟฟ้า: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["electrical-rate"]}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">บาทต่อเดือน</span>
                                    </div>
                                </div>        
                                                        </div>
                                                        
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                            <div class="col-md-12 mt-3">
                            <h6>การใช้เม็ดพลาสติก สี และสารเติมแต่งในกระบวนการผลิต   <a data-toggle="collapse" href="#additive-color-collapse" role="button" aria-expanded="false" aria-controls="additive-color-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse mx-sm-4" id="additive-color-collapse">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ชนิดเม็ดพลาสติกที่ใช้: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["plasticAdditive-mixColor"]}" disabled>
                                </div>      
                                <table class="table mt-3">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">รายการพลาสติกที่ใช้</th>
                                                                    <th scope="col" class="text-center">จำนวนที่ใช้ (kg/เดือน)</th>
                                                                </tr>
                                                            </thead>
                                                                <tbody>
                                                                    ${item.data["plasticAdditive-name"].map((v,i)=>(
                                                                    `<tr>
                                                                                                                                    <td>${v}</td>
                                                                                                                                    <td align="center">${item.data["plasticAdditive-quantity"][i]}</td>
                                                                                                                                </tr>`
                                                                    )).join("")}
                                                                </tbody>
                                                            </table>

                                                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">การใช้สี: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["plasticAdditive-useColor"]=='1'?('ใช้ ('+(item.data["plasticAdditive-typeColor"]=='1'?'ชนิดผง':'ชนิดเม็ด')+')'):'ไม่ใช้'}" disabled>
                                </div>  
                                ${
                                    item.data['plasticAdditive-useColor'] == '1'?
                                    `
                                                        <table class="table mt-3">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">ชนิดของสี</th>
                                                                                        <th scope="col" class="text-center">จำนวนที่ใช้ (kg/เดือน)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                    <tbody>
                                                                                        ${item.data["plasticAdditive-colorType"].map((v,i)=>(
                                                                                        `<tr>
                                                                                                                <td>${v}</td>
                                                                                                                <td align="center">${item.data["plasticAdditive-colorTotal"][i]}</td>
                                                                                                            </tr>`
                                                                                        )).join("")}
                                                                                    </tbody>
                                                                                </table>`
                                                            :''
                                }
                                   
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">การใช้สี: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["plasticAdditive-useAdditive"]=='1'?'ใช้':'ไม่ใช้'}" disabled>
                                </div>  
                                ${
                                    item.data['plasticAdditive-useAdditive'] == '1'?
                                    `
                                                        <table class="table mt-3">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">ชนิดของสารเติมแต่ง</th>
                                                                                        <th scope="col" class="text-center">จำนวนที่ใช้ (kg/เดือน)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                    <tbody>
                                                                                        ${item.data["plasticAdditive-additiveType"].map((v,i)=>(
                                                                                        `<tr>
                                                                                                                <td>${v}</td>
                                                                                                                <td align="center">${item.data["plasticAdditive-additiveTotal"][i]}</td>
                                                                                                            </tr>`
                                                                                        )).join("")}
                                                                                    </tbody>
                                                                                </table>`
                                                            :''
                                }
                                </div>              
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-12 mt-3">
                            <h6>ขยะพลาสติกที่เกิดจากกระบวนการผลิต<a data-toggle="collapse" href="#recycle-collapse" role="button" aria-expanded="false" aria-controls="recycle-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse mx-sm-4" id="recycle-collapse">
                                <div class="col-md-12 col-sm-12 mt-2">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">นำกลับเข้าสู่กระบวนการผลิตทั้งหมด: </span>
                                    </div>
                                    <input type="text" class="form-control bg-white" value="${item.data["recycle-backAll"]}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">kg/เดือน</span>
                                    </div>
                                </div>      
                                   
                                </div>
                                <div class="col-md-12 col-sm-12 mt-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">นำกลับเข้าสู่กระบวนการผลิตบางส่วน: </span>
                                        </div>
                                        <input type="text" class="form-control bg-white" value="${item.data["recycle-backSome"]}" disabled>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">kg/เดือน</span>
                                    </div>
                                    </div>      
                                </div>
                                ${
                                    item.data['usenoback'] == '1'?
                                    `
                                                        <table class="table mt-3">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">รายการพลาสติก</th>
                                                                                        <th scope="col" class="text-center">ปริมาณ (kg/เดือน)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                    <tbody>
                                                                                        ${item.data["recycle-backValue"].map((v,i)=>(
                                                                                        `<tr>
                                                                                                                <td>${v}</td>
                                                                                                                <td align="center">${item.data["recycle-notBackQuantity"][i]}</td>
                                                                                                            </tr>`
                                                                                        )).join("")}
                                                                                    </tbody>
                                                                                </table>`
                                                            :''
                                }
                                   
                                </div>              
                                </div>
                            </div>
                            <hr>
                                 <div class="row">
                            <div class="col-md-12 mt-3">
                            <h6>ปริมาณการใช้น้ำ<a data-toggle="collapse" href="#water-collapse" role="button" aria-expanded="false" aria-controls="water-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse mx-sm-4" id="water-collapse">
                                <div class="col-md-12 col-sm-12 mt-2">
                                    ${item.data["water-useWater"] == '1'?`<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">การใช้น้ำในกระบวนการผลิต: </span>
                                        </div>
                                        <input type="text" class="form-control bg-white" value="${item.data["water-useWaterQuantity"]}" disabled>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ลิตร/เดือน</span>
                                        </div></div>`:""}
                                    <span>ระบบหล่อเย็นแบบใช้รวมเครื่องจักรทุกเครื่อง ปริมาณการเติมน้ำในระบบหล่อเย็น</span>
                                    <div class="input-group">
                                    <input type="text" class="form-control bg-white" value="${item.data["recycle-backAll"]}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ลิตร/เดือน</span>
                                    </div>
                                </div>      
                                   
                                </div>
                                ${
                                    item.data['water-noSum'] == '1'?
                                    `
                                                        <table class="table mt-3">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">เครื่องจักร</th>
                                                                                        <th scope="col" class="text-center">ปริมาณ (ลิตร/เดือน)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                    <tbody>
                                                                                        ${item.data["water-valueNoSum"].map((v,i)=>(
                                                                                        `<tr>
                                                                                                                <td>${v}</td>
                                                                                                                <td align="center">${item.data["water-noSumQuantity"][i]}</td>
                                                                                                            </tr>`
                                                                                        )).join("")}
                                                                                    </tbody>
                                                                                </table>`
                                                            :''
                                }
                                   
                                </div>              
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-12 mt-3">
                            <h6>ปริมาณการเกิดน้ำเสีย<a data-toggle="collapse" href="#waste-water-collapse" role="button" aria-expanded="false" aria-controls="waste-water-collapse">
    เรียกดูรายละเอียด
  </a></h6>
                            <div class="collapse mx-sm-4" id="waste-water-collapse">
                                <div class="col-md-12 col-sm-12 mt-2">
                                    ${item.data["water-useWater"] == '1'?`<div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">การใช้น้ำในกระบวนการผลิต: </span>
                                        </div>
                                        <input type="text" class="form-control bg-white" value="${item.data["water-useWaterQuantity"]}" disabled>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ลิตร/เดือน</span>
                                        </div></div>`:""}
                                    <span>ระบบหล่อเย็นแบบใช้รวมเครื่องจักรทุกเครื่อง ปริมาณการเติมน้ำในระบบหล่อเย็น</span>
                                    <div class="input-group">
                                    <input type="text" class="form-control bg-white" value="${item.data["recycle-backAll"]}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ลิตร/เดือน</span>
                                    </div>
                                </div>      
                                   
                                </div>
                                ${
                                    item.data['water-noSum'] == '1'?
                                    `
                                                        <table class="table mt-3">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">เครื่องจักร</th>
                                                                                        <th scope="col" class="text-center">ปริมาณ (ลิตร/เดือน)</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                    <tbody>
                                                                                        ${item.data["water-valueNoSum"].map((v,i)=>(
                                                                                        `<tr>
                                                                                                                <td>${v}</td>
                                                                                                                <td align="center">${item.data["water-noSumQuantity"][i]}</td>
                                                                                                            </tr>`
                                                                                        )).join("")}
                                                                                    </tbody>
                                                                                </table>`
                                                            :''
                                }
                                   
                                </div>              
                                </div>
                            </div>
                            <hr>
                            
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
