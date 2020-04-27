<!DOCTYPE html>
<html>
<head>

<title>TechSideOnline.com HTML CSS Image Slider</title>
	<link href="style.css" rel="stylesheet">

<style>
.slide-holder
{
	width:400px;  /*set the size of our slide holder*/
	height:200px;
	background-color:black;
	margin:auto;
	overflow:hidden;  /*overflow set to hidden*/
}

.slide-group {
	width:1600px; /*width of our images combined*/
	height:400px;
	position:relative; /*position relative to parent*/
	clear:both;
	z-index:0; /*set the z-index */
	left: 0px; /*position the slide-group to the first image */
}

.slide-image { /*setup our individual images*/
	float:left;
	margin:0px; 
	padding:0px;
	position:relative; 
	z-index:1; 
}
.slide-button-holder {
	position: relative;
	z-index:2;
	text-align:center;
	top:-220px;
	background: rgba(0, 0, 0, 0.7);
}

.slider-button {
	display:inline-block;
	height:10px;
	width:10px;
	background-color:#fff;
	border-radius:10px;
}

.slider-button:hover {
	background-color:#ccc;
}
/*use the :target selector to set the left position of our .slide-group  */
#slide-1:target ~ .slide-group{ /*first button moves it to initial position*/
	left:0px; 
}
#slide-2:target ~ .slide-group{ /*second image starts at 400px */
	left:-400px;

}
#slide-3:target ~ .slide-group{ /*third image starts at 800px */
	left:-800px;

}
#slide-3:target ~ .slide-group{ /*third image starts at 800px */
	left:-1200px;

}
.slide-group {
	width:1200px;
	height:400px;
	position:relative;
	clear:both;
	z-index:0;
	left:0px;

        /*set transition property for all browsers */
        -webkit-transition: left 2s;
        -moz-transition: left 2s;
        -o-transition: left 2s;
         transition: left 2s;
}
/*slide-group CSS animation property*/
.slide-group {
	width:1600px;
	height:400px;
	position:relative;
	clear:both;
	z-index:0;
	left:0px;

	/* add following CSS animation properties */
        animation-direction: alternate;  /*go forwards and backwards*/
	animation:animate 12s infinite;   /*call keyframe "animate" (see below)
 - total animation length 12 seconds*/

	-webkit-animation-direction: alternate; /* chrome support */
	-webkit-animation:animate 12s infinite;

         /*   commented out transition properties
           -webkit-transition: left 2s;
            -moz-transition: left 2s;
            -o-transition: left 2s;
            transition: left 2s;   */
}

/*Add keyframes to animate the images*/

@keyframes animate {
    0% {left:0px;}   /*first image */
    6% {left:0px;}
    15% {left:-400px;}  /*second image */
    21% {left:-400px;}
    30% {left:-800px;}  /*third image */
    36% {left:-800px;}
    45% {left:-1200px;}   /*forth image */
    51% {left:-1200px;}
    66% {left:-800px;}  /*third image */
    65% {left:-800px;}
    76% {left:-400px;}  /*second image*/
    80% {left:-4000px;}
    100% {left:0px;}  /*first image*/
}

/* chrome support */
@-webkit-keyframes animate {
    0% {left:0px;}   /*first image */
    6% {left:0px;}
    15% {left:-400px;}  /*second image */
    21% {left:-400px;}
    30% {left:-800px;}  /*third image */
    36% {left:-800px;}
    45% {left:-1200px;}   /*forth image */
    51% {left:-1200px;}
    66% {left:-800px;}  /*third image */
    65% {left:-800px;}
    76% {left:-400px;}  /*second image*/
    80% {left:-4000px;}
    100% {left:0px;}  /*first image*/
}
</style>
	
</head>
<body>
<div class="slide-holder">
	<span id="slide-1"></span>
        <span id="slide-2"></span>
        <span id="slide-3"></span>
        <span id="slide-4"></span>
	<div class="slide-group">
		<img src="img/E.png" class="slide-image" id="slide-1" /><img src="img/G.png" class="slide-image" id="slide-2"/><img src="img/H.png" class="slide-image" id="slide-3"/><img src="img/P.png" class="slide-image" id="slide-4" />
	</div>
	<div class="slide-button-holder">
		<a href="#slide-1" class="slider-button"></a>
		<a href="#slide-2" class="slider-button"></a>
		<a href="#slide-3" class="slider-button"></a>
        <a href="#slide-4" class="slider-button"></a>
	</div>
</div>
</body>
</html>
