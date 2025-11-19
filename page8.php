<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>
    <style>
    body {
        font-family: 'Prompt', sans-serif;
        background-color: #fff;
        color: #d63384;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        text-align: center;
    }

    .message {
        font-size: 18px;
        line-height: 1.8;
        max-width: 400px;
        white-space: pre-line;
    }

    button {
        background-color: #ff4fa0;
        border: none;
        color: white;
        padding: 10px 24px;
        font-size: 16px;
        border-radius: 25px;
        margin-top: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background-color: #e63c8a;
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="message" id="message"></div>
    <button onclick="nextPage()">ข้าม ❤</button>

    <script>
    const text =
        `ความในใจที่อยากจะบอก...\n\nสุขสันต์วันวาเลนไทน์นะคะที่รัก\nขอบคุณที่เข้ามาเป็นส่วนหนึ่งในชีวิต\nและขอบคุณที่รักกันมาตลอด 💕`;
    let i = 0;
    const speed = 50;

    function typeWriter() {
        if (i < text.length) {
            document.getElementById("message").innerHTML += text.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }

    function nextPage() {
        window.location.href = "page9.php";
    }

    window.onload = typeWriter;
    </script>
</body>

</html>