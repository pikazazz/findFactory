import { Fragment, useState } from "react";
import { machine, manageWater, wash } from "../../data/mock";
import Dropdown from "../dropdown";
import InputGroup from "../InputGroup";
import RowRender from "../row-render";
const Row = ({ index, removeRow }) => {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-4 col-sm-12">
                <Dropdown useOther items={machine} name="waste-value[]" />
            </div>
            <div className="col-md-6 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณ
                    <InputGroup
                        name="waste-quantity[]"
                        unit="ลิตร/เดือน"
                        style={{ width: "350px" }}
                    />
                </div>
            </div>
            <div className="col-md-1 col-sm-12">
                <div className="d-flex justify-content-end">
                    <button
                        className="btn btn-sm btn-danger"
                        onClick={onRemoveRow}
                    >
                        <i className="fas fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    );
};
const RowForWash = ({ index, removeRow }) => {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-2 col-sm-12">
                <Dropdown useOther items={wash} name="waste-forWasteValue[]" />
            </div>
            <div className="col-md-2 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    จำนวน
                    <InputGroup
                        name="waste-forWasteValueQuantity[]"
                        unit="บ่อ"
                        style={{ width: "150px" }}
                    />
                </div>
            </div>
            <div className="col-md-3 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ขนาดบ่อ
                    <InputGroup
                        name="waste-forWasteSize[]"
                        unit="ลูกบาศก์เมตร"
                        style={{ width: "150px" }}
                    />
                </div>
            </div>
            <div className="col-md-3 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณน้ำที่ใช้
                    <InputGroup
                        name="waste-forWasteTotal[]"
                        unit="ลิตร/เดือน"
                        style={{ width: "150px" }}
                    />
                </div>
            </div>
            <div className="col-md-1 col-sm-12">
                <div className="d-flex justify-content-end">
                    <button
                        className="btn btn-sm btn-danger"
                        onClick={onRemoveRow}
                    >
                        <i className="fas fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    );
};
const RowManageWater = ({ index, removeRow }) => {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-6 col-sm-12">
                <Dropdown
                    useOther
                    items={manageWater}
                    name="waste-manageWaterValue[]"
                />
            </div>
            <div className="col-md-1 col-sm-12">
                <div className="d-flex justify-content-end">
                    <button
                        className="btn btn-sm btn-danger"
                        onClick={onRemoveRow}
                    >
                        <i className="fas fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    );
};

const Extended = ({}) => {
    const [useWater, setUseWater] = useState(false);
    const [useForWash, setUseForWash] = useState(false);
    return (
        <div className="mt-2">
            <div className="d-flex align-items-center gap-2">
                <label>น้ำเสียที่เกิดจากกระบวนการผลิต</label>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        id="water-1-water-waste"
                        name="water-waterWaste"
                        onChange={(e) => setUseWater(e.target.value)}
                        checked={useWater === "0"}
                        value="0"
                    />
                    <label htmlFor="water-1-water-waste">ไม่มี</label>
                    <input
                        type="radio"
                        id="water-2-water-waste"
                        name="water-waterWaste"
                        checked={useWater === "1"}
                        value="1"
                        onChange={(e) => setUseWater(e.target.value)}
                    />
                    <label htmlFor="water-2-water-waste">มี</label>
                </div>
                {useWater === "1" && (
                    <Fragment>
                        ปริมาณน้ำที่ใช้รวม
                        <InputGroup
                            unit="ลิตร/เดือน"
                            style={{ width: "300px" }}
                        />
                    </Fragment>
                )}
            </div>
            <div className="d-flex align-items-center gap-2">
                <label>
                    กรณีล้างทำความสะอาดผลิตภัณฑ์
                    น้ำเสียที่เกิดจากกระบวนการล้างผลิตภัณฑ์
                </label>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        id="water-1-for-waste"
                        name="water-forWasteWash"
                        onChange={(e) => setUseForWash(e.target.value)}
                        checked={useForWash === "0"}
                        value="0"
                    />
                    <label htmlFor="water-1-for-waste">ไม่มี</label>
                    <input
                        type="radio"
                        id="water-2-for-waste"
                        name="water-forWasteWash"
                        checked={useForWash === "1"}
                        value="1"
                        onChange={(e) => setUseForWash(e.target.value)}
                    />
                    <label htmlFor="water-2-for-waste">มี</label>
                </div>
                {useForWash === "1" && (
                    <Fragment>
                        ปริมาณ
                        <InputGroup
                            name="water-forWasteWashQuantity"
                            unit="ลิตร/เดือน"
                            style={{ width: "300px" }}
                        />
                    </Fragment>
                )}
            </div>
        </div>
    );
};
export default function WasteWater() {
    const [noSum, setNoSum] = useState("");
    const [washMachine, setWashMachine] = useState(false);
    return (
        <Fragment>
            <RowRender
                renderItem={Row}
                label="ปริมาณการเกิดน้ำเสีย"
                Extended={() => <Extended noSum={noSum} setNoSum={setNoSum} />}
                showButton={noSum}
            />
            <RowRender label="มีกระบวนการล้างแบบใด" renderItem={RowForWash} />
            <div className="d-flex align-items-center gap-2">
                <label htmlFor="to-back-water-waste">
                    น้ำเสียที่เกิดจากกระบวนการล้างทำความสะอาดเครื่องจักร
                    หรือล้างภาชนะ
                </label>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        id="water-1-washMachine"
                        name="waste-washMachine"
                        onChange={(e) => setWashMachine(e.target.value)}
                        checked={washMachine === "0"}
                        value="0"
                    />
                    <label htmlFor="water-1-washMachine">ไม่มี</label>
                    <input
                        type="radio"
                        id="water-2-washMachine"
                        name="waste-washMachine"
                        checked={washMachine === "1"}
                        value="1"
                        onChange={(e) => setWashMachine(e.target.value)}
                    />
                    <label htmlFor="water-2-washMachine">มี</label>
                </div>
                {washMachine === "1" && (
                    <Fragment>
                        ปริมาณน้ำที่ใช้รวม
                        <InputGroup
                            name="waste-total"
                            unit="ลิตร/เดือน"
                            style={{ width: "300px" }}
                        />
                    </Fragment>
                )}
            </div>
            <RowRender
                label="มีการจัดการน้ำเสียที่เกิดขึ้นอย่างไร"
                renderItem={RowManageWater}
            />
        </Fragment>
    );
}
