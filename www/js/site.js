// Open and close the sidebar on medium and small screens
function w3_open() {
    document.getElementById("defaultSidebar").style.display = "block";
    document.getElementById("defaultOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("defaultSidebar").style.display = "none";
    document.getElementById("defaultOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {scrollHeader()};
function scrollHeader() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("topSection").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("introSection").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("introSection").classList.remove("w3-show-inline-block");
        document.getElementById("topSection").classList.remove("w3-card-4", "w3-animate-opacity");
    }
}

// Accordions
function accordionHandler(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
            x.previousElementSibling.className.replace(" w3-theme", "");
    }
}

// $("#defaultSidebar .w3-button").click(function () {
//     $("#defaultSidebar .w3-button").removeClass("w3-theme"); //Remove any "active" class
//     $("#defaultSidebar .w3-button").addClass(" w3-theme"); //Add "active" class to selected tab
// });