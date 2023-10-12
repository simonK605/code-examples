// Use of object-oriented programming, closures, and asynchronous functions
class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    greet() {
        console.log(`Hello, my name is ${this.name} and I'm ${this.age} years old.`);
    }
}

function createCounter() {
    let count = 0;

    return function() {
        count++;
        console.log(`Count: ${count}`);
    }
}

const counter = createCounter();
counter(); // output: Count: 1
counter(); // output: Count: 2

async function getData() {
    const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
    const data = await response.json();
    console.log(data);
}

const person = new Person('John', 30);
person.greet(); // output: Hello, my name is John and I'm 30 years old.

getData(); // output: { userId: 1, id: 1, title: 'delectus aut autem', completed: false }