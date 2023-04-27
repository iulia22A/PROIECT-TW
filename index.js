// Adding an event listener to the document that listens for mousemove events, and calls the function named "parallax" when a mousemove event is detected
document.addEventListener("mousemove", parallax);

// Defining a function named "parallax" that takes an event object "e" as its parameter
function parallax(e) {
// Selecting all the HTML elements that have a class of "move_this", and looping through them using forEach method
this.querySelectorAll(".move_this").forEach((layer) => {
// Getting the value of the "data-speed" attribute of each selected element and assigning it to a variable called "speed"
const speed = layer.getAttribute("data-speed");

// Calculating the horizontal and vertical position of the mouse pointer relative to the window, and adjusting the values based on the value of "speed"
const x = (window.innerWidth - e.pageX * speed) / 100;
const y = (window.innerHeight - e.pageY * speed) / 100;

// Setting the transform property of the current element to translate it horizontally and vertically by the calculated values
layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
});
}

// The above code creates a parallax effect on the elements with class "move_this" as the user moves the mouse.