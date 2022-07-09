import { Fragment } from "react";
import { machine } from "../../data/mock";
import Dropdown from "../dropdown";
import InputGroup from "../InputGroup";
import RowRender from "../row-render";

function Row({ index, removeRow }) {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2  align-items-center" key={index}>
            <div className="col-md-4 col-sm-12">
                <Dropdown
                    useOther
                    items={machine}
                    name="electrical-machine[]"
                />
            </div>
            <div className="col-md-3 col-sm-12">
                <div className="d-flex gap-2 align-items-center">
                    ขนาด
                    <InputGroup unit="KW" name="electrical-size[]" required/>
                </div>
            </div>
            <div className="col-md-3 col-sm-12">
                <div className="d-flex gap-2  align-items-center">
                    จำนวน
                    <InputGroup unit="เครื่อง" name="electrical-quantity[]" required/>
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
}

export default function ElectrialMachineDetail() {
    return (
        <Fragment>
            <RowRender
                label="รายละเอียดเครื่องจักรที่ใช้ และอัตราการใช้ไฟฟ้า"
                renderItem={Row}
            />
            <div className="d-flex gap-2  align-items-center mt-2">
                อัตราการใช้ไฟฟ้า
                <InputGroup
                    unit="บาท/เดือน"
                    style={{ width: "200px" }}
                    name="electrical-rate"
                />
            </div>
        </Fragment>
    );
}
