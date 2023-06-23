<style>

    :root{
        --primaryColor : #744253;
        --lightPink : #F3D9DC;
        --darkPink : #C78283;
    }

    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .line{
        height: 16px;
        width: 150px;
        border-radius: 20px;
        background-color: var(--primaryColor);
    }
    .loader{
        display: flex;
        flex-direction: row;
        gap: 28px;
    }
    .one-loader{
        position: relative;
        height: 125px;
    }
    .v-line{
        width: 4px;
        height: 100px;
        background-color: var(--primaryColor);
        position: absolute;
    }

    .circle{
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: var(--lightPink);
        position: absolute;
        border: 2px solid var(--darkPink);
        bottom: 0;
        left: -12.5px;
    }

    .circle::before{
        content: '';
        position: absolute;
        background-color: #fff;
        height: 12.5px;
        width: 4px;
        border-radius: 100%;
        transform: rotate(45deg);
        left: 4px;
    }

    .h1-loading{
        color: var(--darkPink);
        animation: load .5s alternate infinite linear;
    }

    /* Animation */
    .first-line{
        animation: move-line 1s infinite;
    }

    .first-circle{
        animation: move-circle 1s infinite;
    }

    .last-line{
        animation: move-line-last 1s infinite;
        animation-delay: .5s;
    }

    .last-circle{
        animation: move-circle-last 1s infinite;
        animation-delay: .5s;
    }

    .middle-circle{
        animation: shake-circle .5s infinite;
        animation-delay: .5s;
    }

    .middle-line{
        animation: shake-line .5s infinite;
        animation-delay: .5s;
    }

    @keyframes load{
        0%{
            opacity: 0;
        }
        100%{
            opacity: 1;
        }
    }

    @keyframes move-circle{
        25% {
            transform: translateX(-70px) translateY(-40px);
        }
        50% {
            transform: translateX(0) translateY(0);
        }
    }

    @keyframes move-line{
        25% {
            transform: rotate(40deg) translateX(-40px);
        }
        50% {
            transform: rotate(0) translateX(0);
        }
    }

    @keyframes move-circle-last{
        25% {
            transform: translateX(70px) translateY(-40px);
        }
        50% {
            transform: translateX(0) translateY(0);
        }
    }

    @keyframes move-line-last{
        25% {
            transform: rotate(-40deg) translateX(40px);
        }
        50% {
            transform: rotate(0) translateX(0);
        }
    }

    @keyframes shake-circle{
        16% {
            transform: translateX(-1px);
        }
        32% {
            transform: translateX(1px);
        }
        50% {
            transform: translateX(0);
        }
    }
    @keyframes shake-line{
        16% {
            transform: rotate(1deg) translateX(-1px);
        }
        32% {
            transform: rotate(-1deg) translateX(1px);
        }
        50% {
            transform: rotate(0) translateX(0);
        }
    }

</style>

<div class="loading">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">

    <div class="container">
        <div class="line"></div>
        <div class="loader">
            <div class="one-loader first">
                <div class="v-line first-line"></div>
                <div class="circle first-circle"></div>
            </div>
            <div class="one-loader">
                <div class="v-line middle-line"></div>
                <div class="circle middle-circle"></div>
            </div>
            <div class="one-loader">
                <div class="v-line middle-line"></div>
                <div class="circle middle-circle"></div>
            </div>
            <div class="one-loader">
                <div class="v-line middle-line"></div>
                <div class="circle middle-circle"></div>
            </div>
            <div class="one-loader last">
                <div class="v-line last-line"></div>
                <div class="circle last-circle"></div>
            </div>
        </div>
        <h1 class="h1-loading">Loading</h1>
    </div>
</div>

