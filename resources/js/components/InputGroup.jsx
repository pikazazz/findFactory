export default function InputGroup({
    unit = "",
    name = "",
    style = {},
    min,
    max,
    className,
}) {
    return (
        <div className={`input-group ${className}`} style={style}>
            <input
                type="number"
                defaultValue="0"
                name={name}
                min={min}
                max={max}
                className="form-control"
            />
            <span className="input-group-text" id="basic-addon2">
                {unit}
            </span>
        </div>
    );
}
