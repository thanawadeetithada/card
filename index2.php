<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Anniversary Card</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Courgette&display=swap");

    * {
        margin: 0;
        padding: 0;
        font-family: "Courgette";
        color: burlywood;
        text-shadow: 0 0 6px peru;
    }

    body {
        display: grid;
        width: 100%;
        height: 100vh;
        background-color: #FFFFFFFF;
        place-items: center;
    }

    .letter_ct {
        width: 400px;
        height: 300px;
        display: flex;
        transform: scale(0.7);
        transform-origin: center;
    }

    label {
        position: absolute;
    }

    .letter {
        grid: inherit;
        width: 400px;
        height: 300px;
        background-color: pink;
        border: 4px solid #fc9dbc;
        display: grid;
        transition: all 0.3s ease-in-out;
        position: absolute;
        border-radius: 0 0 7px 7px;
    }

    .main {
        box-shadow: 0px 5px 20px #fc9dbc;
    }

    .note {
        z-index: 1;
        justify-content: center;
        position: absolute;
        width: 390px;
        height: 270px;
        margin: 10px 9px;
        background-color: whitesmoke;

        p {
            margin: 15px 30px;
            font-size: 12px;
            color: purple;
        }

        .int {
            text-align: left;
        }

        .sign {
            text-align: right;
        }

        transform: translateY(0px);
        transition-duration: 0.3s;
    }

    .front {
        position: absolute;
        z-index: 2;
        width: 401px;
        height: 300px;
        background-color: rgb(252, 157, 188);
        margin: 4px;
        clip-path: polygon(50% 45%, 100% 0, 100% 100%, 0 100%, 0 0);
    }

    .flap-bg {
        z-index: 2;
        background-color: palevioletred;
        margin-top: 4px;
        clip-path: polygon(0% 0%, 100% 0%, 100% 1%, 50% 56%, 0 1%);

        transform: rotateX(0deg);
        transition-duration: 0.3s ease-in-out;
    }

    .flap {
        z-index: 2;
        margin-left: 3px;
        background-color: rgb(255, 163, 179);
        border: unset;
        clip-path: polygon(0 0, 100% 0, 50% 55%);

        transform: rotateX(0deg);
        transition-duration: 0.3s ease-in-out;
    }

    .heart {
        position: absolute;
        z-index: 4;
        cursor: pointer;
        height: 170px;
        width: 200px;

        scale: 30%;
        margin: 70px 102px;
        transition: transform 0.3s ease-in-out;
    }

    .heart::before,
    .heart::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 160px;
        background-color: rgb(178, 34, 106);
    }

    .heart::before {
        left: 100px;

        -webkit-transform-origin: 0 100%;
        transform-origin: 0 100%;

        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);

        border-radius: 50px 50px 0 0;
    }

    .heart::after {
        right: 100px;

        -webkit-transform-origin: 100% 100%;
        transform-origin: 100% 100%;

        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);

        -webkit-border-radius: 50px 50px 0 0;
        border-radius: 50px 50px 0 0;
    }

    /* checkbox */
    #check {
        display: none;
    }

    input:not(:checked)~label .flap {
        transform-origin: top;
        transform: rotateX(0deg);
        transition: 0.3s ease-in-out;
        transition-delay: 0.3s;

        -webkit-transition-delay: 0.3s;
        -webkit-transform-origin: top;
        -webkit-transform: rotateX(0deg);
    }

    input:not(:checked)~label .flap-bg {
        transform-origin: top;
        transform: rotateX(0deg);
        transition: 0.3s ease-in-out;
        transition-delay: 0.3s;

        -webkit-transition-delay: 0.3s;
        -webkit-transform-origin: top;
        -webkit-transform: rotateX(0deg);
    }

    input:not(:checked)~label .heart {
        transform-origin: center 70%;
        transform: translateY(0px) rotate(0deg);
        transition-delay: 0.6s;

        -webkit-transition-delay: 0.6s;
        -webkit-transform-origin: center 70%;
        -webkit-transform: translateX(0px) rotate(0deg);
    }

    input:checked~label .flap {
        transform: rotateX(-180deg) translateY(-4px);
        transition: 0.3s ease-in-out;
        transition-delay: 0.3s;

        -webkit-transform-origin: top;
        -webkit-transform: rotateX(-180deg) translateY(-4px);
        -webkit-transition-delay: transform 0.3s ease;
    }

    input:checked~label .flap-bg {
        transform: rotateX(-180deg);
        transition: 0.3s ease-in-out;
        transition-delay: 0.3s;

        -webkit-transform-origin: top;
        -webkit-transform: rotateX(-180deg);
        -webkit-transition-delay: transform 0.3s ease;
        -webkit-transition-delay: 0.3s;
    }

    input:checked~label .flap,
    input:checked~label .flap-bg {
        transform-origin: top;
        transition: transform 0.3s 0.4s, z-index 0s 0.6s;

        z-index: 0;
    }

    input:checked~label .heart {
        transform-origin: center 70%;
        transform: translateX(-60px) rotate(-70deg);
        transition-duration: 0.3s;

        -webkit-transform-origin: center 70%;
        -webkit-transform: translateX(-60px) rotate(-70deg);
        -webkit-transition-duration: 0.3s;
    }

    input:checked~label .note {
        transform: translateY(-170px);
        transition-delay: 0.8s;
    }

    .heart-btn {
        position: absolute;
        top: 200px;
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
    </style>
</head>

<body>

    <div class="letter_ct">
        <input type="checkbox" id="check" />
        <label for="check">
            <span class="letter main"></span>
            <div class="note">
                <p class="int">Dear My Love,</p>
                <p>ในทุก ๆ วันที่ผ่านมาขอบคุณนะคะที่อยู่ข้างกันเสมอ
                    เวลาที่เราได้ใช้ร่วมกันมันมีค่ามากกว่าที่คำพูดจะบรรยายได้
                    ขอบคุณสำหรับรอยยิ้ม ความอบอุ่น และความเข้าใจ
                    ที่ทำให้ทุกวันของเราเป็นวันที่สวยงามขึ้นเสมอ
                    <br />
                    ฉันรู้สึกโชคดีมากที่ได้รักคุณ
                    และอยากจับมือเดินไปด้วยกันแบบนี้ในทุกปีต่อจากนี้
                    ไม่ว่าจะมีช่วงเวลายากหรือดีแค่ไหน…
                </p>
                <p class="sign">With all my love,<br /></p>
                <button class="heart-btn" id="goPage2">ลองกดตรงนี้</button>
               
            </div>
            <span class="front"></span>
            <span class="letter flap-bg"></span>
            <span class="letter flap"></span>
            <span class="heart"></span>
        </label>
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
            window.location.href = 'card2.php';
        }, 500);
    });
    </script>
</body>

</html>