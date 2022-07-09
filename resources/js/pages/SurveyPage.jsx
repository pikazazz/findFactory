import React from "react";
import ReactDOM from "react-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import "../../css/app.css";
import "@fortawesome/fontawesome-free/css/all.css";
import ElectrialMachineDetail from "../components/questions/electrical-machine-detail";
import InputGroup from "../components/InputGroup";
import PlastocAdditiveColors from "../components/questions/plastic-additive-colors";
import PlasticRecycle from "../components/questions/plastic-recycle";
import Water from "../components/questions/water";
import WasteWater from "../components/questions/watse-water";
import MakeBenefit from "../components/questions/make-benefit";
import PlasticProcessed from "../components/questions/plastic-processed";
function SurveyPage() {
    return (
        <div className="container survey py-5 bg-white shadow">
            <h2>แบบสำรวจข้อมูลเพิ่มเติมของสถานประกอบการอุตสาหกรรมพลาสติก</h2>
            <div className="card pt-3 px-3 text-danger my-4 survey-text-blod">
                <span>**คำชี้แจง**</span>
                <ol>
                    <li>
                        กรุณากรอกข้อมูลในส่วนที่โรงงานเกี่ยวข้อง
                        หากส่วนใดที่โรงงานไม่มีข้อมูลให้เว้นว่างไว้
                    </li>
                    <li>
                        โรงงานใดที่เคยกรอกแบบสอบถามชุดนี้แล้ว
                        กรุณากรอกข้อมูลซ้ำอีกครั้งเพื่อรวบรวมข้อมูลปัจจุบัน
                    </li>
                </ol>
            </div>
            <form method="POST" action={window.postUrl}>
                <input type="hidden" name="_token" value={window.csrf_token} />
                <fieldset className="border p-2">
                    <legend className="float-none w-auto p-2">
                        ข้อมูลโรงงาน
                    </legend>
                    <div className="px-3">
                        ชื่อโรงงาน บริษัท มู่ พลาสติก อินดัสตรีส์ จำกัด
                        <br />
                        อัตราการผลิต 80 ตัน/เดือน
                        <br />
                        <div className="d-flex align-items-md-center flex-md-row flex-column gap-2">
                            <div className="d-flex align-items-md-center">
                                จำนวนวันทำงาน
                                <InputGroup
                                    className="mx-2"
                                    unit="วันต่อสัปดาห์"
                                    style={{ width: "300px" }}
                                    name="totalDaysPerWeek"
                                    min="0"
                                    max="7"
                                />
                            </div>
                            <div className="d-flex align-items-md-center">
                                หรือ
                                <InputGroup
                                    className="mx-2"
                                    unit="วันต่อปี"
                                    style={{ width: "300px" }}
                                    name="totalDaysPerYear"
                                    min="0"
                                    max="366"
                                />
                            </div>
                            <br />
                        </div>
                    </div>

                    <hr />
                    <ElectrialMachineDetail />
                    <hr />
                    <PlastocAdditiveColors />
                    <hr />
                    <PlasticRecycle />
                    <hr />
                    <Water />
                    <hr />
                    <WasteWater />
                    <hr />
                    <PlasticProcessed />
                    <hr />
                    <MakeBenefit />
                    <div className="d-flex justify-content-end">
                        <button className="btn btn-success">
                            บันทึกข้อมูล
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    );
}

export default SurveyPage;

if (document.getElementById("react-app")) {
    ReactDOM.render(<SurveyPage />, document.getElementById("react-app"));
}
