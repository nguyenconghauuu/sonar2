<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fragment+Mono&display=swap" rel="stylesheet">
</head>
<style>
    html,body{
        margin:0;
        padding:0;
        font-family: 'Fragment Mono', monospace;
    }
    .header{
        width:100%;
        height:120px;
        background-color:red;
        display:flex;
    }
    .header-logo{
        width:12.5%;
        height:88px;
        margin:16px 0px 0px 2%;
    }
    .header-logo img{
        width:100%;
        height:88px;
    }
    .header-top-bar{
        width:30%;
        height:88px;
        background-color: bisque;
        margin:16px 0px 0px 12.5%;
    }
    .header-top-bar a{
        text-decoration:none;
    }
    .header-top-bar ul{
        margin:0px;
        padding:0px;
    }
    .header-top-bar li{
        list-style-type:none;
        display:inline-block;
        line-height: 88px;
        margin-right:20px;
    }
    .list-top-bar{
        width:30%;
        height:auto;
        background-color: blue;
        z-index:10;
        margin-top:5px;
        position:absolute;
        display:none;
    }
    .list-top-bar ul{
        margin:0;
        padding:0;
    }
    .list-top-bar li{
        width:80px;
        height:50px;
        list-style-type:none;
        margin:0px 15px 0px 12.5px;
    }
    .list-top-bar.active{
        display: block;
    }
    .header-search{
        width:20%;
        height:88px;
        background-color: blueviolet;
        margin:16px 0px 0px 2%;
    }
    .header-button{
        width:15%;
        height:88px;
        background-color:brown;
        margin:16px 0px 0px 2%;
    }




    /*  */
    .container{
        width:100%;
        height:500px;
        background-color: aqua;
        display:flex;
        padding:0px 75px 0px 75px;
    }
    .nav-bar{
        width:20%;
        height:500px;
        background-color: black;
    }
    .content-main{
        width:60%;
        height:500px;
        background-color: antiquewhite;
    }
    .content-button{
        width:10%;
        height:500px;
        background-color: blue;
    }
    .footer{
        width:100%;
        height:300px;
        background-color:red;
    }
</style>
<body>
    <div class="header">
        <div class="header-logo">
            <img src="./hls.jpg" alt="">
        </div>
        <div class="header-top-bar">
            <ul>
                <li onclick="myClick1()">HTML</li>
                <li onclick="myClick2()">CSS</li>
                <li onclick="myClick3()">JavaScript</li>
                <li onclick="myClick4()">SQL</li>
                <li onclick="myClick5()">Làm Quiz</li>
            </ul>
            <div class="list-top-bar" id="list-top-bar-1">
                <ul>
                    <li>Bai 1</li>
                    <li>Bai 2</li>
                    <li>Bai 3</li>
                    <li>Bai 4</li>
                    <li>Bai 5</li>
                    <li>Bai 6</li>
                </ul>
            </div>
            <div class="list-top-bar" id="list-top-bar-2">
                <ul>
                    <li>Bai 1</li>
                    <li>Bai 2</li>
                    <li>Bai 3</li>
                    <li>Bai 4</li>
                    <li>Bai 5</li>
                    <li>Bai 6</li>
                </ul>
            </div>
            <div class="list-top-bar" id="list-top-bar-3"></div>
            <div class="list-top-bar" id="list-top-bar-4"></div>
            <div class="list-top-bar" id="list-top-bar-5"></div>
        </div>
        <div class="header-search"></div>
        <div class="header-button"></div>
    </div>
    <div class="container">
        <div class="nav-bar"></div>
        <div class="content-main"></div>
        <div class="content-button"></div>
    </div>
    <div class="footer"></div>
</body>
</html>

<script>
    function myClick1(){
        let element = document.getElementById('list-top-bar-1').classList.toggle('active');
    }
    function myClick2(){
        let element = document.getElementById('list-top-bar-2').classList.toggle('active');
    }
    function myClick3(){
        let element = document.getElementById('list-top-bar-3').classList.toggle('active');
    }
    function myClick4(){
        let element = document.getElementById('list-top-bar-4').classList.toggle('active');
    }
    function myClick5(){
        let element = document.getElementById('list-top-bar-5').classList.toggle('active');
    }
</script>