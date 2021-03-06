import { Fragment, useState } from "react";
import { machine } from "../../data/mock";
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
                <Dropdown useOther items={machine} name="water-valueNoSum[]"/>
            </div>
            <div className="col-md-6 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณ
                    <InputGroup name="water-noSumQuantity[]" unit="ลิตร/เดือน" style={{ width: "350px" }} />
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

const Extended = ({ noSum, setNoSum }) => {
    const [useWater, setUseWater] = useState("0");
    return (
        <div className="mt-2">
            <div className="d-flex align-items-center gap-2">
                <label htmlFor="water-processed">
                    การใช้น้ำในกระบวนการผลิต
                </label>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        id="water-1"
                        name="water-useWater"
                        onChange={(e) => setUseWater(e.target.value)}
                        checked={useWater === "0"}
                        value="0"
                    />
                    <label htmlFor="water-1">ไม่มี</label>
                    <input
                        type="radio"
                        id="water-2"
                        name="water-useWater"
                        checked={useWater === "1"}
                        value="1"
                        onChange={(e) => setUseWater(e.target.value)}
                    />
                    <label htmlFor="water-2">มี</label>
                </div>
                {useWater === "1" && (
                    <Fragment>
                        ปริมาณ
                        <InputGroup
                            name="water-useWaterQuantity"
                            unit="ลิตร/เดือน"
                            style={{ width: "300px" }}
                        />
                    </Fragment>
                )}
            </div>
            <div className="d-flex align-items-center gap-2 mt-2">
                <label>
                    ระบบหล่อเย็นแบบใช้รวมเครื่องจักรทุกเครื่อง
                    ปริมาณการเติมน้ำในระบบหล่อเย็น
                </label>
                ปริมาณ
                <InputGroup
                    name="water-machine"
                    unit="ลิตร/เดือน"
                    style={{ width: "300px" }}
                />
            </div>
            <div className="d-flex align-items-center gap-2 mt-2">
                <input
                    type="checkbox"
                    id="no-sum"
                    name="water-noSum"
                    checked={noSum}
                    onChange={(e) => setNoSum(e.target.checked)}
                    value="1"
                />
                <label htmlFor="no-sum">แบบไม่รวม</label>
            </div>
        </div>
    );
};
export default function Water() {
    const [noSum, setNoSum] = useState("");
    return (
        <Fragment>
            <RowRender
                renderItem={Row}
                label="ปริมาณการใช้น้ำ"
                Extended={() => <Extended noSum={noSum} setNoSum={setNoSum} />}
                showButton={noSum}
            />
        </Fragment>
    );
}
