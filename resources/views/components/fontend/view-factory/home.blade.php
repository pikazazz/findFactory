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
                        <div class="col-3 mt-4">
                            <div class="card" style="width: auto;">
                                <img class="card-img-top"
                                    src="https://www.infoquest.co.th/wp-content/uploads/2022/05/20220522_Canva_%E0%B8%8A%E0%B8%B1%E0%B8%8A%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4.png"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk
                                        of the card's content.</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal{{ $i }}">
                                        Launch demo modal
                                    </button>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
