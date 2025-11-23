<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valentine Card</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600&display=swap');

    body {
      font-family: 'Prompt', sans-serif;
      background: linear-gradient(135deg, #ff4da6, #ff66b2);
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      transition: opacity 1s ease;
      overflow: hidden;
      user-select: none;
    }

    h2 {
      margin-bottom: 20px;
    }

    #puzzle-container {
      position: relative;
      width: 300px;
      height: 420px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(4, 1fr);
      gap: 2px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.6s ease, opacity 0.6s ease;
    }

    .piece {
      width: 100%;
      height: 100%;
      background-image: url("mem/smile.jpg");
      background-size: 300px 420px;
      cursor: grab;
      border-radius: 3px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      user-select: none;
    }

    .selected {
      outline: 3px solid #ff66b2;
      transform: scale(1.05);
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
    }

    .locked {
      pointer-events: none;
      opacity: 1;
      border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .completed {
      transform: scale(1.1);
      opacity: 0;
    }

    .card {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(8px);
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      max-width: 320px;
      width: 90%;
      animation: fadeIn 1s ease forwards;
    }

    .card img {
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    button {
      margin-top: 25px;
      background: white;
      color: #ff3399;
      border: none;
      padding: 12px 25px;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      box-shadow:
        0 4px 6px rgba(0, 0, 0, 0.15),
        0 -4px 6px rgba(255, 255, 255, 0.6);
      transition: all 0.3s ease;
    }

    button:hover {
      background: #ff3399;
      color: white;
      transform: scale(1.05);
    }

    button:active {
      transform: scale(0.98);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    @media (max-width: 480px) {
      #puzzle-container { width: 260px; height: 360px; }
      .piece { background-size: 260px 360px; }
      .card { max-width: 280px; }
      button { font-size: 14px; padding: 10px 20px; }
    }
  </style>
</head>

<body>
  <h2 id="title">ต่อจิ๊กซอว์ความทรงจำ 💞</h2>

  <div id="puzzle-container"></div>

  <div id="complete-card" class="card">
    <img src="mem/smile.jpg" alt="ความทรงจำ">
    <button onclick="goNext()">อ่านความในใจ →</button>
  </div>

  <script>
    const container = document.getElementById("puzzle-container");
    const completeCard = document.getElementById("complete-card");
    const title = document.getElementById("title");

    const rows = 4, cols = 3;
    const totalPieces = rows * cols;
    const pieces = [];

    for (let i = 0; i < totalPieces; i++) {
      const piece = document.createElement("div");
      piece.classList.add("piece");
      const x = (i % cols) * -(300 / cols);
      const y = Math.floor(i / cols) * -(420 / rows);
      piece.style.backgroundPosition = `${x}px ${y}px`;
      piece.dataset.correct = i;
      pieces.push(piece);
    }

    pieces.sort(() => Math.random() - 0.5);
    pieces.forEach(piece => container.appendChild(piece));

    function swapPieces(a, b) {
      const dragIndex = [...container.children].indexOf(a);
      const dropIndex = [...container.children].indexOf(b);
      if (dragIndex > dropIndex) {
        container.insertBefore(a, b);
        container.insertBefore(b, container.children[dragIndex + 1]);
      } else {
        container.insertBefore(b, a);
        container.insertBefore(a, container.children[dropIndex + 1]);
      }
      checkCorrectPositions();
    }


    function checkCorrectPositions() {
      const current = [...container.children];
      current.forEach((el, idx) => {
        if (Number(el.dataset.correct) === idx) {
          el.classList.add("locked");
          el.setAttribute("draggable", false);
        }
      });

      const isComplete = current.every((el, idx) => Number(el.dataset.correct) === idx);
      if (isComplete) {
        container.classList.add("completed");
        setTimeout(() => {
          container.style.display = "none";
          title.textContent = "ความทรงจำ 💞";
          completeCard.style.display = "flex";
        }, 700);
      }
    }

    const isMobile = /Android|iPhone|iPad|iPod|Windows Phone/i.test(navigator.userAgent);

    function addEvents() {
      const allPieces = document.querySelectorAll(".piece");

      if (isMobile) {
        let firstSelected = null;

        allPieces.forEach(piece => {
          piece.addEventListener("click", () => {
            if (!firstSelected) {
              firstSelected = piece;
              piece.classList.add("selected");
            } else if (piece === firstSelected) {
        
              piece.classList.remove("selected");
              firstSelected = null;
            } else {
              swapPieces(firstSelected, piece);
              firstSelected.classList.remove("selected");
              firstSelected = null;
            }
          });
        });

      } else {

        let dragSrc = null;
        allPieces.forEach(piece => {
          piece.setAttribute("draggable", true);

          piece.addEventListener("dragstart", function () {
            dragSrc = this;
            this.style.opacity = "0.5";
          });

          piece.addEventListener("dragend", function () {
            this.style.opacity = "1";
          });

          piece.addEventListener("dragover", function (e) {
            e.preventDefault();
          });

          piece.addEventListener("drop", function () {
            if (dragSrc !== this) swapPieces(dragSrc, this);
          });
        });
      }
    }

    addEvents();

    function goNext() {
      document.body.style.opacity = "0";
      setTimeout(() => {
        window.location.href = "card8.php";
      }, 800);
    }
  </script>
</body>
</html>
