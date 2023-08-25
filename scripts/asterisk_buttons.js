// Reload Asterisk functions
function confirmReload(action) {
    var confirmation = confirm("Are you sure you want to reload " + action + "?");
    if (confirmation) {
    // User confirmed, proceed with the action
       if (action === 'SIP') {
          // Make an AJAX request to the server to trigger the command execution
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "../exe/sipreload.php", true);
          xhr.send();
       } else if (action === 'Dialplan') {
          // Make an AJAX request to the server to trigger the command execution
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "../exe/dpreload.php", true);
          xhr.send();
       } else if (action === 'Core') {
          // Make an AJAX request to the server to trigger the command execution
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "../exe/corereload.php", true);
          xhr.send();
       }
    } else {
       // User canceled the action
       console.log(action + " reload canceled.");
    }
}                                                                                                                                                                                                       
