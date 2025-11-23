<!DOCTYPE html>
<html lang="th">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Valentine Card</title>
<style>
body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Courgette', cursive;
    overflow: hidden;
    background: linear-gradient(135deg, #ff7eb3, #ff758c, #ff50a7);
}

h2 {
    color: #fff;
    text-align: center;
    font-size: 32px;
    text-shadow: 2px 2px 6px #9e2951;
    margin-bottom: 40px;
}

.buttons {
    display: flex;
    gap: 30px;
    position: relative;
}

.btn {
    width: 140px;
    height: 50px;
    border-radius: 30px;
    border: none;
    font-size: 20px;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    position: relative;
}

#yes { background: #21b573; }
#yes:hover { transform: scale(1.1); box-shadow: 0 10px 25px rgba(0,0,0,0.4); }

#no { background: #d9534f; }

.heart {
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: #ff355e;
    transform: rotate(0deg); /* ปรับองศาหัวใจเป็นตรง */
    animation: floatUp linear forwards;
}

.heart::before,
.heart::after {
    content: "";
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: #ff355e;
    border-radius: 50%;
}

.heart::before { top: -12.5px; left: 0; }
.heart::after { left: 12.5px; top: 0; }

@keyframes floatUp {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
    }
    100% {
        transform: translateY(-100vh) rotate(0deg);
        opacity: 0;
    }
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
const body = document.body;

// สร้างหัวใจลอยขึ้นตรงกลาง
function createHeart() {
    const heart = document.createElement("div");
    heart.classList.add("heart");
    heart.style.left = (Math.random() * window.innerWidth * 0.8 + window.innerWidth * 0.1) + "px"; // สุ่มขอบซ้าย-ขวา
    heart.style.bottom = "-30px"; // เริ่มจากด้านล่าง
    heart.style.animationDuration = (3 + Math.random() * 2) + "s"; // ความเร็วต่างกัน
    body.appendChild(heart);
    setTimeout(() => { heart.remove(); }, 5000); // ลบหัวใจหลัง animation
}

setInterval(createHeart, 300);

// ปุ่ม yes / no
function growStepClick(button) {
    let currentWidth = button.offsetWidth;
    let growStep = 100;
    let newWidth = currentWidth + growStep;
    button.style.width = newWidth + "px";
    button.style.height = newWidth + "px";

    if (newWidth >= window.innerWidth || newWidth >= window.innerHeight) {
        setTimeout(() => { window.location.href = "card3.php"; }, 500);
    }
}

const yesButton = document.getElementById("yes");
const noButton = document.getElementById("no");

yesButton.addEventListener("click", function() { growStepClick(this); });

// ปุ่ม No หนีเมาส์
noButton.addEventListener("mouseenter", function () {
    const x = Math.random() * (window.innerWidth - this.offsetWidth);
    const y = Math.random() * (window.innerHeight - this.offsetHeight);
    this.style.transform = `translate(${x - this.offsetLeft}px, ${y - this.offsetTop}px)`;
});

noButton.addEventListener("click", function () { growStepClick(yesButton); });
</script>

</body>
</html>
