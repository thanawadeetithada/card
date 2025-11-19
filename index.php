<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #fdecf4;
    }

    .container {
        position: relative;
        transition: transform 1.5s ease;
    }

    .container.slide-left {
        transform: translateX(-500%);
    }

    .valentines {
        position: relative;
        top: 50px;
        cursor: pointer;
        animation: up 3s linear infinite;
    }

    @keyframes up {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-30px);
        }
    }

    .envelope {
        position: relative;
        width: 300px;
        height: 200px;
        background-color: #f58ba0;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    }

    .envelope:before {
        background-color: #f58ba0;
        content: "";
        position: absolute;
        width: 212px;
        height: 212px;
        transform: rotate(45deg);
        top: -105px;
        left: 44px;
        border-radius: 30px 0 0 0;
    }

    .card {
        position: absolute;
        background-color: #ffffff;
        width: 270px;
        height: 170px;
        top: 5px;
        left: 15px;
        border-radius: 20px;
    }

    .text {
        font-family: 'Brush Script MT', cursive;
        line-height: 20px;
        color: #003049;
        padding: 15px;
    }

    .front {
        position: absolute;
        border-right: 180px solid #ffc9d5;
        border-top: 95px solid transparent;
        border-bottom: 100px solid transparent;
        left: 120px;
        top: 5px;
        width: 0;
        height: 0;
        z-index: 10;
        pointer-events: none;
    }

    .front:before {
        position: absolute;
        content: "";
        border-left: 300px solid #ffc9d5;
        border-top: 195px solid transparent;
        left: -120px;
        top: -95px;
        width: 0;
        height: 0;
    }

    .heart-btn {
        position: absolute;
        top: 120px;
        left: 50%;
        transform: translateX(-50%);
        padding: 6px 12px;
        background-color: #ff6986;
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.2s, background-color 0.2s;
        z-index: 1;
    }

    .heart-btn:hover {
        transform: translateX(-50%) scale(1.1);
    }

    .heart-btn.show {
        opacity: 1;
        pointer-events: auto;
    }

    .seal-heart {
        position: absolute;
        top: 90px;
        left: 135px;
        width: 40px;
        height: 40px;
        background-image: url('img/heart1.png');
        background-size: cover;
        background-position: center;
        transform: translate(-50%, -50%);
        z-index: 20;
    }

    .to-text {
        position: absolute;
        left: 25px;
        bottom: 25px;
        font-size: 15px;
        color: #333;
        font-family: sans-serif;
        z-index: 20;
    }

    .hearts img {
        position: absolute;
        width: 40px;
        height: 40px;
        top: 50px;
    }

    .one {
        left: 10px;
        animation: heart 1s ease-out infinite;
    }

    .two {
        left: 55px;
        animation: heart 2s ease-out infinite;
    }

    .three {
        left: 120px;
        animation: heart 1.5s ease-out infinite;
    }

    .four {
        left: 185px;
        animation: heart 2.3s ease-out infinite;
    }

    .five {
        left: 250px;
        animation: heart 1.7s ease-out infinite;
    }

    @keyframes heart {
        0% {
            transform: translateY(0) scale(0.3);
            opacity: 1;
        }

        100% {
            transform: translateY(-150px) scale(1.3);
            opacity: 0.5;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="valentines">
            <div class="envelope"></div>
            <div class="front"></div>
            <div class="seal-heart"></div>

            <div class="to-text">To:<br>คนพิเศษ</div>
            <div class="card">
                <div class="text">
                    <span style="color: #ee5371;">Happy Valentine's Day!</span><br>
                    <span style="font-size: 12px;"> ถึงคนพิเศษ,</span><br>
                    <span style="font-size: 12px;"> ขอบคุณที่เข้ามาเป็นส่วนหนึ่งในชีวิต</span><br>
                    <span style="font-size: 12px;"> ทำให้ทุกวันของฉันมีความหมายมากขึ้น</span><br>
                </div>
                <button class="heart-btn" id="goPage2">ลองกดตรงนี้</button>
                <div class="hearts">
                    <img class="one" src="img/heart5.png" alt="heart">
                    <img class="two" src="img/heart3.png" alt="heart">
                    <img class="three" src="img/heart5.png" alt="heart">
                    <img class="four" src="img/heart3.png" alt="heart">
                    <img class="five" src="img/heart5.png" alt="heart">
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $('.container').mouseenter(function() {
        $('.card').stop().animate({
            top: '-90px'
        }, 'slow', function() {
            $('.heart-btn').addClass('show');
        });
    }).mouseleave(function() {
        $('.card').stop().animate({
            top: '5px'
        }, 'slow', function() {
            $('.heart-btn').removeClass('show');
        });
    });
    $('#goPage2').click(function(e) {
        e.preventDefault();

        $('.container').addClass('slide-left');

        setTimeout(() => {
            window.location.href = 'page2.php';
        }, 500);
    });
    </script>
</body>

</html>