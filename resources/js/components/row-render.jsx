import { Fragment, useState } from "react";

export default function RowRender({
    renderItem: RenderItem,
    label,
    Extended,
    showButton = true,
}) {
    const [indexes, setIndexes] = useState([]);
    const [current, setCurrent] = useState(0);

    const addRow = function () {
        setIndexes((prevIndexes) => [...prevIndexes, current]);
        setCurrent((prevCounter) => prevCounter + 1);
    };

    const removeRow = function (index) {
        setIndexes((prevIndexes) => [
            ...prevIndexes.filter((item) => item !== index),
        ]);
        setCurrent((prevCounter) => prevCounter - 1);
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
            {indexes.map((index) => (
                <Fragment key={index}>
                    <RenderItem
                        index={index}
                        removeRow={() => removeRow(index)}
                    />
                </Fragment>
            ))}
        </Fragment>
    );
}
