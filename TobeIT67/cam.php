<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Camera</title>
</head>
<body>
    <?php include "nav.php";?>
    <h1>Camera</h1>
    <div class="butt">
        <button class="btn btn-light" onclick="startWebcam()">Turn on webcam</button>
        <button class="btn btn-dark" onclick="takeScreenshot()">Take Photo</button>
   
        <video id="webcam-vid" autoplay="true"></video>

        <div id="screenshots"></div>
    </div>

    <script>
        const videoEl = document.getElementById('webcam-vid');
        const screenshotEl = document.getElementById('screenshot');
        let imgCapture;

        const startWebcam = () => {
            if (navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices
                        .getUserMedia({ video: true})
                        .then((stream) => {
                            videoEl.srcObject = stream ;
                            imgCapture = new ImgCapture(stream.getVideoTracks()[0]);
                        })
                        .catch((err) => {
                            console.log("พัง",err);
                        });
            }
        }

        const takeScreenshot = () => {
            imgCapture.takePhoto().then((blob) => {
                const img = document.createElement("img")
                img.src = window.URL.createObjectURL(blob)
                screenshotEl.appendChild(img)
            })
        }
    </script>
</body>
</html>