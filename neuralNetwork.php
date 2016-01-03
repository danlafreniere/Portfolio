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
            
            <p class="bodyText">So diving right in, we know that we have 3 classes of flowers and that we need to use a multilayer backpropagation network in order to properly classify them given our dataset. The first step is to determine how many layers we need and how many nodes we need in each subsequent layer. Backpropagation networks consist of an input layer, output layer, and one or more hidden layers.</p>
            
            <p class="bodyText"><b>Input Layer:</b> because we have 4 data attributes (discussed above) and these serve as our input parameters for the NN, you would think it would make sense to initialize the network with 4 input nodes. However, an additional 'bias' node is required bringing the total of input nodes up to 5. This bias node will always have an input of 1. If you're wondering why bias is important, <a href="http://stackoverflow.com/questions/2480650/role-of-bias-in-neural-networks">this post</a> does a solid job of explaining things in detail.</p>
            <p class="bodyText"><b>Output Layer:</b> similarly, we have 3 output categories (based on the 3 bit encoding of the flowers) and therefore, we need 3 output nodes. Recall: </p>
                <ul style="font-size: 12pt;">
                    <li>Iris-Setosa = [1,0,0]</li>
                    <li>Iris-Versicolour = [0,1,0]</li>
                    <li>Iris-Virginica = [0,0,1]</li>
                </ul>
           
            <p class="bodyText"><b>Hidden Layer:</b> we will focus on a single hidden layer for this illustration - typically one hidden layer will suffice for the majority of applications (including this one). The number of HN's to select is significantly more complicated. Usually this is determined based on trial and error using a general heuristic as a starting point. A good rule of thumb is to use the mean of the input and output nodes so we will start with a modest 4 hidden nodes and work around that number as we go if needed ((3 + 5) / 2 = 4). Sometimes clustering is used during preprocessing to determine an optimal number of HN's, other times pruning is used to reduce nodes until a good number is reached.</p>
            
            <p class="bodyText">In terms of structure, backpropagation networks are set up so that every input node (IN) is connected to every hidden node (HN) and every HN will be connected to every output node (ON). Each of these connections has a corresponding <b>weight</b>. Since this is a 5-4-3 network, there are a total of 32 weights ((5 * 4) + (4 * 3)). As our program progresses, the weights will be adjusted <b>after each iteration (iterative refinement)</b> until we either reduce error to an acceptable level or a threshold number of iterations is reached. Iterative refinement for update frequency seems to work better than batch processing (one batch = one cycle through each training sample). The network ends up looking like this (for now at least):</p>
            
            <p class="bodyText"><img class="img-responsive center-block" alt="A diagrame of a 5-4-3 neural network" src="images/5-4-3-NeuralNetwork.jpg"/></p>
             
        </div>
        
        
        <div class="container"> 
            <h1>SPLITTING UP THE DATASET</h1>
            
            <p class="bodyText"></p>
            
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