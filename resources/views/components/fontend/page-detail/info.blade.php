@extends('layouts.no-layout')

@section('content')
<div class="fac-page-header" style="background-image: url({{ $info->img }})">
</div>
<div class="container py-4 detail-page">
    <div class="row">
        <h2 style="font-weight:600;">เรื่อง {{$info->info_title}}</h2>
        <div class="card p-3 overflow-auto">
            {!! $info->info_detail !!}
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.0.0/luxon.min.js" integrity="sha512-5OY/m4qoNRTzriZLTMtfojLGcf8oIchTuLWTsLpxR7Iog995oy9DaPdP2x6r1I8kqWa9xzTZVSSwim/XVVAkYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection