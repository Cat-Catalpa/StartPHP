<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,minimum-scale=1.0">
        <meta name="description" content="StartPHP是一款轻量化、易上手、完善化的PHP后端开发框架">
        <title>Welcome!</title>
        <style>
            p{
                line-height: 1em;
                font-size: 42px;
            }
            .div{
                text-align: center;
                position: fixed;
                top: 50%;
                left: 50%;
                width: 666px;
                height: 400px;
                margin-left: -333px;
                margin-top: -200px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .title {
        	    animation:move 1.5s infinite;
        	    -webkit-animation:title 2s infinite 0.2s;
            }
            
            @keyframes move{
            	0% {transform: translate(0px, 0px);}
                50% {transform: translate(0px, -10px);}
            	100% {transform: translate(0px, 0px);}
            	
            }
            
            /*Safari 和 Chrome:*/
            @-webkit-keyframes title
            {
            	0% {transform: translate(0px, 0px);}
                50% {transform: translate(0px, -10px);}
            	100% {transform: translate(0px, 0px);}
            }
            .move {
        	    animation:move 1.5s infinite;
        	    -webkit-animation:mymove 2s infinite;
            }
            
            @keyframes move{
            	0% {transform: translate(0px, 0px);}
                50% {transform: translate(0px, -10px);}
            	100% {transform: translate(0px, 0px);}
            	
            }
            
            /*Safari 和 Chrome:*/
            @-webkit-keyframes mymove
            {
            	0% {transform: translate(0px, 0px);}
                50% {transform: translate(0px, -10px);}
            	100% {transform: translate(0px, 0px);}
            }
        </style>
    </head>
    <body>
        <div class="div">
            <div>
                <p class="title">Welcome to {{%frame_work_name}} {{%version}}!</p>
                <p class="move">ˇ</p>
            </div>
        </div>
    </body>
</html>