// Asynchronous Programming with Async/Await

async function fetchData(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    return await response.json();
}

async function getPosts() {
    try {
        const posts = await fetchData('https://jsonplaceholder.typicode.com/posts');
        console.log('Success!', posts);
    } catch (error) {
        console.log('Error!', error);
    }
}

getPosts();