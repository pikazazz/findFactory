@extends('layouts.no-layout')

@section('content')
<div class="fac-page-header" style="background-image: url({{ asset('assets/factories/patrick-hendry-6xeDIZgoPaw-unsplash.jpg') }})">
</div>
<div class="container py-4 detail-page">
    <div class="row">
        <div class="col-md-4 mt-3">
            <ul class="fac-agenda">
                <li class="fac-agenda-item"><a href="#about-factory">เกี่ยวกับโรงงาน</a></li>
                <li class="fac-agenda-item"><a href="#infomation">ประชาสัมพันธ์</a></li>
                <!-- <li class="fac-agenda-item"><a href="#about-product">รายระเอียดผลิตภัณฑ์</a></li> -->
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
                        {{$factory->fac_name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 fac-label">
                        ประกอบกิจการ:
                    </div>
                    <div class="col-md-9">
                        <ul>
                            @foreach (explode(",",$factory->fac_category) as $category)
                            <li>
                                {{$category}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 fac-label">ที่อยู่โรงงาน:</div>
                    <div class="col-md-9">
                        {{$factory->fac_address}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 fac-label">
                        พิกัด UTM :
                    </div>
                    <div class="col-md-9">
                        <div>{{$factory->fac_utm1}} mE</div>
                        <div>{{$factory->fac_utm2}} mN</div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 fac-label">
                        ติดต่อได้ที่:
                    </div>
                    <div class="col-md-9">
                        <div title="tel."> <i class="fas fa-phone"></i> {{$factory->fac_tel}}</div>
                        <div title="fax"><i class="fa-solid fa-print"></i> {{$factory->fac_fax}}</div>
                    </div>
                </div>


            </div>
            <div class="card  my-3 p-4" id="infomation">
                <h4 class="fac-card-title">การประชาสัมพันธ์</h4>
                @foreach ($info as $key=>$item)
                <a class="row" href="{{route('infomation')}}?id={{$item->id}}">
                    <div class="col-md-3 fac-label">
                        {{$item->created_at}}
                    </div>
                    <div class="col-md-9 fac-info-item">{{$item->info_title}}
                    </div>
                </a>
                @endforeach
                <!-- <div class="d-flex justify-content-end">
                        <a href="#">ดูเพิ่มติม <i class="fas fa-arrow-right"></i></a>
                    </div> -->
            </div>
            <!-- <div class="card my-3 p-4" id="about-product">
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
                </div> -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.0/luxon.min.js" integrity="sha512-5OY/m4qoNRTzriZLTMtfojLGcf8oIchTuLWTsLpxR7Iog995oy9DaPdP2x6r1I8kqWa9xzTZVSSwim/XVVAkYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
