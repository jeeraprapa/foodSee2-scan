<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Scan</title>
	<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
</head>

<body>
<button id="scanQrCodeButton">Scan QrCode</button>
<p id="scanQrField"></p>
<script>
    window.onload = function (e) {
        initializeLiff('1654078150-ZM9RaNJ9');
    };
    function initializeLiff(myLiffId) {
        liff
            .init({
                liffId: myLiffId
            })
            .then(() => {
                // start to use LIFF's api
                //initializeApp();
            })
            .catch((err) => {
                document.getElementById("liffAppContent").classList.add('hidden');
                document.getElementById("liffInitErrorMessage").classList.remove('hidden');
            });
    }

    document.getElementById('scanQrCodeButton').addEventListener('click', function() {
        if (!liff.isInClient()) {
            sendAlertIfNotInClient();
        } else {
            if (liff.scanCode) {
                liff.scanCode().then(result => {
                    // e.g. result = { value: "Hello LIFF app!" }
                    const stringifiedResult = JSON.stringify(result);
                    document.getElementById('scanQrField').textContent = stringifiedResult;
                }).catch(err => {
                    document.getElementById('scanQrField').textContent = err;
                });
            }
        }
    });
</script>
</body>
</html>
