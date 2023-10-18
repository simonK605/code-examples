function filterUnique(arr, key) {
    // Create an empty object to hold the unique objects.
    const uniqueObjects = {};

    // Here we are filtering out duplicates.
    for (let i = 0; i < arr.length; i++) {
        const objectKey = arr[i][key];
        uniqueObjects[objectKey] = arr[i];
    }

    // Convert the uniqueObjects object back to an array and return it.
    return Object.values(uniqueObjects);
}