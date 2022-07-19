@extends('layouts.adminlte')
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
                            กระดานสรุปข้อมูล
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 id="bussiness">150</h3>
                                        <p>บริษัท</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 id="user">150</h3>
                                        <p>ผู้ใช้งาน</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 id="survey">150</h3>
                                        <p>แบบสำรวจ</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./row -->
            </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $.get({
            url: "{{route('dashboard-data')}}",
            dataType: "json",
            success: function(response) {
                $("#survey").text(response.survey.total)
                $("#user").text(response.user.total)
                $("#bussiness").text(response.bussiness.total)
            }
        });
    })
</script>
@endsection