@extends('layouts.home')

@section('content')
    <div class="section content full-height ">
        <div class="section">
            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            <span>โรงงานของเรา</span>
                        </h1>
                    </div>
                </div>
                <div class="row ">
                    @foreach ($factory as $Factory)
                        <div class="col mt-4 ml-4">
                            <div class="card" style="width:18rem;">
                                <img class="card-img-top"
                                src='{{ asset("$Factory->img") }}' />

                                <div class="card-body">
                                    <h5 class="card-title">{{ $Factory->fac_name }}</h5>
                                    <p class="card-text">
                                       
                                    </p>
                                    <center>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <a target="_blank" href="{{ route('page.index') }}"><img
                                                        src="{{ asset('assets/about/picture/kisspng-international-real-estate-renting-commercial-prope-house-icon-5ad03dcf06a0f5.0353035715235967510272.png') }}"
                                                        width="20%" alt=""></a>
                                                <a data-toggle="modal"
                                                    data-target="#exampleModalCenter{{ $Factory->id }}"><img
                                                        src="{{ asset('assets/about/picture/kindpng_1491757.png') }}"
                                                        width="20%" alt=""></a>
                                                <a target="blank"
                                                    href="https://www.google.com/maps/search/?api=1&query=
                                                    <?= $Factory->fac_lat ?>%2C<?= $Factory->fac_lon ?>"><img
                                                        src="{{ asset('assets/about/picture/355980.png') }}"
                                                        width="20%" alt=""></a>

                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{ $Factory->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog  modal-lg " role="document">
                                <div class="modal-content " style="width: auto;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ $Factory->fac_name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-7" style="border-right: 3px solid;">
                                                <h1>เกี่ยวกับโรงงาน</h1>
                                                <div class="bd-callout bd-callout-warning">
                                                    <p style="text-align: left;">
                                                        - ข้อมูลตัวอย่าง -
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <li>
                                                    ชื่อโรงงาน : {{ $Factory->fac_name }}
                                                </li>
                                                <li>
                                                    ทะเบียนโรงงานเลขที่ : {{ $Factory->fac_no }}
                                                </li>

                                                <li>
                                                    ประกอบกิจการ : {{ $Factory->fac_category }}
                                                </li>
                                                <li>
                                                    โทรศัพท์ : {{ $Factory->fac_tel }}
                                                </li>
                                                <br>
                                                <br>
                                                <select class="custom-select" onchange="changeMap(this)">
                                                    <option selected>ตำแหน่งที่ตั้งของท่าน</option>
                                                    @foreach ($map as $Map)
                                                        <option
                                                            value="{{ print_r($Map['lat']) }},{{ print_r($Map['lon']) }},{{ $Factory->fac_lat }},{{ $Factory->fac_lon }}">
                                                            {{ print_r($Map['name']) }}</option>
                                                    @endforeach
                                                </select>

                                                <li class="inner">
                                                    {{-- <button type="submit" class="btn btn-success"
                                                        onclick="calldistance()">เรียกข้อมูล</button> --}}
                                                    ระยะทางทั้งหมด : โปรดเลือกโรงงานของท่าน
                                                </li>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 ml-auto">
                                                <iframe
                                                    src="https://maps.google.com/maps?q={{ $Factory->fac_lat }},{{ $Factory->fac_lon }}&hl=es;z=14&amp;output=embed"
                                                    width="100%" height="400px" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

<script>
    function changeMap(data) {
        var map = data.value.split(",");
        onchangeLocation(map[0], map[1], map[2], map[3]);
    }

    function onchangeLocation(lat, lon, local_lat, local_lon) {
        //Set id to 0 so you will get all records on page load.
        params = {
            key: "GXVnVpMIXOX(mLaVclrF4eguAh4vKRKXuJXz8uI0V0T8ZggCWsjCt4Gw)(hMBKnxuBfC48mc22gW1eR1uuOa6P0=====2",
            stops: '[{"name":"location_1","lat":' + lat + ',"lon":' + lon +
                ',"timeWindowStart":"","timeWindowEnd":"","serviceTime":""},{"name":"location_2","lat":' +
                local_lat + ',"lon":' + local_lon + ',"timeWindowStart":"","timeWindowEnd":"","serviceTime":""}]'
        }
        $.ajax({
            url: "//api.nostramap.com/Service/V2/Network/Route",
            jsonp: "callback",
            dataType: "jsonp",
            contentType: "application/json",
            data: params,

            success: function(data) {

                $(".inner").html('');
                $(".inner").append("ระยะทางทั้งหมด : " + Math.round(data.results.totalLength / 1000) +
                    " กิโลเมตร");

                Swal.fire(
                    'สำเร็จ',
                    'คํานวณระยะทางสำเร็จ',
                    'success',
                )



            },
            error: function(err) {
                Swal.fire(
                    'Error',
                    'คํานวณระยะทางไม่สำเร็จ',
                    'error',
                )
            }
        });
    }
</script>
