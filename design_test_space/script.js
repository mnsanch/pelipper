
function toggleDarkMode() {
    var element = document.body;
    var modeToggleBtn = document.querySelector('button');
    
    // Toggle dark mode class
    element.classList.toggle("dark-mode");

    // Update button text and localStorage
    if (element.classList.contains("dark-mode")) {
        localStorage.setItem('darkModeEnabled', 'true');
    } else {
        localStorage.removeItem('darkModeEnabled');
    }
}

// Check if dark mode is enabled on page load
window.onload = function() {
    var darkModeEnabled = localStorage.getItem('darkModeEnabled');
    if (darkModeEnabled === 'true') {
        document.body.classList.add("dark-mode");
    }
};
