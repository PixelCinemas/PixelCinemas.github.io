
document.addEventListener("DOMContentLoaded", function (event) { // attach DOMContentLoaded to wait for hthml load before execute function and execute function (event)
var scrollpos = sessionStorage.getItem("scrollpos"); //Get the scrollpos value during the session
if (scrollpos) { //If get the value, 
  window.scrollTo(0, scrollpos); //scrolls to (x-coord, y-coord) in the document
  sessionStorage.removeItem('scrollpos'); //remove scrollpos saved data after scroll
  }
});
function scrollFix() {
  window.addEventListener("beforeunload", function (e) { //Execute function when beforeupload event fired when the window, the document and its resources are about to be unloaded.
  sessionStorage.setItem('scrollpos', window.scrollY); //Set value of scrollpos to number of pixels that the document is currently scrolled vertically
});
}
