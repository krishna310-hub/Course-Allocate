<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @yield('content')

    <div class="spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>

    <style>
        .spinner {
        position: fixed;
        top: 10%;
        left: 5%;
      width: 70.4px;
      height: 70.4px;
      --clr: rgb(11, 11, 11);
      --clr-alpha: rgb(82, 81, 84);
      animation: spinner 1.6s infinite ease;
      transform-style: preserve-3d;
    }

    .spinner > div {
      background-color: var(--clr-alpha);
      height: 100%;
      position: absolute;
      width: 100%;
      border: 3.5px solid var(--clr);
    }

    .spinner div:nth-of-type(1) {
      transform: translateZ(-35.2px) rotateY(180deg);
    }

    .spinner div:nth-of-type(2) {
      transform: rotateY(-270deg) translateX(50%);
      transform-origin: top right;
    }

    .spinner div:nth-of-type(3) {
      transform: rotateY(270deg) translateX(-50%);
      transform-origin: center left;
    }

    .spinner div:nth-of-type(4) {
      transform: rotateX(90deg) translateY(-50%);
      transform-origin: top center;
    }

    .spinner div:nth-of-type(5) {
      transform: rotateX(-90deg) translateY(50%);
      transform-origin: bottom center;
    }

    .spinner div:nth-of-type(6) {
      transform: translateZ(35.2px);
    }

    @keyframes spinner {
      0% {
        transform: rotate(45deg) rotateX(-25deg) rotateY(25deg);
      }

      50% {
        transform: rotate(45deg) rotateX(-385deg) rotateY(25deg);
      }

      100% {
        transform: rotate(45deg) rotateX(-385deg) rotateY(385deg);
      }
    }
    </style>

</body>
</html>
