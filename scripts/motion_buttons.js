function confirmReload(action) {
    var confirmation = confirm("Are you sure you want to reload " + action + "?");
    if (confirmation) {
      // User confirmed, proceed with the action
      if (action === 'NGINX') {
      // Make an AJAX request to the server to trigger the command execution
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../exe/nginxreload.php", true);
      xhr.send();
      } else if (action === 'NODEJS') {
      // Make an AJAX request to the server to trigger the command execution
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../exe/nodejsreload.php", true);
      xhr.send();
      }
      } else {
      // User canceled the action
      console.log(action + " reload canceled.");
      }
}

