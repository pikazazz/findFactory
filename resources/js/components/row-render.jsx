import { Fragment, useState } from "react";

export default function RowRender({
    renderItem: RenderItem,
    label,
    Extended,
    showButton = true,
}) {
    const [row, setRow] = useState([]);
    const addRow = function () {
        setRow((n) => [...n, RenderItem]);
    };

    const removeRow = function (index) {
        setRow((current) => current.filter((_, i) => i != index));
    };

    return (
        <Fragment>
            <h5>
                {label}
                {showButton && (
                    <button
                        type="button"
                        className="btn btn-success btn-sm ms-2"
                        onClick={addRow}
                    >
                        <i className="fas fa-plus"></i>
                    </button>
                )}
            </h5>
            {Extended && <Extended />}
            {row.map((Row, key) => (
                <Fragment key={key}>
                    <Row index={key} removeRow={removeRow} />
                </Fragment>
            ))}
        </Fragment>
    );
}
