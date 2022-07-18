@extends('layouts.no-layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แบบสำรวจข้อมูลเพิ่มเติมของสถานประกอบการอุตสาหกรรมพลาสติก</title>
</head>

<body>
    <div id="react-app"></div>
    <script>
        window.postUrl = "{{ route('survey.store') }}"
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('/resources/js/app.js') }}"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (\Session::has('message'))
            <script>
                Swal.fire(
                    'สำเร็จ',
                    '{!! \Session::get('message') !!}',
                    '{!! \Session::get('message-status') !!}',
                )
            </script>
        @endif
</body>

</html>
