@extends('layouts.home')

@section('content')
<!-- <div style="background:#ffffff44;position:fixed;width:100vw;height:100vh;z-index:100;" id="loading"></div> -->
<div class="section content full-height ">
    <div class="section">
        <div class="container ">
            <div class="row">
                <div class="col-6">
                    <label>ค้นหาด้วยชื่อ</label> <br>
                    <div class="input-group">


                        <input type="text" class="form-control" id="input" onkeyup="fillterCategory(this)" style="width: 250px" placeholder="Search">
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
                        <span>ประชาสัมพันธ์ทั้งหมด</span>
                    </h1>
                </div>
                <div class="col-12">
                    <div class="row" id="cardFind">
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.0/luxon.min.js" integrity="sha512-5OY/m4qoNRTzriZLTMtfojLGcf8oIchTuLWTsLpxR7Iog995oy9DaPdP2x6r1I8kqWa9xzTZVSSwim/XVVAkYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        response = []
        loaded = false;
        $(document).ready(function() {
            $.ajax({
                type: 'get',
                url: `/api/findInfomation`,
                data: {
                    text: '',
                }, //Add request data
                dataType: 'json',
                success: (res) => {
                    response = res.result;
                    loaded = true;
                    console.log(res);
                },
                complete: () => {
                    $('#loading').remove()
                    fillterCategory({
                        value: ""
                    });
                }
            })


        });

        function fillterCategory(text, name) {
            let card_text = ""
            if (!loaded) return;
            if (name) {
                $("#input").val("")
            } else {
                $("#select").val("")
            }

            response.filter(i => _.includes(name ? i.fac_category : i.info_title, text.value)).forEach((item) => {
                const {
                    DateTime
                } = luxon;
                const dateTime = DateTime.fromISO(new Date(item.created_at).toISOString())
                card_text += `<div class="col-md-3 mt-2">
                            <div class="card h-100">
                                <div class="image-container"><img src="${item.img}" alt="fac-logo">
                                    <div class="text">${item.fac_name}</div>
                                </div>
                                <div class="card-body">
                                    <h6>${item.info_title}</h6>
                                    ${dateTime.toFormat("วันที่ dd MMMM yyyy")}
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('infomation')}}?id=${item.id}">ดูเพิ่มเติม <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            })
            $('#cardFind').html("");
            $('#cardFind').append(card_text);
            card_text = '';
        }

        function changeMap(data) {
            var map = data.value.split(",");
            onchangeLocation(map[0], map[1], map[2], map[3]);
        }
    </script>