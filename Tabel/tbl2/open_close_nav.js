/*open close navigation*/

function openNav() {
     document.getElementById("mySidebar").style.width = "200px";
     document.getElementById("main").style.marginLeft = "201px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}