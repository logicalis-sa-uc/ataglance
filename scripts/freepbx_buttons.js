// Restart Functions
function confirmReload(action) {
    var confirmation = confirm("Are you sure you want to reload " + action + "?");
    if (confirmation) {
        // User confirmed, proceed with the action
        if (action === 'HTTPD') {
            // Make an AJAX request to the server to trigger the command execution
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../exe/httpdreload.php", true);
            xhr.send();
        } else if (action === 'AMPORTAL') {
            // Make an AJAX request to the server to trigger the command execution
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../exe/amportalreload.php", true);
            xhr.send();
        } else if (action === 'FWCONSOLE') {
            // Make an AJAX request to the server to trigger the command execution
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../exe/fwconsolereload.php", true);
            xhr.send();
        }
    } else {
        // User canceled the action
        console.log(action + " reload canceled.");
    }
}
