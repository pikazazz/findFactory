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
                    @for ($i = 0; $i < 10; $i++)
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{ $i }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog  modal-lg " role="document">
                                <div class="modal-content " style="width: auto;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">โรงงาน A</h5>
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
                                                        Using color to add meaning only provides a visual indication, which
                                                        will not be conveyed to users of assistive technologies – such as
                                                        screen readers. Ensure that information denoted by the color is
                                                        either obvious from the content itself (e.g. the visible text), or
                                                        is included through alternative means, such as additional text
                                                        hidden with the <code>.sr-only</code> class.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <li>
                                                    ชื่อโรงงาน : โรงงาน A
                                                </li>
                                                <li>
                                                    ทะเบียนโรงงานเลขที่ : AB4878419797
                                                </li>

                                                <li>
                                                    ประกอบกิจการ : โรงงานผลิตอุปกรณ์ก่อสร้าง
                                                </li>
                                                <li>
                                                    โทรศัพท์ : 0884751625
                                                </li>


                                                <br>
                                                <br>

                                                <select class="custom-select">
                                                    <option selected>ตำแหน่งที่ตั้งของท่าน</option>
                                                    <option value="1">โรงงาน A</option>
                                                    <option value="1">โรงงาน B</option>
                                                    <option value="1">โรงงาน C</option>
                                                    <option value="1">โรงงาน D</option>
                                                    <option value="1">โรงงาน E</option>
                                                  </select>
                                                <li>
                                                    ระยะทางทั้งหมด : 180 กิโลเมตร
                                                </li>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 ml-auto">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3105.8084190296095!2d-76.99285713465012!3d38.8826248295729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b834fb4029d3%3A0x9270eee67ab54203!2zMTIwMCBQZW5uc3lsdmFuaWEgQXZlLiBTRSwgV2FzaGluZ3RvbiwgREMgMjAwMDMg4Liq4Lir4Lij4Lix4LiQ4Lit4LmA4Lih4Lij4Li04LiB4Liy!5e0!3m2!1sth!2sth!4v1655954309401!5m2!1sth!2sth"
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
                        <div class="col mt-4 ml-4">
                            <div class="card" style="width:18rem;">
                                <img class="card-img-top"
                                    src="https://image.shutterstock.com/z/stock-photo-cartoon-factory-176642414.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">ชื่อโรงาน</h5>
                                    <p class="card-text">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an

                                    </p>


                                    <center>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <a
                                                href=""><img
                                                    src="{{ asset('asset/about/picture/355980.png') }}" width="20%"
                                                    alt=""></a>
                                                <a data-toggle="modal"
                                                    data-target="#exampleModalCenter{{ $i }}"><img
                                                        src="{{ asset('asset/about/picture/kindpng_1491757.png') }}"
                                                        width="20%" alt=""></a>
                                                <a
                                                    href="http://maps.google.com/?q=1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003"><img
                                                        src="{{ asset('asset/about/picture/355980.png') }}" width="20%"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    @endfor
                </div>

            </div>
        </div>


        {{-- <div class="section mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="switch">
                                <div id="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
    </div>
@endsection
