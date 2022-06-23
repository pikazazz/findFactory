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
                        <div class="col mt-4">
                            <div class="card" style="width:16rem;">
                                <img class="card-img-top"
                                    src="https://www.infoquest.co.th/wp-content/uploads/2022/05/20220522_Canva_%E0%B8%8A%E0%B8%B1%E0%B8%8A%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4.png"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">ชื่อโรงาน</h5>
                                    <p class="card-text">ข้อมูลคราวๆ</p>


                                    <center>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <a href=""><img
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Launch demo modal
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-xl">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3105.8084190296095!2d-76.99285713465012!3d38.8826248295729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b834fb4029d3%3A0x9270eee67ab54203!2zMTIwMCBQZW5uc3lsdmFuaWEgQXZlLiBTRSwgV2FzaGluZ3RvbiwgREMgMjAwMDMg4Liq4Lir4Lij4Lix4LiQ4Lit4LmA4Lih4Lij4Li04LiB4Liy!5e0!3m2!1sth!2sth!4v1655954309401!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
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
