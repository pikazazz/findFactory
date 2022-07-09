import { useState } from "react";

export default function Dropdown({
    items = [],
    useOther = false,
    onChange = function () {},
    value,
    name = "",
}) {
    const [selected, setSelected] = useState(value ?? "1");
    const handleChange = (e) => {
        const { value } = e.target;
        setSelected(value);
        onChange(e);
    };

    const mapItems = items.map((item, index) => (
        <option value={item.value} key={index}>
            {item.label}
        </option>
    ));
    return (
        <div className="d-flex align-items-center gap-2">
            <select
                className="form-control"
                name={name}
                onChange={handleChange}
                value={selected}
            >
                {mapItems}
                {useOther && <option value="">อื่นๆ</option>}
            </select>
            {selected === "" && (
                <input
                    type="text"
                    className="form-control"
                    placeholder="โปรดระบุ"
                    name={`other-${name}`}
                />
            )}
        </div>
    );
}
