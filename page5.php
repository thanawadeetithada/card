<?php
$start_date = "2024-11-19 12:00:00";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(135deg, #ff4da6, #ff66b2);
            color: white;
            text-align: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            padding: 30px 50px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            max-width: 420px;
            width: 100%;
        }

        img {
            width: 90px;
            margin-bottom: 20px;
        }

        .title {
            font-size: 26px;
            margin-bottom: 25px;
            line-height: 1.4;
        }

        .counter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .counter div {
            flex: 1 1 40%;
            min-width: 80px;
        }

        .box {
            background: rgba(255,255,255,0.25);
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 28px;
            font-weight: bold;
        }

        .label {
            font-size: 15px;
            margin-top: 5px;
        }

        .btn {
            background-color: white;
            color: #ff4da6;
            border: none;
            border-radius: 30px;
            padding: 12px 28px;
            margin-top: 35px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #ffe6f0;
            transform: scale(1.05);
        }
        @media (max-width: 600px) {
            .container {
                padding: 25px 30px;
                border-radius: 15px;
            }
            .title {
                font-size: 22px;
            }
            .box {
                font-size: 22px;
                padding: 10px 12px;
            }
            .label {
                font-size: 14px;
            }
            img {
                width: 70px;
            }
            .btn {
                padding: 10px 22px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="love dog">
        <div class="title">เราคบกันมาแล้ว</div>
        <div class="counter">
            <div>
                <div class="box" id="days">0</div>
                <div class="label">วัน</div>
            </div>
            <div>
                <div class="box" id="hours">0</div>
                <div class="label">ชั่วโมง</div>
            </div>
            <div>
                <div class="box" id="minutes">0</div>
                <div class="label">นาที</div>
            </div>
            <div>
                <div class="box" id="seconds">0</div>
                <div class="label">วินาที</div>
            </div>
        </div>
        <form action="page6.php" method="get">
            <button class="btn">ดูความทรงจำของเรา ➜</button>
        </form>
    </div>

    <script>
        const startDate = new Date("<?php echo $start_date; ?>").getTime();

        function updateCounter() {
            const now = new Date().getTime();
            const diff = now - startDate;

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = days;
            document.getElementById("hours").textContent = hours;
            document.getElementById("minutes").textContent = minutes;
            document.getElementById("seconds").textContent = seconds;
        }

        updateCounter();
        setInterval(updateCounter, 1000);
    </script>
</body>
</html>
