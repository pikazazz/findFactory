export default function InputGroup({
    unit = "",
    name = "",
    style = {},
    min,
    max,
    className,
    value = null,
    onChange = function () {},
    required = false,
}) {
    return (
        <div className={`input-group ${className}`} style={style}>
            <input
                type="number"
                defaultValue={value ?? "0"}
                name={name}
                min={min}
                max={max}
                className="form-control"
                required={required}
                onChange={(e) => {
                    onChange(e.target.value);
                }}
            />
            <span className="input-group-text" id="basic-addon2">
                {unit}
            </span>
        </div>
    );
}
