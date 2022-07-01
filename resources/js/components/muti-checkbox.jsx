import { Fragment, useId } from "react";

function Checkbox(item, index) {
    return (
        <div className="d-flex gap-2" key={index}>
            <input type="checkbox" id={`checkbox-${index}`} />
            <label htmlFor={`checkbox-${index}`}>{item.label}</label>
        </div>
    );
}
export default function MultiCheckbox({ items }) {
    return (
        <Fragment>
            <div className="d-flex gap-5 px-4">{items.map(Checkbox)}</div>
        </Fragment>
    );
}
