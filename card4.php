<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Card</title>

    <style>
    body {
        margin: 0;
        background: #f498832b;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: sans-serif;
        overflow: hidden;
    }

    .cd-wrapper {
        position: relative;
        width: 60vw;
        max-width: 350px;
        aspect-ratio: 1 / 1;
    }

    .cd {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        position: relative;
        transition: 0.3s;
    }

    .cd::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 8%;
        height: 8%;
        background: #ffffffcc;
        border-radius: 50%;
        z-index: 2;
    }

    .play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 3;
        width: 25%;
        height: 25%;
        background: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.25s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .play-btn img {
        width: 60%;
        height: 60%;
    }

    .play-active {
        transform: translate(-50%, -50%) scale(1.25);
    }

    .rotate {
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 480px) {
        .cd-wrapper {
            width: 70vw;
            max-width: 280px;
        }

        .play-btn {
            width: 30%;
            height: 30%;
        }
    }

    @media (min-width: 481px) and (max-width: 768px) {
        .cd-wrapper {
            width: 70vw;
            max-width: 400px;
        }
    }
    </style>
</head>

<body>

    <div class="cd-wrapper">
        <div class="cd" id="cd" style="background-image: url('img/cover.jpg');"></div>

        <div class="play-btn" id="playBtn">
            <img src="img/play.png">
        </div>
    </div>

    <script>
    const playBtn = document.getElementById("playBtn");
    const cd = document.getElementById("cd");

    playBtn.addEventListener("click", () => {
        cd.classList.add("rotate");
        playBtn.classList.add("play-active");
        setTimeout(() => {
            window.location.href = "card5.php";
        }, 800);
    });
    </script>

</body>

</html>