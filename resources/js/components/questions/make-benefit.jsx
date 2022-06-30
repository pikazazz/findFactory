import { Fragment, useState } from "react";
import RowRender from "../row-render";

function Row({ index, removeRow }) {
    const onRemoveRow = () => {
        removeRow(index);
    };
    return (
        <div className="row mt-1 gap-2  align-items-center" key={index}>
            <div className="col-md-10 col-sm-12">
                <input
                    type="text"
                    className="form-control"
                    placeholder="โปรดระบุ"
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
}
function Extended({ other, setOther }) {
    return (
        <div className="d-flex flex-column gap-2">
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-1" />
                <label htmlFor="benefit-1">ผสมทำถนน</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-2" />
                <label htmlFor="benefit-2">ทำเฟอร์นิเจอร์</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-3" />
                <label htmlFor="benefit-3">เผาเพื่อเป็นพลังงาน</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-4" />
                <label htmlFor="benefit-4">ขึ้นรูปเป็นไม้เทียม</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-5" />
                <label htmlFor="benefit-5">ขึ้นรูปเป็นแผ่นผนัง</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-6" />
                <label htmlFor="benefit-6">เชื้อเพลงอัดแท่ง</label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input type="checkbox" id="benefit-7" />
                <label htmlFor="benefit-7">
                    ผสมเพื่อผลิตเป็นผลิตภัณฑ์วัสดุก่อสร้าง
                </label>
            </div>
            <div className="d-flex gap-2 align-items-center">
                <input
                    type="checkbox"
                    id="benefit-8"
                    onChange={(e) => setOther(e.target.checked)}
                    checked={other}
                />
                <label htmlFor="benefit-8">อื่นๆ</label>
            </div>
        </div>
    );
}
export default function MakeBenefit() {
    const [other, setOther] = useState(false);
    return (
        <Fragment>
            <RowRender
                label="ความต้องการที่จะนำไปใช้ประโยชน์"
                renderItem={Row}
                Extended={() => <Extended other={other} setOther={setOther} />}
                showButton={other}
            />
        </Fragment>
    );
}
