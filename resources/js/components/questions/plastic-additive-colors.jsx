import { Fragment, useState } from "react";
import { plasticTypes } from "../../data/mock";
import Dropdown from "../dropdown";
import InputGroup from "../InputGroup";
import RowRender from "../row-render";

function Row({ index, removeRow }) {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-4 col-sm-12">
                <Dropdown useOther items={plasticTypes} />
            </div>
            <div className="col-md-3 col-sm-12">
                <div className="d-flex gap-2 align-items-center">
                    <span style={{ width: "100px" }}>จำนวนที่ใช้</span>
                    <InputGroup unit="kg/เดือน" />
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

function Extended() {
    return (
        <div className="d-flex align-items-center gap-2">
            <input type="radio" name="mix-color" id="mix-color-1" />
            <label htmlFor="mix-color-1">ผสม</label>
            <input type="radio" name="mix-color" id="mix-color-2" />
            <label htmlFor="mix-color-2">ไม่ผสม</label>
        </div>
    );
}
function ColorTypeRow({ index, removeRow }) {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-4 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ชนิดของสี
                    <input
                        type="text"
                        className="form-control"
                        style={{ width: "250px" }}
                    />
                </div>
            </div>
            <div className="col-md-6 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณที่ใช้
                    <InputGroup
                        unit="% / การใช้เม็ดพลาสติก 1 kg"
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
}
function AdditiveRow({ index, removeRow }) {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2 align-items-center" key={index}>
            <div className="col-md-5 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ชนิดของสารเติมแต่ง
                    <input
                        type="text"
                        className="form-control"
                        style={{ width: "250px" }}
                    />
                </div>
            </div>
            <div className="col-md-5 col-sm-12">
                <div className="d-flex align-items-center gap-2">
                    ปริมาณที่ใช้
                    <InputGroup
                        unit="% / การใช้เม็ดพลาสติก 1 kg"
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
}
export default function PlastocAdditiveColors() {
    const [useColor, setUseColor] = useState(false);
    const [typeColor, setTypeColor] = useState(false);
    const [additive, setAdditive] = useState(false);
    return (
        <Fragment>
            <RowRender
                renderItem={Row}
                label="การใช้เม็ดพลาสติก สี และสารเติมแต่งในกระบวนการผลิต"
                Extended={Extended}
            />
            <div className="mt-2">
                <span className="underline">การใช้สี </span>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        name="use-color"
                        id="use-color-1"
                        onChange={(e) => setUseColor(e.target.value)}
                        checked={useColor === "1"}
                        value="1"
                    />
                    <label htmlFor="use-color-1">ใช้</label>
                    <input
                        type="radio"
                        name="use-color"
                        id="use-color-2"
                        onChange={(e) => setUseColor(e.target.value)}
                        checked={useColor === "0"}
                        value="0"
                    />
                    <label htmlFor="use-color-2">ไม่ใช้</label>
                </div>
            </div>
            {useColor === "1" && (
                <div className="mt-2">
                    <span className="underline">ชนิดสีที่ใช้</span>
                    <div className="d-flex align-items-center gap-2">
                        <input
                            type="radio"
                            name="type-color"
                            id="type-color-1"
                            value="1"
                            checked={typeColor === "1"}
                            onChange={(e) => {
                                setTypeColor(e.target.value);
                            }}
                        />
                        <label htmlFor="type-color-1">ใช้</label>
                        <input
                            type="radio"
                            name="type-color"
                            id="type-color-2"
                            value="0"
                            checked={typeColor === "0"}
                            onChange={(e) => {
                                setTypeColor(e.target.value);
                            }}
                        />
                        <label htmlFor="type-color-2">ไม่ใช้</label>
                    </div>
                </div>
            )}
            {typeColor === "1" && (
                <RowRender renderItem={ColorTypeRow} label="ชนิดของสี" />
            )}
            <div className="mt-2">
                <span className="underline">การใช้สารเติมแต่ง </span>
                <div className="d-flex align-items-center gap-2">
                    <input
                        type="radio"
                        name="use-additive"
                        id="use-additive-1"
                        onChange={(e) => setAdditive(e.target.value)}
                        checked={additive === "1"}
                        value="1"
                    />
                    <label htmlFor="use-color-1">ใช้</label>
                    <input
                        type="radio"
                        name="use-additive"
                        id="use-additive-2"
                        onChange={(e) => setAdditive(e.target.value)}
                        checked={additive === "0"}
                        value="0"
                    />
                    <label htmlFor="use-color-2">ไม่ใช้</label>
                </div>
            </div>
            {additive === "1" && (
                <RowRender renderItem={AdditiveRow} label="การใช้สารเติมแต่ง" />
            )}
        </Fragment>
    );
}