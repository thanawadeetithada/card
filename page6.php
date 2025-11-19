<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap');

    body {
        font-family: 'Prompt', sans-serif;
        background: linear-gradient(135deg, #ff4da6, #ff66b2);
        text-align: center;
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .swiper {
        width: 90%;
        max-width: 380px;
        height: 580px;
    }

    .swiper-slide {
        background: transparent;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        height: 580px;
    }

    .swiper-slide img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    }

    .caption {
        color: #333;
        background: white;
        font-size: 16px;
        font-weight: 500;
        width: 90%;
        border-radius: 15px;
        padding: 10px;
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.25);
    }

    .btn {
        background-color: white;
        color: #ff4da6;
        border: none;
        border-radius: 30px;
        padding: 12px 28px;
        margin-top: 30px;
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
        .swiper {
            height: 540px;
        }

        .swiper-slide {
            height: 540px;
        }

        .swiper-slide img {
            height: 400px;
            width: 75%;
        }

        .caption {
            font-size: 14px;
            padding: 8px;
            width: 70%;
        }

        .btn {
            padding: 10px 22px;
            font-size: 15px;
            margin-top: 0px;
        }
    }
    </style>
</head>

<body>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="mem/mem1.jpg" alt="">
                <div class="caption">วันที่เราไปเที่ยวด้วยกัน 💕</div>
            </div>

            <div class="swiper-slide">
                <img src="mem/mem2.jpg" alt="">
                <div class="caption">วันที่เราไปดูหนังด้วยกัน 🎬</div>
            </div>

            <div class="swiper-slide">
                <img src="mem/mem3.jpg" alt="">
                <div class="caption">วันที่เรากินข้าวร้านโปรด 🍜</div>
            </div>

            <div class="swiper-slide">
                <img src="mem/mem4.jpg" alt="">
                <div class="caption">วันที่เรายิ้มให้กัน 😊</div>
            </div>

            <div class="swiper-slide">
                <img src="mem/mem5.jpg" alt="">
                <div class="caption">วันที่เราอยู่ด้วยกันทั้งวัน ☀️</div>
            </div>
        </div>
    </div>

    <form action="page7.php" method="get">
        <button class="btn">ต่อจิ๊กซอว์ ➜</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        loop: false,
        cardsEffect: {
            slideShadows: false
        }
    });
    </script>
</body>

</html>