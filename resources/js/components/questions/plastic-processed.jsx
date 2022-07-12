import { Fragment, useState } from "react";
import { plasticTypes } from "../../data/mock";
import MultiCheckbox from "../muti-checkbox";

export default function PlasticProcessed() {
    const [processed, setProcessed] = useState();
    return (
        <Fragment>
            <h5>
                ขยะพลาสติกประเภทใดที่ไม่ได้นำไปใช้ประโยชน์
                แต่ต้องการนำไปแปรรูปเพื่อเพิ่มมูลค่า
            </h5>
            <div className="d-flex flex-column gap-2">
                <div className="d-flex gap-2 align-items-center">
                    <input
                        type="radio"
                        id="processed-1"
                        name="processsed-processed"
                        value="0"
                        onClick={(e) => setProcessed(e.target.value)}
                        checked={processed === "0"}
                    />
                    <label htmlFor="processed-1">ไม่มี</label>
                </div>
                <div className="d-flex gap-2 align-items-center">
                    <input
                        type="radio"
                        id="processed-2"
                        name="processed-processed"
                        value="1"
                        onClick={(e) => setProcessed(e.target.value)}
                        checked={processed === "1"}
                    />
                    <label htmlFor="processed-2">มี</label>
                </div>
                {processed === "1" && (
                    <MultiCheckbox
                        items={plasticTypes}
                        name="processed-value[]"
                    />
                )}
            </div>
        </Fragment>
    );
}
