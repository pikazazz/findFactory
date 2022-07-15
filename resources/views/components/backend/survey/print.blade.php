<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=210mm">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Survey</title>
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

    @page {
        size: 210mm 297mm;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;

        }
    }

    @media print and (color) {
        * {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }

    body {
        font-weight: 200;
        padding: 1.27cm;
    }

    * {
        font-family: 'Sarabun', sans-serif;
        font-size: 14px;
    }

    .title {
        display: block;
        font-style: italic;
        text-align: center;
        background: #ddd !important;
        border: 1px solid #000;
        padding: 10px 0px;
    }

    .statement {
        text-align: center;
        display: block;
        margin-top: 40px;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .page {
        padding: 1.27cm;
        page-break-after: always;
    }

    label {
        text-decoration: underline;
        font-weight: 300;
    }
</style>

<body>
    <div class="page">
        <span class="title">แบบสำรวจข้อมูลเพิ่มเติมของสถานประกอบการอุตสาหกรรมพลาสติก</span>
        <span class="statement">คำชี้แจง</span>
        <div>
            <ol>
                <li>
                    กรุณากรอกข้อมูลในส่วนที่โรงงานเกี่ยวข้อง หากส่วนใดที่โรงงานไม่มีข้อมูลให้เว้นว่างไว้
                </li>
                <li>โรงงานใดที่เคยกรอกแบบสอบถามชุดนี้แล้ว กรุณากรอกข้อมูลซ้ำอีกครั้งเพื่อรวบรวมข้อมูลปัจจุบัน</li>
            </ol>
        </div>
    </div>
    <div class="page">
        <label>1. รายละเอียดโรงงาน</label>
        <div>ชื่อโรงงาน บริษัท มู่ พลาสติก อินดัสตรีส์ จำกัด
            อัตราการผลิต 80 ตัน/เดือน
            จำนวนวันทำงาน...........วันต่อสัปดาห์ หรือ .................. วันต่อปี</div>

    </div>
</body>

</html>
