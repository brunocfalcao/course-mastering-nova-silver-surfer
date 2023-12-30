import.meta.glob([
    '../assets/images/**'
]);

function createCircularProgress(
    wrapper,
    radius,
    progressColor,
    trackColor,
    bgColor,
    progress,
    strokeWidth,
    trackWidth,
    imageSide,
    textColor,
    textSize,
    padding
) {
    if (!wrapper) {
        return
    }

    const wrapperPadding = Math.max(padding, 0);
    const circleSize = (radius + padding) * 2 + strokeWidth; // Adjusted size to accommodate the stroke width
    const wrapperSize =
        (radius + wrapperPadding) * 2 + strokeWidth + imageSide / 2;
    const circumference = 2 * Math.PI * radius;
    const angle = (progress / 100) * 360; // Convert progress to degrees

    wrapper.style.width = `${wrapperSize}px`;
    wrapper.style.height = `${wrapperSize}px`;

    const progressRing = document.createElement("div");
    progressRing.classList.add("progress-ring");

    const svg = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "svg"
    );
    svg.setAttribute("width", "100%");
    svg.setAttribute("height", "100%");

    // Background Circle
    const circleBackground = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "circle"
    );
    circleBackground.setAttribute("cx", "50%");
    circleBackground.setAttribute("cy", "50%");
    circleBackground.setAttribute("r", circleSize / 2);
    circleBackground.setAttribute("stroke", "none");
    circleBackground.classList.add(bgColor); // Apply Tailwind CSS background color class

    svg.appendChild(circleBackground);

    // Track Circle
    const circleTrack = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "circle"
    );
    circleTrack.setAttribute("cx", "50%");
    circleTrack.setAttribute("cy", "50%");
    circleTrack.setAttribute("r", radius);
    circleTrack.setAttribute("stroke-width", trackWidth);
    circleTrack.setAttribute("fill", "transparent");
    circleTrack.classList.add(trackColor); // Apply Tailwind CSS track color class

    svg.appendChild(circleTrack);

    // Progress Circle
    const circle = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "circle"
    );
    circle.setAttribute("cx", "50%");
    circle.setAttribute("cy", "50%");
    circle.setAttribute("r", radius);
    circle.setAttribute("stroke-width", strokeWidth);
    circle.setAttribute("fill", "none");
    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = (1 - progress / 100) * circumference;
    circle.style.strokeLinecap = "round";
    circle.style.transformOrigin = "50% 50%";
    circle.style.transition = "stroke-dashoffset 0.3s ease-in-out";
    circle.classList.add(progressColor); // Apply Tailwind CSS progress color class
    // circle.classList.add('glow', 'shadow-md', 'shadow-blue-500/50');

    // Add filter for the glow effect
    const filter = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "filter"
    );
    filter.setAttribute("id", "glow");
    const feGaussianBlur = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "feGaussianBlur"
    );
    feGaussianBlur.setAttribute("in", "SourceGraphic");
    feGaussianBlur.setAttribute("stdDeviation", "5");
    filter.appendChild(feGaussianBlur);
    svg.appendChild(filter);

    const glowCircle = circle.cloneNode(true);
    glowCircle.style.filter = "url(#glow)";

    svg.appendChild(glowCircle);
    svg.appendChild(circle);

    const text = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "text"
    );
    text.setAttribute("x", "50%");
    text.setAttribute("y", "50%");
    text.setAttribute("text-anchor", "middle");
    text.setAttribute("dominant-baseline", "central");
    text.setAttribute(
        "transform",
        `rotate(90 ${wrapperSize / 2} ${wrapperSize / 2})`
    ); // Rotate around the center of the text
    text.classList.add(textColor);
    text.classList.add(textSize);
    text.innerHTML = `${progress}%`;

    text.setAttribute("fill", "#33E6E6"); // this was the color of the progress percentage

    svg.appendChild(text);

    const imageTop =
        50 -
        (50 -
            ((wrapperPadding + imageSide / 3 + strokeWidth / 3) / wrapperSize) *
            100) *
        Math.cos((angle + 90) * (Math.PI / 180));
    const imageLeft =
        50 +
        (50 -
            ((wrapperPadding + imageSide / 3 + strokeWidth / 3) / wrapperSize) *
            100) *
        Math.sin((angle + 90) * (Math.PI / 180));


    let image = new Image();
    // image.src = "rocket.png";
    image.src = wrapper.getAttribute('data-img-src');
    image.classList.add("rocket-image");
    image.style.width = `${imageSide}px`; // Adjust image width as needed
    image.style.height = `${imageSide}px`; // Adjust image height as needed
    image.style.position = "absolute";
    image.style.top = `${imageTop}%`;
    image.style.left = `${imageLeft}%`;
    image.style.transform = `translate(-50%, -50%) rotate(${
        angle + 180 - 35
    }deg)`; // Rotate the image based on progress

    const content = document.createElement("div");
    content.classList.add("progress-ring-content");
    content.appendChild(image);
    content.setAttribute("overflow", "visible");

    progressRing.appendChild(svg);
    progressRing.appendChild(content);
    wrapper.appendChild(progressRing);

    // Applying styles directly here
    wrapper.style.position = "relative";
    progressRing.style.width = "100%";
    progressRing.style.height = "100%";
    progressRing.style.transform = "rotate(-90deg)";
}

// Usage:
const radius = 80;
const wrapper = document.getElementById("circularProgress");
const bgColorClass = "fill-transparent";
const progressPercentage = wrapper.getAttribute('data-progress');
const progressThickness = 10;
const trackThickness = 10;
const imageSide = 85;
const progressColorClass = "progress-completed";
const trackColorClass = "progress-incomplete";
const textColorClass = "progress-font";
const textSizeClass = "text-5xl";
const padding = 0;

createCircularProgress(
    wrapper,
    radius,
    progressColorClass,
    trackColorClass,
    bgColorClass,
    progressPercentage,
    progressThickness,
    trackThickness,
    imageSide,
    textColorClass,
    textSizeClass,
    padding
);