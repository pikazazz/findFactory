@extends('layouts.home')

@section('content')
    <div class="section content full-height ">
        <div class="section">
            <div class="container ">
                <div class="row">

                    <div class="col-6">
                        <label>ค้นหาด้วยชื่อ</label> <br>
                        <div class="input-group">


                            <input type="text" class="form-control" id="input" onkeyup="fillterCategory(this)" style="width: 250px"
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>หมวดหมู่โรงงาน</label> <br>
                        <select class="custom-select" onchange="fillterCategory(this,'select')" id="select">
                            <option selected value="">ประเภทโรงงาน</option>
                            <option value="โรงปูนเปลี่ยนเป็นเชื้อเพลิง">โรงปูนเปลี่ยนเป็นเชื้อเพลิง</option>
                            <option value="โรงงานผลิตอุปกรณ์เกษตร">โรงงานผลิตอุปกรณ์เกษตร</option>
                            <option value="โรงงานผลิตอุปกรณ์ก่อสร้าง">โรงงานผลิตอุปกรณ์ก่อสร้าง</option>
                            <option value="โรงงานรีไซเคิล">โรงงานรีไซเคิล</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 mt-4">
                        <h1>
                            <span>โรงงานของเรา</span>
                        </h1>
                    </div>
                    <div class="row align-items-stretch" id="cardFind">
                    </div>

                </div>
            </div>
        </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>


        response = []

        $(document).ready(function() {
            $("#input").val("{{$keyword}}")
            $.ajax({
                type: 'get',
                url: `/api/fillterFactory`,
                data: {
                    text: '',
                }, //Add request data
                dataType: 'json',
                success: (res) => {
                    response = res;

                },
                complete:()=>{
                    fillterCategory({value:"{{$keyword}}"});
                }
            })

        });

        function fillterCategory(text,name) {
            if(name){
                $("#input").val("")
            }else{
                $("#select").val("")
            }
                let card_text = ''
                response.factory.filter(i => _.includes(name?i.fac_category:i.fac_name, text.value)).forEach((item) => {
                    card_text += `<div class="col-12 col-sm-4 mt-4">
                            <div class="d-flex justify-content-center">
                            <div class="card" style="max-width:20rem">
                                <img class="card-img-top" src='${item.img}' />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <span> ${ item.fac_name }</span>
                                    </h5>
                                    <p class="card-text">
                                    </p>
                                    <center>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <a target="_blank" href="{{ route('page.index') }}"><img
                                                        src="{{ asset('assets/about/picture/kisspng-international-real-estate-renting-commercial-prope-house-icon-5ad03dcf06a0f5.0353035715235967510272.png') }}"
                                                        width="18%" alt=""></a>
                                                <a data-toggle="modal"
                                                    data-target="#exampleModalCenter${ item.id }"><img
                                                        src="{{ asset('assets/about/picture/kindpng_1491757.png') }}"
                                                        width="20%" alt=""></a>
                                                <a target="blank"
                                                    href="https://www.google.com/maps/search/?api=1&query=
                                                    ${ item.fac_lat}%2C${ item.fac_lon}"><img
                                                        src="{{ asset('assets/about/picture/355980.png') }}" width="20%"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter${item.id}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog  modal-lg " role="document">
                                <div class="modal-content " style="width: auto;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">${ item.fac_name }
                                        </h5>
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
                                                        ${ item.fac_des }
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <li>
                                                    ชื่อโรงงาน : ${ item.fac_name }
                                                </li>
                                                <li>
                                                    ทะเบียนโรงงานเลขที่ : ${ item.fac_no }
                                                </li>

                                                <li>
                                                    ประกอบกิจการ : ${ item.fac_category }
                                                </li>
                                                <li>
                                                    โทรศัพท์ : ${ item.fac_tel }
                                                </li>
                                                <br>
                                                <br>   <select class="custom-select" onchange="changeMap(this)">
                                                    <option selected>ตำแหน่งที่ตั้งของท่าน</option>`;

                    response.map.forEach((item2) => {
                        console.log(item2);
                        card_text += `
                                                        <option
                                                         value="${item2.fac_lat},${item2.fac_lon},${ item.fac_lat },${ item.fac_lon }">
                                                            ${item2.fac_name}</option>
                                    `
                    })
                    card_text += `
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
                                                    src="https://maps.google.com/maps?q=${ item.fac_lat },${ item.fac_lon }&hl=es;z=14&amp;output=embed"
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
                                                        `;
                })
                $('#cardFind').html("");
                $('#cardFind').append(card_text);
                card_text = '';
        }

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
                    local_lat + ',"lon":' + local_lon +
                    ',"timeWindowStart":"","timeWindowEnd":"","serviceTime":""}]'
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
