function confirmReload(action) {
    var confirmation = confirm("Are you sure you want to reload " + action + "?");
    if (confirmation) {
        if (action === 'QUEUEMETRICS') {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "queuemetricsreload.php", true);
            xhr.send();
        } else if (action === 'QLOADER') {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "qloaderdreload.php", true);
            xhr.send();
        } else if (action === 'UNILOADER') {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "uniloaderreload.php", true);
            xhr.send();
        }
    } else {
        console.log(action + " reload canceled.");
    }
}
