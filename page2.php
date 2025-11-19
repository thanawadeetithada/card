<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Valentine Card</title>

    <style>
    body {
        margin: 20px;
        padding: 20px;
        background: #ff66b2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 90vh;
        font-family: sans-serif;
        overflow: hidden;
    }

    h2 {
        color: white;
        margin-bottom: 20px;
        font-size: 28px;
    }

    .buttons {
        display: flex;
        gap: 20px;
    }

    .btn {
        width: 120px;
        height: 40px;
        border-radius: 30px;
        border: none;
        font-size: 22px;
        color: white;
        cursor: pointer;
        transition: width 0.25s ease, height 0.25s ease;
    }

    #yes {
        background: #21b573;
    }

    #no {
        background: #d9534f;
    }
    </style>

</head>

<body>

    <h2>พร้อมจะย้อนกลับไปดูความทรงจำหรือยัง?</h2>

    <div class="buttons">
        <button id="yes" class="btn">พร้อมแล้ว</button>
        <button id="no" class="btn">ไม่</button>
    </div>

    <script>
    function growStepClick(button) {
        let currentWidth = button.offsetWidth;
        let growStep = 100;

        let newWidth = currentWidth + growStep;
        button.style.width = newWidth + "px";
        button.style.height = newWidth + "px";

        if (newWidth >= window.innerWidth || newWidth >= window.innerHeight) {
            setTimeout(() => {
                window.location.href = "page3.php";
            }, 500);
        }
    }

    const yesButton = document.getElementById("yes");
    const noButton = document.getElementById("no");

    yesButton.addEventListener("click", function() {
        growStepClick(this);
    });

    noButton.addEventListener("click", function() {
        growStepClick(yesButton);
    });
    </script>


</body>

</html>