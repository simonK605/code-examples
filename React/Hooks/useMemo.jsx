import React, { useState } from 'react';

// Regular functional component
const MyComponent = ({ name, age }) => {
    console.log('Rendering MyComponent');
    return (
        <div>
            <h1>Name: {name}</h1>
            <h2>Age: {age}</h2>
        </div>
    );
};

// Memoized version of MyComponent using React.memo
const MemoizedComponent = React.memo(MyComponent);

const App = () => {
    const [age, setAge] = useState(20);

    const handleClick = () => {
        setAge(age + 1);
    };

    return (
        <div>
            <button onClick={handleClick}>Increase Age</button>
            <MemoizedComponent name="John" age={age} />
        </div>
    );
};

export default App;