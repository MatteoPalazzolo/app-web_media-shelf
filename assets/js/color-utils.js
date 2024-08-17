function rgbToHex(rgbArray) { // ChatGPT
    // Ensure the input is an array of three numbers
    if (rgbArray.length !== 3 || !rgbArray.every(num => num >= 0 && num <= 255)) {
        throw new Error("Invalid RGB array");
    }

    // Convert each RGB value to a hexadecimal string and pad with '0' if necessary
    const hex = rgbArray.map(num => {
        let hexPart = num.toString(16); // Convert to hexadecimal
        return hexPart.length === 1 ? '0' + hexPart : hexPart; // Ensure 2 characters
    }).join(''); // Combine into a single string

    return `#${hex.toUpperCase()}`; // Return the final hex color code with '#'
}

function colorConsoleLog(msg, color) {
    console.log("%c" + msg, "color:" + color + ";font-weight:bold;");
}