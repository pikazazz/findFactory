@extends('layouts.adminlte')
{{-- setting title-web --}}


@section('backend-header')
    จัดการข้อมูลโรงงาน
@endsection

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('backend-header-content')
    @if (\Session::has('message'))
        <script>
            Swal.fire(
                'สำเร็จ',
                '{!! \Session::get('message') !!}',
                '{!! \Session::get('message-status') !!}',
            )
        </script>
    @endif
@endsection


@section('backend-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                @if ($type == 'edit')
                                    แก้ไขข้อมูลโรงงาน
                                @else
                                    ข้อมูลโรงงาน
                                @endif

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- Form --}}
                                </div>
                            </div>



                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.col -->
            </div>


            <!-- ./row -->
        </div><!-- /.container-fluid -->
    </section>

    <script>
    </script>
@endsection

