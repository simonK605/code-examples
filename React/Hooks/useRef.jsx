import React, { useRef } from 'react';

function MyComponent() {
    const inputRef = useRef(null);

    function handleClick() {
        inputRef.current.focus();
    }

    return (
        <div>
            <input type="text" ref={inputRef} />
            <button onClick={handleClick}>Focus input</button>
        </div>
    );
}