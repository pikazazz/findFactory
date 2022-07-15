import { Fragment, useCallback, useState } from "react";
import { plasticTypes } from "../../data/mock";
import Dropdown from "../dropdown";
import InputGroup from "../InputGroup";
import RowRender from "../row-render";
import { debounce } from "lodash";
const Row = ({ index, removeRow }) => {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-4 col-sm-12">
                <Dropdown
                    useOther
                    items={plasticTypes}
                    name="recycle-backValue[]"
                />
            </div>
            <div className="col-md-6 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณ
                    <InputGroup
                        name="recycle-notBackQuantity[]"
                        unit="kg/เดือน"
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

const Extended = ({ toNo, setToNo, state1, state2, setState1, setState2 }) => {
    return (
        <div className="mt-2">
            <div className="d-flex align-items-center gap-2">
                <label>นำกลับเข้าสู่กระบวนการผลิตทั้งหมด</label>
                ปริมาณ
                <InputGroup
                    name="recycle-backAll"
                    unit="kg/เดือน"
                    value={state1}
                    onChange={setState1}
                    style={{ width: "300px" }}
                />
            </div>
            <div className="d-flex align-items-center gap-2 mt-2">
                <label>นำกลับเข้าสู่กระบวนการผลิตบางส่วน</label>
                ปริมาณ
                <InputGroup
                    name="recycle-backSome"
                    unit="kg/เดือน"
                    value={state2}
                    onChange={setState2}
                    style={{ width: "300px" }}
                />
            </div>
            <div className="d-flex align-items-center gap-2 mt-2">
                <input
                    type="checkbox"
                    name="usenoback"
                    id="to-no"
                    checked={toNo}
                    onChange={(e) => setToNo(e.target.checked)}
                    value="1"
                />
                <label htmlFor="to-no">ไม่ได้นำกลับเข้าสู่กระบวนการผลิต</label>
            </div>
        </div>
    );
};
export default function PlasticRecycle() {
    const [toNo, setToNo] = useState("");
    const [state1, setState1] = useState("0");
    const [state2, setState2] = useState("0");
    const handleDebounceFn = (e, fn) => {
        fn(e);
    };
    const debounceFn = useCallback(debounce(handleDebounceFn, 1000), []);
    return (
        <Fragment>
            <RowRender
                renderItem={Row}
                label="ขยะพลาสติกที่เกิดจากกระบวนการผลิต"
                Extended={() => (
                    <Extended
                        toNo={toNo}
                        setToNo={setToNo}
                        state1={state1}
                        state2={state2}
                        setState1={(e) =>
                            debounceFn(e, (v) => {
                                setState1(v);
                            })
                        }
                        setState2={(e) =>
                            debounceFn(e, (v) => {
                                setState2(v);
                            })
                        }
                    />
                )}
                showButton={toNo}
            />
        </Fragment>
    );
}
