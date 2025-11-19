<?php ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>

    <style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('img/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: "Prompt", sans-serif;
    }


    .pin-box {
        background: rgba(255, 255, 255, 0.55);
        padding: 30px;
        width: 240px;
        border-radius: 20px;
        backdrop-filter: blur(15px);
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        position: relative;
        transition: 0.2s;
    }

    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-10px);
        }

        50% {
            transform: translateX(10px);
        }

        75% {
            transform: translateX(-10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .shake {
        animation: shake 0.35s;
    }

    .dots {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin: 20px 0;
    }

    .dot {
        width: 12px;
        height: 12px;
        background: #444;
        border-radius: 50%;
        opacity: 0.25;
        transition: 0.2s;
    }

    .keypad {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }

    .keypad button {
        background: white;
        border: none;
        padding: 15px 0;
        border-radius: 12px;
        font-size: 18px;
        cursor: pointer;
        transition: 0.2s;
    }

    .keypad button:active {
        background: #ddd;
    }

    .del {
        background: #ffc9c9;
    }
    </style>

</head>

<body>

    <div class="pin-box" id="pinBox">
        <h3>ใส่รหัสเพื่อปลดล็อก</h3>

        <div class="dots">
            <span class="dot" id="d1"></span>
            <span class="dot" id="d2"></span>
            <span class="dot" id="d3"></span>
            <span class="dot" id="d4"></span>
        </div>

        <div class="keypad">
            <button onclick="pressNum(1)">1</button>
            <button onclick="pressNum(2)">2</button>
            <button onclick="pressNum(3)">3</button>

            <button onclick="pressNum(4)">4</button>
            <button onclick="pressNum(5)">5</button>
            <button onclick="pressNum(6)">6</button>

            <button onclick="pressNum(7)">7</button>
            <button onclick="pressNum(8)">8</button>
            <button onclick="pressNum(9)">9</button>

            <button class="del" onclick="delNum()">⌫</button>
            <button onclick="pressNum(0)">0</button>
            <button class="ok" onclick="submitPin()">✔</button>
        </div>
    </div>

    <script>
    let pin = "";
    const correctPIN = "1474";

    function updateDots() {
        for (let i = 1; i <= 4; i++) {
            document.getElementById("d" + i).style.opacity = i <= pin.length ? 1 : 0.25;
        }
    }

    function pressNum(num) {
        if (pin.length < 4) {
            pin += num;
            updateDots();
        }

        if (pin.length === 4) {
            checkPIN();
        }
    }

    function delNum() {
        pin = pin.slice(0, -1);
        updateDots();
    }

    function shakeBox() {
        const box = document.getElementById("pinBox");
        box.classList.add("shake");
        setTimeout(() => box.classList.remove("shake"), 400);
    }

    function clearPin() {
        pin = "";
        updateDots();
    }

    function checkPIN() {
        if (pin === correctPIN) {
            window.location.href = "page4.php";
        } else {
            shakeBox();
            setTimeout(clearPin, 300);
        }
    }

    document.addEventListener("keydown", function(e) {
        if (!isNaN(e.key) && e.key !== " ") {
            pressNum(e.key);
        }

        if (e.key === "Backspace") {
            delNum();
        }

        if (e.key === "Enter") {
            checkPIN();
        }
    });
    </script>

</body>

</html>