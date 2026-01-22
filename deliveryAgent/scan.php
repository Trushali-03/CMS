<!DOCTYPE html>
<html>
<head>
    <title>Scan Parcel QR</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body>

<h3>Scan Parcel QR Code</h3>

<div id="reader" style="width:400px;"></div>
<p id="result"></p>

<script>
const html5QrCode = new Html5Qrcode("reader");

Html5Qrcode.getCameras().then(devices => {
    if (devices.length === 0) {
        alert("No camera found");
        return;
    }

    // Prefer integrated camera
    let cameraId = devices.find(d => d.label.toLowerCase().includes("integrated"))?.id 
                   || devices[0].id;

    html5QrCode.start(
        cameraId,
        {
            fps: 10,
            qrbox: 250
        },
        (decodedText) => {
            document.getElementById("result").innerText =
                "Scanned: " + decodedText;

            // CALL PHP BACKEND
            fetch("update_status.php?tracking_id=" + encodeURIComponent(decodedText))
                .then(res => res.text())
                .then(response => {
                    alert(response);
                    html5QrCode.stop(); // stop after successful scan
                });
        }
    );
}).catch(err => {
    alert("Camera error: " + err);
});
</script>

</body>
</html>