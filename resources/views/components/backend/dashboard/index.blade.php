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
                            กระดานสรุปข้อมูล ตามประเภท
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <select class="form-control mb-3" id="type">
                                <option value="">ทั้งหมด</option>
                                <option value="โรงงานรีไซเคิล">โรงงานรีไซเคิล</option>
                                <option value="โรงงานผลิตอุปกรณ์ก่อสร้าง">โรงงานผลิตอุปกรณ์ก่อสร้าง</option>
                                <option value="โรงงานผลิตอุปกรณ์เกษตร">โรงงานผลิตอุปกรณ์เกษตร</option>
                                <option value="โรงปูน">โรงปูน</option>
                                <option value="เปลี่ยนเป็นเชื้อเพลิง">เปลี่ยนเป็นเชื้อเพลิง</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 id="factory">150</h3>
                                        <p>บริษัท</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            กระดานสรุปข้อมูล ตามบริษัท
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <select class="form-control mb-3" id="fac1">
                                @foreach ($factories as $item )
                                <option value="{{$item->fac_name}}">{{$item->fac_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 id="fac1-factory">1</h3>
                                        <p>บริษัท</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 id="fac1-user">0</h3>
                                        <p>ผู้ใช้งาน</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 id="fac1-survey">0</h3>
                                        <p>แบบสำรวจ</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <select class="form-control mb-3" id="fac2">
                                @foreach ($factories as $item )
                                <option value="{{$item->fac_name}}">{{$item->fac_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 id="factory">1</h3>
                                        <p>บริษัท</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 id="fac2-user">0</h3>
                                        <p>ผู้ใช้งาน</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 id="fac2-survey">0</h3>
                                        <p>แบบสำรวจ</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    
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
                $("#factory").text(response.factory.total)
            }
        });
        $.get({
            url: `{{route('dashboard-data')}}?name=${$('#fac1').val()}`,
            dataType: "json",
            success: function(response) {
                $("#fac1-survey").text(response.survey.total)
                $("#fac1-user").text(response.user.total)
            }
        });
        $.get({
            url: `{{route('dashboard-data')}}?name=${$('#fac2').val()}`,
            dataType: "json",
            success: function(response) {
                $("#fac2-survey").text(response.survey.total)
                $("#fac2-user").text(response.user.total)
            }
        });
    })
    $('#type').change(function(e){
        $.get({
            url: `{{route('dashboard-data')}}?cat=${e.target.value}`,
            dataType: "json",
            success: function(response) {
                $("#survey").text(response.survey.total)
                $("#user").text(response.user.total)
                $("#factory").text(response.factory.total)
            }
        });
    })
    $('#fac1').change(function(e) {
        $.get({
            url: `{{route('dashboard-data')}}?name=${e.target.value}`,
            dataType: "json",
            success: function(response) {
                $("#fac1-survey").text(response.survey.total)
                $("#fac1-user").text(response.user.total)
            }
        });
    })
    $('#fac2').change(function(e) {
        $.get({
            url: `{{route('dashboard-data')}}?name=${e.target.value}`,
            dataType: "json",
            success: function(response) {
                $("#fac2-survey").text(response.survey.total)
                $("#fac2-user").text(response.user.total)
            }
        });
    })
</script>
@endsection