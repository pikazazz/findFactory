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
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="survey-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>วันที่บันทึก</th>
                                                <th>เมนู</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Internet
                                                    Explorer 4.0
                                                </td>

                                                <td>
                                                    <button type="submit" class="btn btn-primary" style="color: #FFFFFF">
                                                        <i class="fa-solid fa-eye"></i></button>
                                                    <button type="submit" class="btn btn-warning" style="color: #FFFFFF">
                                                        <i class="fa-solid fa-pencil"></i></button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Internet
                                                    Explorer 5.0
                                                </td>

                                                <td>
                                                    <button type="submit" class="btn btn-primary" style="color: #FFFFFF">
                                                        <i class="fa-solid fa-eye"></i></button>
                                                    <button type="submit" class="btn btn-warning" style="color: #FFFFFF">
                                                        <i class="fa-solid fa-pencil"></i></button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            </tfoot>
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

    <script>
        const data = [];
        @foreach ($surveyList as $survey)
            data.push({
                id: Number(`{{ $survey->id }}`),
                data: JSON.parse(`{{ $survey->data }}`.replace(/(&quot\;)/g, "\"")),
                created_at:new Date(`{{$survey->created_at}}`)
                
            });
        @endforeach
        console.log(data)
        
    </script>
@endsection

@section('')
