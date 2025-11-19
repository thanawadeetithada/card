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
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 96vh;
    }

    .card {
        position: relative;
        width: 300px;
        height: 400px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hidden-message {
        color: #ff3399;
        font-size: 20px;
        text-align: center;
        padding: 20px;
        z-index: 1;
    }

    canvas {
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 20px;
        z-index: 2;
        touch-action: none; 
    }

    button {
        margin-top: 30px;
        background-color: white;
        color: #ff3399;
        border: 1px solid #8a848417;
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    button:hover {
        background-color: #ff3399;
        color: white;
        transform: scale(1.05);
    }
    </style>
</head>

<body>
    <div class="card">
        <div class="hidden-message">
            💌 ความลับคือ...<br>รักเธอที่สุดเลย ❤️
        </div>
        <canvas id="scratch"></canvas>
    </div>

    <button onclick="restart()">เริ่มอ่านใหม่</button>

    <script>
    const canvas = document.getElementById('scratch');
    const ctx = canvas.getContext('2d');
    const card = document.querySelector('.card');
    let isDrawing = false;

    canvas.width = card.offsetWidth;
    canvas.height = card.offsetHeight;

    const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
    gradient.addColorStop(0, "#ff66b3");
    gradient.addColorStop(1, "#ff3399");
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.font = "20px Prompt";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.fillText("ขูดเพื่อดูความลับ 💕", canvas.width / 2, canvas.height / 2);

    function getPosition(e) {
        const rect = canvas.getBoundingClientRect();
        if (e.touches) {
            return {
                x: e.touches[0].clientX - rect.left,
                y: e.touches[0].clientY - rect.top
            };
        }
        return {
            x: e.clientX - rect.left,
            y: e.clientY - rect.top
        };
    }

    function startDrawing(e) {
        isDrawing = true;
        draw(e);
    }

    function stopDrawing() {
        isDrawing = false;
        ctx.beginPath();
    }

    function draw(e) {
        if (!isDrawing) return;
        const pos = getPosition(e);
        ctx.globalCompositeOperation = 'destination-out';
        ctx.beginPath();
        ctx.arc(pos.x, pos.y, 20, 0, Math.PI * 2);
        ctx.fill();
    }

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseleave', stopDrawing);

    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);

    function restart() {
        window.location.href = "index.php";
    }
    </script>
</body>

</html>