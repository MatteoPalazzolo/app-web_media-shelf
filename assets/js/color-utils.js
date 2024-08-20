function rgbToHex(rgbArray) {
    if (rgbArray.length !== 3 || !rgbArray.every(num => num >= 0 && num <= 255))
        console.error("ERROR: Invalid RGB array.");

    const hex = rgbArray.map(num => {
        let hexPart = num.toString(16);                         // Convert to hexadecimal
        return hexPart.length === 1 ? '0' + hexPart : hexPart;  // Ensure 2 characters
    }).join('');

    return `#${hex.toUpperCase()}`; // Return the final hex color code with '#'
}

function getColorBrightness(color) {
    if (color.length !== 7) {
        console.error("ERROR: Only colors in the format #FFFFFF are allowed.")   
        return;
    }
    
    var r = +("0x" + color.slice(1,3));
    var g = +("0x" + color.slice(3,5));
    var b = +("0x" + color.slice(5));
    var brightness = Math.sqrt(
        0.299 * (r * r) + 0.587 * (g * g) + 0.114 * (b * b)
    );

    return brightness;
}

function isColorBright(color) {
    if (color.length !== 7) {
        console.error("ERROR: Only colors in the format #FFFFFF are allowed.")   
        return;
    }
    return getColorBrightness(color) > 127.5;
}

function colorConsoleLog(msg, color) {
    if (color.length !== 7) {
        console.error("ERROR: Only colors in the format #FFFFFF are allowed.")   
        return;
    }
    console.log("%c" + msg, "color:" + color + ";font-weight:bold;");
}