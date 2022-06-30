@extends('layouts.no-layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="react-app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
{{-- @extends('layouts.no-layout')

@section('content')
    <div class="container survey py-5 bg-white shadow">
        <h2>แบบสำรวจข้อมูลเพิ่มเติมของสถานประกอบการอุตสาหกรรมพลาสติก</h2>
        <div class="card pt-3 px-3 text-danger my-4 survey-text-blod">
            <span>**คำชี้แจง**</span>
            <ol>
                <li>กรุณากรอกข้อมูลในส่วนที่โรงงานเกี่ยวข้อง หากส่วนใดที่โรงงานไม่มีข้อมูลให้เว้นว่างไว้</li>
                <li>โรงงานใดที่เคยกรอกแบบสอบถามชุดนี้แล้ว กรุณากรอกข้อมูลซ้ำอีกครั้งเพื่อรวบรวมข้อมูลปัจจุบัน</li>
            </ol>
        </div>
        <div>
            <fieldset class="border p-2">
                <legend>
                    ข้อมูลโรงงาน
                </legend>
                <form>
                    <div class="px-3">
                        ชื่อโรงงาน บริษัท มู่ พลาสติก อินดัสตรีส์ จำกัด<br>
                        อัตราการผลิต 80 ตัน/เดือน<br>
                        <div class="d-flex align-items-center">
                            จำนวนวันทำงาน <input type="number" class="form-control mx-2" style="max-width: 100px" value="0"
                                name="dayPerWeek" min="0" max="7">
                            วันต่อสัปดาห์ หรือ
                            <input type="number" class="form-control mx-2" style="max-width: 100px" name="dayPerYear" value="0"
                                min="0" max="366">
                            วันต่อปี<br>
                        </div>
                    </div>
                    <hr>
                    <h5>
                        รายละเอียดเครื่องจักรที่ใช้ และอัตราการใช้ไฟฟ้า <button type="button"
                            onclick="addElectricalApplianceDetail()" class="btn btn-success btn-sm"><i
                                class="fas fa-plus"></i></button>
                    </h5>
                    <table class="table">
                        <tbody id="electrical-appliance-detail">
                            <tr>
                                <td>
                                    <div class="d-flex gap-1">
                                        <select class="form-control" onchange="checkElectricalOther(this)">
                                            <option value="เครื่องจักรสำหรับโม่">เครื่องจักรสำหรับโม่</option>
                                            <option value="เครื่องจักรสำหรับฉีดขึ้นรูป">เครื่องจักรสำหรับฉีดขึ้นรูป</option>
                                            <option value="เครื่องจักรสำหรับบด">เครื่องจักรสำหรับบด</option>
                                            <option value="เครื่องจักรสำหรับเป่า">เครื่องจักรสำหรับเป่า</option>
                                            <option value="เครื่องจักรสำหรับตัด">เครื่องจักรสำหรับตัด</option>
                                            <option value="เครื่องจักรสำหรับผสม">เครื่องจักรสำหรับผสม</option>
                                            <option value="เครื่องจักรสำหรับล้าง">เครื่องจักรสำหรับล้าง</option>
                                            <option value="เครื่องจักรสำหรับหลอม">เครื่องจักรสำหรับหลอม</option>
                                            <option value="เครื่องจักรสำหรับปั่นแห้ง">เครื่องจักรสำหรับปั่นแห้ง</option>
                                            <option value="เครื่องจักรสำหรับอัดก้อน">เครื่องจักรสำหรับอัดก้อน</option>
                                            <option value="">อื่นๆ</option>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ขนาด
                                        <input type="number" class="form-control" value="0">
                                        KW
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2  align-items-center">จำนวน <input type="number" value="0"
                                            class="form-control"> เครื่อง</div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end"><button class="btn btn-sm btn-danger"
                                            onclick="removeElectricalApplianceDetail(this)"><i
                                                class="fas fa-minus"></i></button></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5>การใช้เม็ดพลาสติก สี และสารเติมแต่งในกระบวนการผลิต <button type="button"
                            onclick="addPlasticBeadsDetail()" class="btn btn-success btn-sm"><i
                                class="fas fa-plus"></i></button> </h5>
                    <table class="table">
                        <div class="d-flex">
                            <span class="survey-label mr-4">ชนิดเม็ดพลาสติกที่ใช้ </span>
                            <div class="d-flex flex-column justify-content-center">
                                <div> <input type="radio" name="plastic-type" id="plastic-type-2" checked> <label
                                        for="plastic-type-2">ไม่ผสม</label></div>
                                <div>
                                    <input type="radio" name="plastic-type" id="plastic-type-1"> <label
                                        for="plastic-type-1">ผสม</label>
                                </div>
                            </div>
                        </div>
                        <tbody id="plastic-beads-detail">
                            <tr>
                                <td>
                                    <div class="d-flex gap-1">
                                        <select class="form-control" onchange="checkPlasticBeadsDetail(this)">
                                            <option value="เครื่องจักรสำหรับโม่">PET</option>
                                            <option value="เครื่องจักรสำหรับโม่">LDPE</option>
                                            <option value="เครื่องจักรสำหรับโม่">PA</option>
                                            <option value="เครื่องจักรสำหรับโม่">PC</option>
                                            <option value="เครื่องจักรสำหรับโม่">HDPE</option>
                                            <option value="เครื่องจักรสำหรับโม่">PS</option>
                                            <option value="เครื่องจักรสำหรับโม่">PVC</option>
                                            <option value="เครื่องจักรสำหรับโม่">ABS</option>
                                            <option value="">อื่นๆ</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ปริมาณที่ใช้
                                        <input type="number" class="form-control" style="max-width: 150px" value="0">
                                        kg/เดือน
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-danger"
                                            onclick="removeElectricalApplianceDetail(this)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <span class="survey-label mr-4">การใช้สี </span>
                            <div class="d-flex flex-column justify-content-center">
                                <div>
                                    <input type="radio" name="use-beads-color" id="use-beads-color-1" checked
                                        onclick="useColors(false)"> <label for="use-beads-color-1">ไม่ใช้</label>
                                </div>
                                <div> <input type="radio" name="use-beads-color" id="use-beads-color-2"
                                        onclick="useColors(true)"> <label for="use-beads-color-2">ใช้</label>
                                </div>
                            </div>
                        </div>
                        <div id="btn-use-colors" hidden>
                            <button type="button" class="btn btn-sm btn-success" onclick="addColors()"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <table class="table" id="useColors">
                    </table>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <span class="survey-label mr-4">การใช้สารเติมแต่ง </span>
                            <div class="d-flex flex-column justify-content-center">
                                <div>
                                    <input type="radio" name="use-additive" id="use-additive-1" checked
                                        onclick="useAdditive(false)"> <label for="use-additive-1">ไม่ใช้</label>
                                </div>
                                <div> <input type="radio" name="use-additive" id="use-additive-2"
                                        onclick="useAdditive(true)"> <label for="use-additive-2">ใช้</label>
                                </div>
                            </div>
                        </div>
                        <div id="btn-additive" hidden>
                            <button type="button" class="btn btn-sm btn-success" onclick="addAdditive()"><i
                                    class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <table class="table" id="additive-detail">

                    </table>
                    <button type="reset" class="btn btn-secondary" onclick="resetForm()">ล้างข้อมูล</button>
                </form>

            </fieldset>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        let electricalApplianceDetail = $("#electrical-appliance-detail");
        let plasticBeadsDetail = $("#plastic-beads-detail");
        let colorsDetail = $('#useColors')
        let additiveDetail = $('#additive-detail')

        function useColors(status) {
            let [elm] = $('#useColors');
            let btn = $('#btn-use-colors');
            if (status) {
                btn.attr('hidden', false)
                if (elm.children.length === 0) {
                    colorsDetail.append(`<div class="d-flex flex-column justify-content-center ml-5">
                                <div class="ml-5">
                                    <input type="radio" name="type-color" id="grain" checked> <label for="grain">ชนิดผง</label>
                                </div>
                                <div class="ml-5"> <input type="radio" name="type-color" id="powder"> <label for="powder">ชนิดเม็ด</label>
                                </div>
                    </div>`)
                    colorsDetail.append(`
                    <tbody id="plastic-beads-detail">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="โปรดระบุ" required>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ปริมาณที่ใช้
                                        <input type="number" class="form-control" style="max-width: 150px"
                                            value="0">
                                            % / การใช้เม็ดพลาสติก 1 kg
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-danger"
                                            onclick="removeElectricalApplianceDetail(this)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>`)
                }

            } else if (!status && elm.children[0]) {
                btn.attr('hidden', true)
                elm.children[0].remove()
            }
        }

        function useAdditive(status) {
            let [elm] = $('#additive-detail');
            let btn = $('#btn-additive');
            if (status && !elm.children[0]) {
                btn.attr('hidden', false)
                if (elm.children.length === 0) {
                    additiveDetail.append(`
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        ชนิดของสารเติมแต่ง
                                        <input type="text" class="form-control" style="max-width: 200px" placeholder="โปรดระบุ" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ปริมาณที่ใช้
                                        <input type="number" class="form-control" style="max-width: 150px"
                                            value="0">
                                        % / การใช้เม็ดพลาสติก 1 kg
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-danger" onclick="removeAdditive(this)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    `)
                }

            } else if (!status && elm.children[0]) {
                btn.attr('hidden', true)
                elm.children[0].remove()
            }
        }

        function removeElectricalApplianceDetail(event) {
            $(event).parent().parent().parent().remove()
        }

        function removePlasticBeadsDetail(event) {
            $(event).parent().parent().parent().remove()
        }

        function removeColors(event) {
            $(event).parent().parent().parent().remove()
        }

        function removeAdditive(event) {
            $(event).parent().parent().parent().remove()
        }

        function addAdditive() {
            let additiveElm = `<tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        ชนิดของสารเติมแต่ง
                                        <input type="text" class="form-control" style="max-width: 200px" placeholder="โปรดระบุ" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ปริมาณที่ใช้
                                        <input type="number" class="form-control" style="max-width: 150px"
                                            value="0">
                                        % / การใช้เม็ดพลาสติก 1 kg
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-danger" onclick="removeAdditive(this)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </td>

                            </tr>`;
            additiveDetail.append(additiveElm)
        }

        function addColors() {
            let colorsElm = `<tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="โปรดระบุ" required>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        ปริมาณที่ใช้
                                        <input type="number" class="form-control" style="max-width: 150px"
                                            value="0">
                                        % / การใช้เม็ดพลาสติก 1 kg
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-danger"
                                            onclick="removeColors(this)"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </td>

                            </tr>`;
            colorsDetail.append(colorsElm)
        }

        function addPlasticBeadsDetail() {
            let plasticBeadsDetailElm = `<tr>
                            <td>
                                <div class="d-flex gap-1">
                                    <select class="form-control" onchange="checkPlasticBeadsDetail(this)">
                                        <option value="เครื่องจักรสำหรับโม่">เครื่องจักรสำหรับโม่</option>
                                        <option value="เครื่องจักรสำหรับฉีดขึ้นรูป">เครื่องจักรสำหรับฉีดขึ้นรูป</option>
                                        <option value="เครื่องจักรสำหรับบด">เครื่องจักรสำหรับบด</option>
                                        <option value="เครื่องจักรสำหรับเป่า">เครื่องจักรสำหรับเป่า</option>
                                        <option value="เครื่องจักรสำหรับตัด">เครื่องจักรสำหรับตัด</option>
                                        <option value="เครื่องจักรสำหรับผสม">เครื่องจักรสำหรับผสม</option>
                                        <option value="เครื่องจักรสำหรับล้าง">เครื่องจักรสำหรับล้าง</option>
                                        <option value="เครื่องจักรสำหรับหลอม">เครื่องจักรสำหรับหลอม</option>
                                        <option value="เครื่องจักรสำหรับปั่นแห้ง">เครื่องจักรสำหรับปั่นแห้ง</option>
                                        <option value="เครื่องจักรสำหรับอัดก้อน">เครื่องจักรสำหรับอัดก้อน</option>
                                        <option value="">อื่นๆ</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    ปริมาณที่ใช้
                                    <input type="number" class="form-control" style="max-width: 150px" value="0">
                                    kg/เดือน
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-danger" onclick="removePlasticBeadsDetail(this)"><i
                                            class="fas fa-minus"></i></button>
                                </div>
                            </td>

                        </tr>`;
            plasticBeadsDetail.append(plasticBeadsDetailElm)
        }

        function addElectricalApplianceDetail() {
            let appendElectricalApplianceElm = `<tr>
                            <td>
                                <div class="d-flex gap-1">
                                    <select class="form-control" onchange="checkElectricalOther(this)">
                                        <option value="เครื่องจักรสำหรับโม่">เครื่องจักรสำหรับโม่</option>
                                        <option value="เครื่องจักรสำหรับฉีดขึ้นรูป">เครื่องจักรสำหรับฉีดขึ้นรูป</option>
                                        <option value="เครื่องจักรสำหรับบด">เครื่องจักรสำหรับบด</option>
                                        <option value="เครื่องจักรสำหรับเป่า">เครื่องจักรสำหรับเป่า</option>
                                        <option value="เครื่องจักรสำหรับตัด">เครื่องจักรสำหรับตัด</option>
                                        <option value="เครื่องจักรสำหรับผสม">เครื่องจักรสำหรับผสม</option>
                                        <option value="เครื่องจักรสำหรับล้าง">เครื่องจักรสำหรับล้าง</option>
                                        <option value="เครื่องจักรสำหรับหลอม">เครื่องจักรสำหรับหลอม</option>
                                        <option value="เครื่องจักรสำหรับปั่นแห้ง">เครื่องจักรสำหรับปั่นแห้ง</option>
                                        <option value="เครื่องจักรสำหรับอัดก้อน">เครื่องจักรสำหรับอัดก้อน</option>
                                        <option value="">อื่นๆ</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    ขนาด
                                    <input type="number" class="form-control"  value="0">
                                    KW
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2  align-items-center">จำนวน <input type="number" value="0"
                                        class="form-control"> เครื่อง</div>
                            </td>
                            <td>        <div class="d-flex justify-content-end"><button class="btn btn-sm btn-danger" onclick="removeElectricalApplianceDetail(this)"><i
                                        class="fas fa-minus"></i></button></div></td>
                        </tr>`;
            electricalApplianceDetail.append(appendElectricalApplianceElm)
        }

        function checkElectricalOther(event) {
            let elmParent = $(event).parent();
            let elm = elmParent.find("[data-target='electrical-other']")
            let value = $(event).val();
            if (elm.length > 0 && value !== '') {
                elm.remove()
            } else if (value === '') {
                elmParent.append(`<input type="text" class="form-control" placeholder="โปรดระบุ"
                                        data-target="electrical-other">`)
            }
        }

        function checkPlasticBeadsDetail(event) {
            let elmParent = $(event).parent();
            let elm = elmParent.find("[data-target='plastic-beads-other']")
            let value = $(event).val();
            if (elm.length > 0 && value !== '') {
                elm.remove()
            } else if (value === '') {
                elmParent.append(`<input type="text" class="form-control" placeholder="โปรดระบุ"
                                        data-target="plastic-beads-other">`)
            }
        }

        function resetForm() {
            window.location.reload();
        }
    </script>
@endsection --}}
