<!doctype html>
<html lan="en">
    
<!--    ADD CONTENT FOR ACCESSIBILITY-->
	<head>
    	<meta charset="UTF-8"/>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	 	<title>Dan LaFreniere Portfolio</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href='http://fonts.googleapis.com/css?family=Advent+Pro:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>     
    	<link rel="stylesheet" href="css/bootstrap.css">
    	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" href="images/AshTree-Logo.png" sizes="32x32">

    </head>
    
    <body>
        <div id="header">
            <div id="logo">
				<a href="index.php"><img alt="My site logo - an ash tree" id="treeLogo" src="images/AshTree-Logo.png"/></a>
				<a href="index.php"><img alt="Dan LaFreniere. Programmer. Designer. Researcher." id="nameLogo" src="images/LaFreniere-Logo.png"/></a>
            </div>
        
            <nav id="menu">
                <a class="primary-nav-trigger" href="#0"><span class="menu-text">Menu</span><span class="menu-icon"></span></a>
            </nav>
        
   	    </div>
        <nav>
	  	   	<ul class="primary-nav">
                <li id="firstItem"><a href="index.php#jumpto-About">About Me</a></li>
           	    <li><a href="index.php#jumpto-Projects">Projects</a></li>
                <li><a href="index.php#jumpto-Contact">Contact</a></li>
           	    <li class="primary-nav-title"><strong>Follow Me</strong></li>
           	    <li><a href="https://ca.linkedin.com/pub/daniel-lafreniere/72/403/469"><i class="social_linkedin_circle"></i></a>&nbsp;<a href="https://www.facebook.com/dan.lafreniere.56"><i class="social_facebook_circle"></i></a>&nbsp;<a href="https://twitter.com/JustLacksZazz"><i class="social_twitter_circle"></i></a>&nbsp;<a href="https://plus.google.com/+DanLaFreniere/posts"><i class="social_googleplus_circle"></i>
</a>&nbsp;<a href="https://github.com/danlafreniere"><i style="font-size: 35px; margin-bottom: -5px;" class="fa fa-github"></i></a></li>
	       </ul>
   	    </nav>
             
        <div id="blogHeader">

            <p>Backpropagation Neural Networks</p>
            <img id="featuredImage" src="images/Feature.png"/>

        </div>
        
        
        <div class="container topPadding"> 
            <h1>A SHORT INTRO</h1>
                 
            <p class="bodyText"><i>Please note: this post is a work in progress.</i></p>
       
            <p class="bodyText">Neural networks are handy when it comes to analyzing large amounts of data - especially in regard to classification of data or prediction. For the purposes of this post, we will focus on classification of the famous <a href="https://archive.ics.uci.edu/ml/datasets/Iris">Iris data set</a>. If you're not familiar with this set, it basically includes 3 classes of data (Iris Setosa, Iris Versicolour, and Iris Virginica) as well as 4 attributes (sepal length and width in cm and petal length and width in cm). If we were lucky and this data was linearly separable we would be able to classify the flowers using single-layer perceptrons. Unfortunately this isn't the case so a multi-layer backpropagation network is a great choice. It's easy to get intimidated when we hear the words "neural network" but the clean and easy-to-use Iris set gives us an awesome opportunity to try one out. That being said, it's still good to know NN basics before attempting a multi-layer network so please check out the basics by Googling around if you need a rundown. I also really dig the textbook <a href="https://mitpress.mit.edu/books/elements-artificial-neural-networks">Elements of Artificial Neural Networks</a> by Mehrotra, Mohan, and Ranka - it's great if you want a really comprehensive resource.</p>       
        </div>
        
        <div class="container"> 
            <h1>THE DATASET</h1>
            
            <p class="bodyText">Start out by downloading the Iris data set from the <a href="https://archive.ics.uci.edu/ml/machine-learning-databases/iris/">UCI repository</a>. It's important to note that the last column of this set is reserved for a string indicating which flower the particular row of data belongs to; seen here: </p>
            
            <p class="bodyText"><img class="img-responsive" src="images/data-screen.png"/></p>
            
            <p class="bodyText">In order to make things a little easier on ourselves, I recommend converting these strings to a 3 bit encoded representation. In other words, Iris-Setosa=[1,0,0], Iris-Versicolour=[0,1,0], and Iris-Virginica=[0,0,1]. You can do that yourself and save it in <b>.csv format</b>, or just <a href="files/Iris_data.csv">download my version here</a> - either way it will look like this:</p>
            
            <p class="bodyText"><img class="img-responsive" src="images/data-screen-converted.png"/></p>
                 
        </div>
        
        <div class="container"> 
            <h1>SETTING UP THE NETWORK</h1>
            
            <p class="bodyText">So diving right in, we know that we have 3 classes of flowers and that we need to use a multilayer backpropagation network in order to properly classify them given our dataset.</p>
                 
        </div>
        
        
        
        
        <hr/>

        <script src="js/jquery-latest.js"></script>      <!-- http://code.jquery.com/jquery-latest.js-->
        <script src="js/jquery-effects-core.js"></script>  <!-- http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js-->
        <script src="js/jquery-effects-slide.js"></script> <!--http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js -->
        <script src="js/script.js"></script>
    </body>
    
    <footer>
    
        <p id="footerText">&copy; Dan LaFreniere 2016</p>
    </footer>
</html>