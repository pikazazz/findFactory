import { Fragment, useId } from "react";

function Checkbox({ item, index, name }) {
    return (
        <div className="d-flex gap-2" key={index}>
            <input
                type="checkbox"
                id={`checkbox-${index}-${item.label}`}
                name={name}
                value={item.label}
            />
            <label htmlFor={`checkbox-${index}-${item.label}`}>{item.label}</label>
        </div>
    );
}
export default function MultiCheckbox({ items, name = "" }) {
    return (
        <Fragment>
            <div className="d-flex gap-5 px-4">
                {items.map((item, id) => (
                    <Checkbox item={item} name={name} index={id} />
                ))}
            </div>
        </Fragment>
    );
}
