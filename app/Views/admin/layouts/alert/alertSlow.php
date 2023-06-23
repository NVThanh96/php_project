<style>
    body {
        min-height: 100vh;
        font-family: Roboto, Arial;
        color: #ADAFB6;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(249, 251, 255,0.6);
    }

    .boxes {
        height: 32px;
        width: 32px;
        position: relative;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        margin-top: 32px;
        -webkit-transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
        transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
    }
    .boxes .box {
        width: 32px;
        height: 32px;
        top: 0px;
        left: 0;
        position: absolute;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }



    .boxes .box:nth-child(1) {
        -webkit-transform: translate(100%, 0);
        transform: translate(100%, 0);
        -webkit-animation: box1 1s linear infinite;
        animation: box1 1s linear infinite;
    }
    .boxes .box:nth-child(2) {
        -webkit-transform: translate(0, 100%);
        transform: translate(0, 100%);
        -webkit-animation: box2 1s linear infinite;
        animation: box2 1s linear infinite;
    }
    .boxes .box:nth-child(3) {
        -webkit-transform: translate(100%, 100%);
        transform: translate(100%, 100%);
        -webkit-animation: box3 1s linear infinite;
        animation: box3 1s linear infinite;
    }
    .boxes .box:nth-child(4) {
        -webkit-transform: translate(200%, 0);
        transform: translate(200%, 0);
        -webkit-animation: box4 1s linear infinite;
        animation: box4 1s linear infinite;
    }



    .boxes .box > div {
        background: #5C8DF6;
        --translateZ: 15.5px;
        --rotateY: 0deg;
        --rotateX: 0deg;
        position: absolute;
        width: 100%;
        height: 100%;
        background: #5C8DF6;
        top: auto;
        right: auto;
        bottom: auto;
        left: auto;
        -webkit-transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
        transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
    }

    .boxes .box > div:nth-child(1) {
        top: 0;
        left: 0;
        background: #5C8DF6;
    }
    .boxes .box > div:nth-child(2) {
        background: #145af2;
        right: 0;
        --rotateY: 90deg;
    }
    .boxes .box > div:nth-child(3) {
        background: #447cf5;
        --rotateX: -90deg;
    }
    .boxes .box > div:nth-child(4) {
        background: #DBE3F4;
        top: 0;
        left: 0;
        --translateZ: -90px;
    }
    </style>

<div class="content-wrapper">
    <div class="boxes">
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

</div>

<script>
    function showLoader() {
        document.getElementById("loader").style.display = "block";
    }

    function hideLoader() {
        document.getElementById("loader").style.display = "none";
    }
</script>

<script>
    function fetchData() {
        showLoader(); // Show the loader before fetching data

        // Perform your data fetching logic here
        // ...

        hideLoader(); // Hide the loader after data is fetched
    }

    fetchData(); // Call the function to start the operation
</script>
