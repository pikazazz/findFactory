@extends('layouts.no-layout')

@section('content')
    <div class="fac-page-header"
        style="background-image: url({{ asset('asset/factories/patrick-hendry-6xeDIZgoPaw-unsplash.jpg') }})">
    </div>
    <div class="container py-4 detail-page">
        <div class="row">
            <div class="col-md-4 mt-3">
                <ul class="fac-agenda">
                    <li class="fac-agenda-item"><a href="#about-factory">เกี่ยวกับโรงงาน</a></li>
                    <li class="fac-agenda-item"><a href="#infomation">ประชาสัมพันธ์</a></li>
                    <li class="fac-agenda-item"><a href="#about-product">รายระเอียดผลิตภัณฑ์</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card fac-card-hover my-3 p-4" id="about-factory">
                    <h4 class="fac-card-title">ชื่อโรงงาน</h4>
                    <div class="row">
                        <div class="col-md-3 fac-label">
                            ทะเบียนโรงงานเลขที่:
                        </div>
                        <div class="col-md-9">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit,
                            ducimus?
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 fac-label">
                            ประกอบกิจการ:
                        </div>
                        <div class="col-md-9">
                            <ul>
                                <li>
                                    โรงงานรีไซเคิล
                                </li>
                                <li>
                                    โรงงานผลิตอุปกรณ์ก่อสร้าง
                                </li>
                                <li>
                                    โรงงานผลิตอุปกรณ์เกษตร
                                </li>
                                <li>
                                    โรงปูน
                                </li>
                                <li>
                                    เปลี่ยนเป็นเชื้อเพลิง
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 fac-label">ที่อยู่โรงงาน:</div>
                        <div class="col-md-9">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi magni magnam iure nisi
                            inventore totam.
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 fac-label">
                            พิกัด UTM :
                        </div>
                        <div class="col-md-9">
                            <div>490993 mE</div>
                            <div>2096901 mN</div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 fac-label">
                            ติดต่อได้ที่:
                        </div>
                        <div class="col-md-9">
                            <div title="tel."> <i class="fas fa-phone"></i> 094-xxxxxxx</div>
                            <div title="fax"><i class="fa-solid fa-print"></i> 094xxxxxxx</div>
                        </div>
                    </div>


                </div>
                <div class="card  my-3 p-4" id="infomation">
                    <h4 class="fac-card-title">การประชาสัมพันธ์</h4>
                    <a class="row" href="#">
                        <div class="col-md-3 fac-label">
                            22/05/2565
                        </div>
                        <div class="col-md-9 fac-info-item">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eligendi, laboriosam?
                        </div>
                    </a>
                    <a class="row" href="#">
                        <div class="col-md-3 fac-label">
                            02/06/2565
                        </div>
                        <div class="col-md-9 fac-info-item">Lorem ipsum dolor sit amet consectetur.</div>
                    </a>
                    <a class="row" href="#">
                        <div class="col-md-3 fac-label">
                            05/06/2565
                        </div>
                        <div class="col-md-9 fac-info-item">Lorem ipsum dolor, sit amet consectetur adipisicing.</div>
                    </a>
                    <a class="row" href="#">
                        <div class="col-md-3 fac-label">
                            06/06/2565
                        </div>
                        <div class="col-md-9 fac-info-item">Lorem ipsum dolor sit amet.</div>
                    </a>
                    <div class="d-flex justify-content-end">
                        <a href="#">ดูเพิ่มติม <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="card my-3 p-4" id="about-product">
                    <h4 class="fac-card-title">รายละเอียดสินค้า</h4>
                    <div class="row">
                        <div class="col-md-3 fac-label">
                            ชื่อผลิตภัณฑ์
                        </div>
                        <div class="col-md-9">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 fac-label">ชื่อเครื่องหมายการค้า</div>
                        <div class="col-md-9">Lorem ipsum dolor sit amet consectetur.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
