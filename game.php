<!DOCTYPE html>
<html>
  <head>
    <style>
      #game-container {
        width: 500px;
        height: 400px;
        margin: 0 auto;
        border: 1px solid black;
        position: relative;
      }
      .rabbit {
        width: 50px;
        height: 50px;
        position: absolute;
        bottom: 0;
        left: 0;
        background-image: url('rabbit.png');
        background-size: cover;
      }
      .carrot {
        width: 25px;
        height: 25px;
        position: absolute;
        top: 50px;
        right: 50px;
        background-image: url('carrot.png');
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <div id="game-container">
      <div class="rabbit" id="rabbit"></div>
      <div class="carrot" id="carrot"></div>
    </div>
    <script>
      const rabbit = document.getElementById('rabbit');
      const carrot = document.getElementById('carrot');

      document.addEventListener('keydown', event => {
        switch (event.keyCode) {
          case 37: // left arrow
            rabbit.style.left = `${rabbit.offsetLeft - 10}px`;
            break;
          case 38: // up arrow
            rabbit.style.bottom = `${rabbit.offsetHeight + 10}px`;
            break;
          case 39: // right arrow
            rabbit.style.left = `${rabbit.offsetLeft + 10}px`;
            break;
          case 40: // down arrow
            rabbit.style.bottom = `${rabbit.offsetHeight - 10}px`;
            break;
        }

        if (isCollision(rabbit, carrot)) {
          alert('You caught the carrot!');
        }
      });

      function isCollision(rabbit, carrot) {
        const rabbitRect = rabbit.getBoundingClientRect();
        const carrotRect = carrot.getBoundingClientRect();

        return (
          rabbitRect.left < carrotRect.right &&
          rabbitRect.right > carrotRect.left &&
          rabbitRect.top < carrotRect.bottom &&
          rabbitRect.bottom > carrotRect.top
        );
      }
    </script>
  </body>
</html>
