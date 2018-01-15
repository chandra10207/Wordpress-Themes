<?php
/*     404 page         */
 get_header();?>
<style type="text/css">
	
	body{
	                background: #fff;
	                color:#bdb1b1;
	                font-family: 'Open Sans', sans-serif;
	                height: 100vh;
	            }
	            .c{
	                text-align: center;
	                display: block;
	                position: relative;
	                /*width:80%;
	                margin: 60px auto 100px;*/
	                width: 100%;
                    position: absolute;
                    top: 50%;
                    transform: translate(0%,-50%);
	            }
	            ._404{
	                font-size: 220px;
	                position: relative;
	                display: inline-block;
	                z-index: 2;
	                height: 250px;
	                letter-spacing: 15px;
	            }
	            ._1{
	                text-align:center;
	                display:block;
	                position:relative;
	                letter-spacing: 12px;
	                font-size: 4em;
	                line-height: 80%;
	            }
	            ._2{
	                text-align:center;
	                display:block;
	                position: relative;
	                font-size: 20px;
	                margin-top: 12px;
	            }
	            .text{
	                font-size: 70px;
	                text-align: center;
	                position: relative;
	                display: inline-block;
	                margin: 19px 0px 0px 0px;
	                /* top: 256.301px; */
	                z-index: 3;
	                width: 100%;
	                line-height: 1.2em;
	                display: inline-block;
	            }
	           
                #main{
                	background-color: #ff4242;
                }
                .fusion-header {
                   background-color: #fff;
                   margin-top: 0;
                }
	            .btn{
	               /* background-color: ;*/
				    position: relative;
				    display: inline-block;
				    width: 358px;
				    padding: 5px;
				    z-index: 5;
				    font-size: 25px;
				    margin: 20px auto;
				    color: #911e21 ;
				    text-decoration: none;
				    margin-right: 10px;
	            }
	            .right{
	                float:right;
	                width:60%;
	            }
	            
	            hr{
	                padding: 0;
	                border: none;
	                border-top: 5px solid #fff;
	                color: #fff;
	                text-align: center;
	                margin: 0px auto;
	                width: 420px;
	                height:10px;
	                z-index: -10;
	            }
	            
	            .cloud {
	                width: 350px; height: 120px;
	                background: #911e21;
	                background: linear-gradient(top, #FFF 100%);
	                background: -webkit-linear-gradient(top, #FFF 100%);
	                background: -moz-linear-gradient(top, #FFF 100%);
	                background: -ms-linear-gradient(top, #FFF 100%);
	                background: -o-linear-gradient(top, #FFF 100%);
	                border-radius: 100px;
	                -webkit-border-radius: 100px;
	                -moz-border-radius: 100px;
	                position: absolute;
	                margin: 120px auto 20px;
	                z-index: 1;
	                transition: ease 1s;
	            }

	            .cloud:after, .cloud:before {
	                content: '';
	                position: absolute;
	                background: #911e21;
	                z-index: -1
	            }

	            .cloud:after {
	                width: 100px; height: 100px;
	                top: -50px; left: 50px;

	                border-radius: 100px;
	                -webkit-border-radius: 100px;
	                -moz-border-radius: 100px;
	            }

	            .cloud:before {
	                width: 180px; height: 180px;
	                top: -90px; right: 50px;

	                border-radius: 200px;
	                -webkit-border-radius: 200px;
	                -moz-border-radius: 200px;
	            }
	            
	            .x1 {
	                top:0px;
	                left:100px;
	                -webkit-transform: scale(0.3);
	                -moz-transform: scale(0.3);
	                transform: scale(0.3);
	                opacity: 0.9;
	                -webkit-animation: moveclouds 15s linear infinite;
	                -moz-animation: moveclouds 15s linear infinite;
	                -o-animation: moveclouds 15s linear infinite;
	            }
	            
	            .x1_5{
	                top:0px;
	                left:250px;
	                -webkit-transform: scale(0.3);
	                -moz-transform: scale(0.3);
	                transform: scale(0.3);
	                -webkit-animation: moveclouds 17s linear infinite;
	                -moz-animation: moveclouds 17s linear infinite;
	                -o-animation: moveclouds 17s linear infinite; 
	            }

	            .x2 {
	                left: 250px;
	                top:30px;
	                -webkit-transform: scale(0.6);
	                -moz-transform: scale(0.6);
	                transform: scale(0.6);
	                opacity: 0.6; 
	                -webkit-animation: moveclouds 25s linear infinite;
	                -moz-animation: moveclouds 25s linear infinite;
	                -o-animation: moveclouds 25s linear infinite;
	            }

	            .x3 {
	                left: 250px; bottom: -70px;

	                -webkit-transform: scale(0.6);
	                -moz-transform: scale(0.6);
	                transform: scale(0.6);
	                opacity: 0.8; 

	                -webkit-animation: moveclouds 25s linear infinite;
	                -moz-animation: moveclouds 25s linear infinite;
	                -o-animation: moveclouds 25s linear infinite;
	            }

	            .x4 {
	                left: 470px; botttom: 20px;

	                -webkit-transform: scale(0.75);
	                -moz-transform: scale(0.75);
	                transform: scale(0.75);
	                opacity: 0.75;

	                -webkit-animation: moveclouds 18s linear infinite;
	                -moz-animation: moveclouds 18s linear infinite;
	                -o-animation: moveclouds 18s linear infinite;
	            }

	            .x5 {
	                left: 200px; top: 300px;

	                -webkit-transform: scale(0.5);
	                -moz-transform: scale(0.5);
	                transform: scale(0.5);
	                opacity: 0.8; 

	                -webkit-animation: moveclouds 20s linear infinite;
	                -moz-animation: moveclouds 20s linear infinite;
	                -o-animation: moveclouds 20s linear infinite;
	            }

	            .fusion-header-wrapper{
	            	z-index: 0;
	            }

	            @-webkit-keyframes moveclouds {
	                0% {margin-left: 1000px;}
	                100% {margin-left: -1000px;}
	            }
	            @-moz-keyframes moveclouds {
	                0% {margin-left: 1000px;}
	                100% {margin-left: -1000px;}
	            }
	            @-o-keyframes moveclouds {
	                0% {margin-left: 1000px;}
	                100% {margin-left: -1000px;}
	            }

	            a.backTo:hover{
	            	color: #fff;
	            	opacity: 0.9;
	            }
	            /*admantic*/
	            #blogsWrap {
	                position: relative;
	                height: 85vh;
	                overflow: hidden;
	            }
	            #main {
	                padding: 0px;
	            }
	            .error404 .fusion-row {
	                max-width: 100% !important;
	            }
	            /*---------------------------------404 page----------------------------------*/
	            @media (max-width: 800px){
	            	header.fusion-header-wrapper {
	            	    z-index: 12;
	            	}
	            	#blogsWrap {
	            	    z-index: 10;
	            	}
	            }
	            @media (max-width: 400px){
	            	._404 {
	            	    font-size: 170px;
	            	    height: 200px;
	            	}
	            	hr {
	            	    width: 100%;
	            	}
	            	._1 {
	            	    padding-top: 20px;
	            	}
	            	.btn {
	            	    width: 100%;
	            	}
	            	.c{
	            		transform: scale(0.6);
	            		width: 100%;
	            		position: absolute;
	            		top: 0px;
	            	}
	            }
</style>


<div id="blogsWrap">
	
		<div id="clouds">
	           <div class="cloud x1"></div>
	           <div class="cloud x1_5"></div>
	           <div class="cloud x2"></div>
	           <div class="cloud x3"></div>
	           <div class="cloud x4"></div>
	           <div class="cloud x5"></div>
	       </div>
	       <div class='c'>
	           <div class='_404'>404</div>
	           <hr>
	           <div class='_1'>THE PAGE</div>
	           <div class='_2'>WAS NOT FOUND</div>
	           <a class='btn backTo btn-more btn-more-alt' href='<?php echo home_url(); ?>'>BACK TO HOMEPAGE</a>
	          <!--  <img src="<?php //bloginfo('stylesheet_directory'); ?>/images/aged-1.svg" style="position:absolute; left:0; right:0; z-index:1;"> -->
	       </div>
	<!-- 
	<div class="error-info">
		<h1>PAGE NOT FOUND</h1>
		<div class="error-page"><a class="more error" href="http://www.naphix.com/clients/landpearl/site1">GO BACK TO BLOG PAGE</a></div>
	</div> -->
</div>
<?php get_footer();?>