@extends('layouts.no-layout')

@section('content')
    <div class="container survay py-5">
        <h2>แบบสำรวจข้อมูลเพิ่มเติมของสถานประกอบการอุตสาหกรรมพลาสติก</h2>
        <div class="card pt-3 px-3 text-danger my-4">
            <span>**คำชี้แจง**</span>
            <ol>
                <li>กรุณากรอกข้อมูลในส่วนที่โรงงานเกี่ยวข้อง หากส่วนใดที่โรงงานไม่มีข้อมูลให้เว้นว่างไว้</li>
                <li>โรงงานใดที่เคยกรอกแบบสอบถามชุดนี้แล้ว กรุณากรอกข้อมูลซ้ำอีกครั้งเพื่อรวบรวมข้อมูลปัจจุบัน</li>
            </ol>
        </div>
        <div>
            <fieldset>
                <legend>
                    ข้อมูลโรงงาน
                </legend>
            </fieldset>
            ชื่อโรงงาน บริษัท มู่ พลาสติก อินดัสตรีส์ จำกัด<br>
            อัตราการผลิต 80 ตัน/เดือน<br>
            จำนวนวันทำงาน...........วันต่อสัปดาห์ หรือ .................. วันต่อปี<br>
        </div>
    </div>
@endsection
