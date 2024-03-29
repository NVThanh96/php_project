<style>
    @import url('https://fonts.googleapis.com/css?family=Lato|Russo+One');
    *, *:after, *:before {
        box-sizing: border-box;
    }
    body {
        padding: 0;
        margin: 0;
    }
    .container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }
    .container-star {
        background-image: linear-gradient(to bottom, #292256 0%, #8446cf 70%, #a871d6 100%);
    }
    .container-star:after {
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0) 40%, rgba(15, 10, 38, 0.2) 100%);
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
    }
    .star-1 {
        position: absolute;
        border-radius: 50%;
        background-color: #fff;
        animation: twinkle 5s infinite ease-in-out;
    }
    .star-1:after {
        height: 100%;
        width: 100%;
        transform: rotate(90deg);
        content: "";
        position: absolute;
        background-color: #fff;
        border-radius: 50%;
    }
    .star-1:before {
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0) 60%, rgba(255, 255, 255, 0) 100%);
        position: absolute;
        border-radius: 50%;
        content: "";
        top: -20%;
        left: -50%;
    }
    .star-1:nth-of-type(1) {
        top: 89vh;
        left: 50vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(1):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(2) {
        top: 45vh;
        left: 53vw;
        width: 6px;
        height: 2px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(2):before {
        width: 12px;
        height: 12px;
        top: -250%;
    }
    .star-1:nth-of-type(3) {
        top: 32vh;
        left: 49vw;
        width: 7px;
        height: 2.3333333333px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(3):before {
        width: 14px;
        height: 14px;
        top: -250%;
    }
    .star-1:nth-of-type(4) {
        top: 64vh;
        left: 61vw;
        width: 9px;
        height: 3px;
        animation-delay: 5s;
    }
    .star-1:nth-of-type(4):before {
        width: 18px;
        height: 18px;
        top: -250%;
    }
    .star-1:nth-of-type(5) {
        top: 18vh;
        left: 41vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(5):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(6) {
        top: 45vh;
        left: 94vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(6):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-1:nth-of-type(7) {
        top: 91vh;
        left: 77vw;
        width: 7px;
        height: 2.3333333333px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(7):before {
        width: 14px;
        height: 14px;
        top: -250%;
    }
    .star-1:nth-of-type(8) {
        top: 58vh;
        left: 87vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(8):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-1:nth-of-type(9) {
        top: 12vh;
        left: 93vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(9):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-1:nth-of-type(10) {
        top: 59vh;
        left: 89vw;
        width: 7px;
        height: 2.3333333333px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(10):before {
        width: 14px;
        height: 14px;
        top: -250%;
    }
    .star-1:nth-of-type(11) {
        top: 72vh;
        left: 9vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(11):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(12) {
        top: 15vh;
        left: 79vw;
        width: 9px;
        height: 3px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(12):before {
        width: 18px;
        height: 18px;
        top: -250%;
    }
    .star-1:nth-of-type(13) {
        top: 51vh;
        left: 30vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(13):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(14) {
        top: 69vh;
        left: 71vw;
        width: 6px;
        height: 2px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(14):before {
        width: 12px;
        height: 12px;
        top: -250%;
    }
    .star-1:nth-of-type(15) {
        top: 84vh;
        left: 31vw;
        width: 6px;
        height: 2px;
        animation-delay: 2s;
    }
    .star-1:nth-of-type(15):before {
        width: 12px;
        height: 12px;
        top: -250%;
    }
    .star-1:nth-of-type(16) {
        top: 64vh;
        left: 56vw;
        width: 9px;
        height: 3px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(16):before {
        width: 18px;
        height: 18px;
        top: -250%;
    }
    .star-1:nth-of-type(17) {
        top: 23vh;
        left: 6vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(17):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-1:nth-of-type(18) {
        top: 25vh;
        left: 13vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(18):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(19) {
        top: 55vh;
        left: 49vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(19):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(20) {
        top: 24vh;
        left: 1vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 1s;
    }
    .star-1:nth-of-type(20):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(21) {
        top: 19vh;
        left: 61vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(21):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(22) {
        top: 76vh;
        left: 86vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 5s;
    }
    .star-1:nth-of-type(22):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(23) {
        top: 51vh;
        left: 84vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(23):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(24) {
        top: 62vh;
        left: 68vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(24):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(25) {
        top: 10vh;
        left: 88vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 3s;
    }
    .star-1:nth-of-type(25):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-1:nth-of-type(26) {
        top: 54vh;
        left: 2vw;
        width: 6px;
        height: 2px;
        animation-delay: 4s;
    }
    .star-1:nth-of-type(26):before {
        width: 12px;
        height: 12px;
        top: -250%;
    }
    .star-1:nth-of-type(27) {
        top: 9vh;
        left: 92vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 5s;
    }
    .star-1:nth-of-type(27):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(28) {
        top: 32vh;
        left: 45vw;
        width: 8px;
        height: 2.6666666667px;
        animation-delay: 4s;
    }
    .star-1:nth-of-type(28):before {
        width: 16px;
        height: 16px;
        top: -250%;
    }
    .star-1:nth-of-type(29) {
        top: 94vh;
        left: 35vw;
        width: 5px;
        height: 1.6666666667px;
        animation-delay: 5s;
    }
    .star-1:nth-of-type(29):before {
        width: 10px;
        height: 10px;
        top: -250%;
    }
    .star-1:nth-of-type(30) {
        top: 96vh;
        left: 58vw;
        width: 4px;
        height: 1.3333333333px;
        animation-delay: 4s;
    }
    .star-1:nth-of-type(30):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2 {
        position: absolute;
        border-radius: 50%;
        background-color: #fff;
        animation: twinkle 5s infinite ease-in-out;
    }
    .star-2:nth-of-type(31) {
        top: 77vh;
        left: 11vw;
        width: 4px;
        height: 4px;
        animation-delay: 4s;
    }
    .star-2:nth-of-type(31):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(32) {
        top: 56vh;
        left: 23vw;
        width: 4px;
        height: 4px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(32):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(33) {
        top: 23vh;
        left: 7vw;
        width: 4px;
        height: 4px;
        animation-delay: 2s;
    }
    .star-2:nth-of-type(33):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(34) {
        top: 99vh;
        left: 14vw;
        width: 3px;
        height: 3px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(34):before {
        width: 6px;
        height: 6px;
        top: -250%;
    }
    .star-2:nth-of-type(35) {
        top: 50vh;
        left: 25vw;
        width: 3px;
        height: 3px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(35):before {
        width: 6px;
        height: 6px;
        top: -250%;
    }
    .star-2:nth-of-type(36) {
        top: 70vh;
        left: 62vw;
        width: 4px;
        height: 4px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(36):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(37) {
        top: 19vh;
        left: 6vw;
        width: 4px;
        height: 4px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(37):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(38) {
        top: 6vh;
        left: 54vw;
        width: 2px;
        height: 2px;
        animation-delay: 2s;
    }
    .star-2:nth-of-type(38):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(39) {
        top: 38vh;
        left: 65vw;
        width: 4px;
        height: 4px;
        animation-delay: 4s;
    }
    .star-2:nth-of-type(39):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(40) {
        top: 48vh;
        left: 38vw;
        width: 3px;
        height: 3px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(40):before {
        width: 6px;
        height: 6px;
        top: -250%;
    }
    .star-2:nth-of-type(41) {
        top: 53vh;
        left: 6vw;
        width: 4px;
        height: 4px;
        animation-delay: 4s;
    }
    .star-2:nth-of-type(41):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(42) {
        top: 65vh;
        left: 81vw;
        width: 3px;
        height: 3px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(42):before {
        width: 6px;
        height: 6px;
        top: -250%;
    }
    .star-2:nth-of-type(43) {
        top: 86vh;
        left: 6vw;
        width: 2px;
        height: 2px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(43):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(44) {
        top: 62vh;
        left: 36vw;
        width: 4px;
        height: 4px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(44):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(45) {
        top: 79vh;
        left: 12vw;
        width: 4px;
        height: 4px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(45):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(46) {
        top: 100vh;
        left: 38vw;
        width: 4px;
        height: 4px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(46):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(47) {
        top: 44vh;
        left: 7vw;
        width: 2px;
        height: 2px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(47):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(48) {
        top: 12vh;
        left: 18vw;
        width: 2px;
        height: 2px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(48):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(49) {
        top: 82vh;
        left: 21vw;
        width: 3px;
        height: 3px;
        animation-delay: 1s;
    }
    .star-2:nth-of-type(49):before {
        width: 6px;
        height: 6px;
        top: -250%;
    }
    .star-2:nth-of-type(50) {
        top: 63vh;
        left: 49vw;
        width: 2px;
        height: 2px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(50):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(51) {
        top: 42vh;
        left: 79vw;
        width: 2px;
        height: 2px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(51):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(52) {
        top: 73vh;
        left: 69vw;
        width: 4px;
        height: 4px;
        animation-delay: 4s;
    }
    .star-2:nth-of-type(52):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(53) {
        top: 19vh;
        left: 47vw;
        width: 4px;
        height: 4px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(53):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(54) {
        top: 97vh;
        left: 4vw;
        width: 4px;
        height: 4px;
        animation-delay: 4s;
    }
    .star-2:nth-of-type(54):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(55) {
        top: 23vh;
        left: 56vw;
        width: 4px;
        height: 4px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(55):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(56) {
        top: 73vh;
        left: 26vw;
        width: 4px;
        height: 4px;
        animation-delay: 2s;
    }
    .star-2:nth-of-type(56):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(57) {
        top: 45vh;
        left: 11vw;
        width: 4px;
        height: 4px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(57):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(58) {
        top: 38vh;
        left: 19vw;
        width: 2px;
        height: 2px;
        animation-delay: 5s;
    }
    .star-2:nth-of-type(58):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .star-2:nth-of-type(59) {
        top: 61vh;
        left: 2vw;
        width: 4px;
        height: 4px;
        animation-delay: 3s;
    }
    .star-2:nth-of-type(59):before {
        width: 8px;
        height: 8px;
        top: -250%;
    }
    .star-2:nth-of-type(60) {
        top: 89vh;
        left: 96vw;
        width: 2px;
        height: 2px;
        animation-delay: 2s;
    }
    .star-2:nth-of-type(60):before {
        width: 4px;
        height: 4px;
        top: -250%;
    }
    .container-title {
        width: 600px;
        height: 450px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        color: white;
        line-height: 1;
        font-weight: 700;
        text-align: center;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        display: flex;
    }
    .title > * {
        display: inline-block;
        font-size: 200px;
    }
    .number {
        text-shadow: 20px 20px 20px rgba(0, 0, 0, 0.2);
        padding: 0 0.2em;
        font-family: 'Russo One', sans-serif;
    }
    .subtitle {
        font-size: 25px;
        margin-top: 1.5em;
        font-family: "Lato", sans-serif;
        text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
    }
    button {
        font-size: 22px;
        margin-top: 1.5em;
        padding: 0.5em 1em;
        letter-spacing: 1px;
        font-family: "Lato", sans-serif;
        color: white;
        background-color: transparent;
        border: 0;
        cursor: pointer;
        z-index: 999;
        border: 2px solid white;
        border-radius: 5px;
        text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.2);
        transition: opacity 0.2s ease;
    }
    button:hover {
        opacity: 0.7;
    }
    button:focus {
        outline: 0;
    }
    .moon {
        position: relative;
        border-radius: 50%;
        width: 160px;
        height: 160px;
        z-index: 2;
        background-color: #fff;
        box-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 70px #fff, 0 0 80px #fff, 0 0 100px #f17;
        animation: rotate 5s ease-in-out infinite;
    }
    .moon .face {
        top: 60%;
        left: 47%;
        position: absolute;
    }
    .moon .face .mouth {
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-top-right-radius: 50%;
        background-color: #5c3191;
        width: 25px;
        height: 25px;
        position: absolute;
        animation: snore 5s ease-in-out infinite;
        transform: rotate(45deg);
        box-shadow: inset -4px -4px 4px rgba(0, 0, 0, 0.3);
    }
    .moon .face .eyes {
        position: absolute;
        top: -30px;
        left: -30px;
    }
    .moon .face .eyes .eye-left, .moon .face .eyes .eye-right {
        border: 4px solid #5c3191;
        width: 30px;
        height: 15px;
        border-bottom-left-radius: 100px;
        border-bottom-right-radius: 100px;
        border-top: 0;
        position: absolute;
    }
    .moon .face .eyes .eye-left:before, .moon .face .eyes .eye-right:before, .moon .face .eyes .eye-left:after, .moon .face .eyes .eye-right:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        width: 4px;
        height: 4px;
        background-color: #5c3191;
        top: -2px;
        left: -4px;
    }
    .moon .face .eyes .eye-left:after, .moon .face .eyes .eye-right:after {
        left: auto;
        right: -4px;
    }
    .moon .face .eyes .eye-right {
        left: 50px;
    }
    .container-bird {
        perspective: 2000px;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }
    .bird {
        position: absolute;
        z-index: 1000;
        left: 50%;
        top: 50%;
        height: 40px;
        width: 50px;
        transform: translate3d(-100vw, 0, 0) rotateY(90deg);
        transform-style: preserve-3d;
    }
    .bird-container {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transform: translate3d(50px, 30px, -300px);
    }
    .wing {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        border-radius: 3px;
        transform-style: preserve-3d;
        transform-origin: center bottom;
        z-index: 300;
    }
    .wing-left {
        background: linear-gradient(to bottom, #a58dc4 0%, #7979a8 100%);
        transform: translate3d(0, 0, 0) rotateX(-30deg);
        animation: wingLeft 1.3s cubic-bezier(0.45, 0, 0.5, 0.95) infinite;
    }
    .wing-right {
        background: linear-gradient(to bottom, #d9d3e2 0%, #b8a5d1 100%);
        transform: translate3d(0, 0, 0) rotateX(-30deg);
        animation: wingRight 1.3s cubic-bezier(0.45, 0, 0.5, 0.95) infinite;
    }
    .wing-right-top, .wing-left-top {
        border-right: 25px solid transparent;
        border-left: 25px solid transparent;
        top: -20px;
        width: 100%;
        position: absolute;
        transform-origin: 100% 100%;
    }
    .wing-right-top {
        border-bottom: 20px solid #b8a5d1;
        transform: translate3d(0, 0, 0) rotateX(60deg);
        animation: wingRightTop 1.3s cubic-bezier(0.45, 0, 0.5, 0.95) infinite;
    }
    .wing-left-top {
        border-bottom: 20px solid #7979a8;
        transform: translate3d(0, 0, 0) rotateX(-60deg);
        animation: wingLeftTop 1.3s cubic-bezier(0.45, 0, 0.5, 0.95) infinite;
    }
    .bird-anim:nth-child(1) {
        animation: bird1 30s linear infinite forwards;
    }
    .bird-anim:nth-child(2) {
        animation: bird2 30s linear infinite forwards;
        animation-delay: 3s;
        z-index: -1;
    }
    .bird-anim:nth-child(3) {
        animation: bird3 30s linear infinite forwards;
        animation-delay: 5s;
    }
    .bird-anim:nth-child(4) {
        animation: bird4 30s linear infinite forwards;
        animation-delay: 7s;
    }
    .bird-anim:nth-child(5) {
        animation: bird5 30s linear infinite forwards;
        animation-delay: 14s;
    }
    .bird-anim:nth-child(6) {
        animation: bird6 30s linear infinite forwards;
        animation-delay: 10s;
        z-index: -1;
    }
    @keyframes rotate {
        0%, 100% {
            transform: rotate(-8deg);
        }
        50% {
            transform: rotate(0deg);
        }
    }
    @keyframes snore {
        0%, 100% {
            transform: scale(1) rotate(30deg);
        }
        50% {
            transform: scale(0.5) rotate(30deg);
            border-bottom-left-radius: 50%;
        }
    }
    @keyframes twinkle {
        0%, 100% {
            opacity: 0.7;
        }
        50% {
            opacity: 0.3;
        }
    }
    @keyframes wingLeft {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotateX(-50deg);
        }
        50% {
            transform: translate3d(0, -20px, 0) rotateX(-130deg);
            background: linear-gradient(to bottom, #d9d3e2 0%, #b8a5d1 100%);
        }
    }
    @keyframes wingLeftTop {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotateX(-10deg);
        }
        50% {
            transform: translate3d(0px, 0px, 0) rotateX(-40deg);
            border-bottom: 20px solid #b8a5d1;
        }
    }
    @keyframes wingRight {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotateX(50deg);
        }
        50% {
            transform: translate3d(0, -20px, 0) rotateX(130deg);
            background: linear-gradient(to bottom, #a58dc4 0%, #7979a8 100%);
        }
    }
    @keyframes wingRightTop {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotateX(10deg);
        }
        50% {
            transform: translate3d(0px, 0px, 0px) rotateX(40deg);
            border-bottom: 20px solid #7979a8;
        }
    }
    @keyframes bird1 {
        0% {
            transform: translate3d(-120vw, -20px, -1000px) rotateY(-40deg) rotateX(0deg);
        }
        100% {
            transform: translate3d(100vw, -40vh, 1000px) rotateY(-40deg) rotateX(0deg);
        }
    }
    @keyframes bird2 {
        0%, 15% {
            transform: translate3d(100vw, -300px, -1000px) rotateY(10deg) rotateX(0deg);
        }
        100% {
            transform: translate3d(-100vw, -20px, -1000px) rotateY(10deg) rotateX(0deg);
        }
    }
    @keyframes bird3 {
        0% {
            transform: translate3d(100vw, -50vh, 100px) rotateY(-5deg) rotateX(-20deg);
        }
        100% {
            transform: translate3d(-100vw, -10vh, 100px) rotateY(-5deg) rotateX(-20deg);
        }
    }
    @keyframes bird4 {
        0% {
            transform: translate3d(100vw, 30vh, 200px) rotateY(-5deg) rotateX(10deg);
        }
        100% {
            transform: translate3d(-100vw, -30vh, 200px) rotateY(-5deg) rotateX(10deg);
        }
    }
    @keyframes bird5 {
        0%, 5% {
            transform: translate3d(100vw, 30vh, 400px) rotateY(-15deg) rotateX(-10deg);
        }
        100% {
            transform: translate3d(-100vw, 10vh, 400px) rotateY(-15deg) rotateX(-10deg);
        }
    }
    @keyframes bird6 {
        0%, 10% {
            transform: translate3d(-100vw, 20vh, -500px) rotateY(15deg) rotateX(10deg);
        }
        100% {
            transform: translate3d(100vw, 40vh, -800px) rotateY(5deg) rotateX(10deg);
        }
    }
    @media screen and (max-width: 580px) {
        .container-404 {
            width: 100%;
        }
        .number {
            font-size: 100px;
        }
        .subtitle {
            font-size: 20px;
            padding: 0 1em;
        }
        .moon {
            width: 100px;
            height: 100px;
        }
        .face {
            transform: scale(0.7);
        }
    }
     .btn {
         font-size: 15px;
         margin: 20px 0;
         padding: 10px 20px;
         border-radius: 5px;
         text-decoration: none;
         color: white;
     }

    .btn-back {
        background-color: transparent;
        border: none;
    }

    .btn-back:hover {
        background-color: rgb(48 , 36, 98);
    }

</style>

<div class="container container-star">
    <?php for ($i = 1; $i <= 30; $i++): ?>
        <div class="star-1"></div>
    <?php endfor; ?>
    <?php for ($i = 1; $i <= 30; $i++): ?>
        <div class="star-2"></div>
    <?php endfor; ?>
</div>

<div class="container container-bird">
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <div class="bird bird-anim">
            <div class="bird-container">
                <div class="wing wing-left">
                    <div class="wing-left-top"></div>
                </div>
                <div class="wing wing-right">
                    <div class="wing-right-top"></div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<div class="container-title">
    <div class="title">
        <div class="number">4</div>
        <div class="moon">
            <div class="face">
                <div class="mouth"></div>
                <div class="eyes">
                    <div class="eye-left"></div>
                    <div class="eye-right"></div>
                </div>
            </div>
        </div>
        <div class="number">4</div>
    </div>
    <div class="subtitle">Oops. Looks like you took a wrong turn.</div>
    <a class="btn btn-back" href="/admin">Go back</a>
</div>

