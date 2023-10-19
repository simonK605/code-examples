// Generate a random number within a specified range
const getRandomNumber = (min, max) => {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Remove duplicate values from an array
const removeDuplicateValues = (arr) => {
    return [...new Set(arr)];
}
