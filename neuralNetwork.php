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
        <link href="css/prism.css" rel="stylesheet" />
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
            <h1>AN INTRODUCTION TO MULTILAYER NETWORKS</h1>
                 
            <p class="bodyText"><i>Please note: this post is a work in progress.</i></p>
       
            <p class="bodyText">Neural networks are handy when it comes to analyzing large amounts of data - especially in regard to classification of data or prediction. For the purposes of this post, we will focus on classification of the famous <a href="https://archive.ics.uci.edu/ml/datasets/Iris">Iris data set</a> using a <b>multi-layer backpropagation network</b>. If you're not familiar with this set, it basically includes 3 classes of data (Iris Setosa, Iris Versicolour, and Iris Virginica) as well as 4 attributes (sepal length and width in cm and petal length and width in cm). If we were lucky and this data was linearly separable we would be able to classify the flowers using simple single-layer perceptrons. Unfortunately this isn't the case so a multi-layer network is a great choice. However, because we have multiple layers, the <b>credit assignment problem</b> is introduced. This means that it becomes unclear which nodes are responsible for the outcome. As a result, the network must utilize backpropagation to effectively solve this annoying problem. In essence, a backpropagation network is a feedforward network that computes error at the output nodes and propagates corrections to the weight values backward through the connections.</p>
                
                <p class="bodyText"> It's easy to get intimidated when we hear the words "neural network" but the clean and easy-to-use Iris set gives us an awesome opportunity to try one out. That being said, it's still good to know NN basics before attempting a multi-layer network so please check out the basics by Googling around if you need a rundown. I also really dig the textbook <a href="https://mitpress.mit.edu/books/elements-artificial-neural-networks">Elements of Artificial Neural Networks</a> by Mehrotra, Mohan, and Ranka - it's great if you want a really comprehensive resource.</p>       
        </div>
        
        <div class="container"> 
            <h1>THE DATASET</h1>
            
            <p class="bodyText">Start out by downloading the Iris data set from the <a href="https://archive.ics.uci.edu/ml/machine-learning-databases/iris/">UCI repository</a>. It's important to note that the last column of this set is reserved for a string indicating which flower the particular row of data belongs to; seen here: </p>
            
            <p class="bodyText"><img class="img-responsive" src="images/data-screen.png"/></p>
            
            <p class="bodyText">In order to make things a little easier on ourselves, I recommend converting these strings to a 3 bit encoded representation. In other words, Iris-Setosa=[1,0,0], Iris-Versicolour=[0,1,0], and Iris-Virginica=[0,0,1]. You can do that yourself and save it in <b>.csv format</b>, or just <a href="files/Iris_data.csv">download my version here</a> - either way it will look like this:</p>
            
            <p class="bodyText"><img class="img-responsive" src="images/data-screen-converted.jpg"/></p>
                 
        </div>
        
        <div class="container"> 
            <h1>NETWORK STRUCTURE</h1>
            
            <p class="bodyText">So diving right in, we know that we have 3 classes of flowers and that we need to use a multilayer backpropagation network in order to properly classify them given our dataset. The first step is to determine how many layers we need and how many nodes we need in each subsequent layer. Backpropagation networks consist of an input layer, output layer, and one or more hidden layers.</p>
            
            <p class="bodyText"><b>Input Layer:</b> because we have 4 data attributes (discussed above) and these serve as our input parameters for the NN, you would think it would make sense to initialize the network with 4 input nodes. However, an additional 'bias' node is required bringing the total of input nodes up to 5. This bias node will always have an input of 1. If you're wondering why bias is important, <a href="http://stackoverflow.com/questions/2480650/role-of-bias-in-neural-networks">this post</a> does a solid job of explaining things in detail.</p>
            <p class="bodyText"><b>Output Layer:</b> similarly, we have 3 output categories (based on the 3 bit encoding of the flowers) and therefore, we need 3 output nodes. Recall: </p>
                <ul style="font-size: 12pt;">
                    <li>Iris-Setosa = [1,0,0]</li>
                    <li>Iris-Versicolour = [0,1,0]</li>
                    <li>Iris-Virginica = [0,0,1]</li>
                </ul>
            <p class="bodyText">These vectors represent the output values for each of the three nodes. Output values are determined by a <a href="https://en.wikipedia.org/wiki/Logistic_function">classical logistic sigmoid function</a> (discussed in further detail below).</p>
           
            <p class="bodyText"><b>Hidden Layer:</b> we will focus on a single hidden layer for this illustration - typically one hidden layer will suffice for the majority of applications (including this one). The number of HN's to select is significantly more complicated. Usually this is determined based on trial and error using a general heuristic as a starting point. A good rule of thumb is to use the mean of the input and output nodes so we will start with a modest 4 hidden nodes and work around that number as we go if needed ((3 + 5) / 2 = 4). Sometimes clustering is used during preprocessing to determine an optimal number of HN's, other times pruning is used to reduce nodes until a good number is reached.</p>
            
            <p class="bodyText"><b>Connections &amp; Weights:</b> in terms of structure, backpropagation networks are set up so that every input node (IN) is connected to every hidden node (HN) and every HN will be connected to every output node (ON). Each of these connections has a corresponding <b>weight</b>. Since this is a 5-4-3 network, there are a total of 32 weights ((5 * 4) + (4 * 3)). As our program progresses, the weights will be adjusted <b>after each iteration (iterative refinement)</b> until we either reduce error to an acceptable level or a threshold number of iterations is reached. Iterative refinement for update frequency seems to work better than batch processing (one batch = one cycle through each training sample). The network ends up looking like this (for now at least):</p>
            
            <p class="bodyText"><img class="img-responsive center-block" alt="A diagrame of a 5-4-3 neural network" src="images/5-4-3-NeuralNetwork.jpg"/></p>
             
        </div>
        
        
        <div class="container"> 
            <h1>SPLITTING UP THE DATASET</h1>
            
            <p class="bodyText">In order to properly train the network, we need to split up the dataset we already have available. The simplest and in this case the best method for this is to use 80% of the Iris dataset for this training. This leaves a remaining 20% of data that we can use to test the accuracy of the final weight values. A basic readFile method was used to bring the data from the Iris set into an array (this can be found in the provided code within the backpropagation class).</p>
            
            <p class="bodyText">In order to set up the proper sets, I created a method called setTrainTestData within the Backpropagation class. I'd like to clean up this code because I wrote it without giving it much thought (this part just wasn't high priority for me). Currently, index numbers between 0 and the size of the total Iris dataset are chosen at random by a random number generator. If this index was not chosen previously, the corresponding data value from the total Iris set is added to the front of the training data set and the index is marked as chosen. In the case where an index value has been chosen previously, a new index is generated until the conflict is resolved. After the training set is filled, the test set is filled with the remaining values. As you can probably tell this is terribly inefficient and for large sets you don't want to use this code. However, since the Iris set only contains 150 data points, using this random-chance method doesn't impact performance noticeably. Here is the code:</p>
            
            <pre class="language-java codeBlockSmall">
                <code class="language-java">
    public static void setTrainTestData(double[][] data, double[][] trainingData, double[][] testData){
        Random rand = new Random(); 
		int val = data.length;   			//allows us to generate a number between 0 &amp; data.length-1
		int numTrain = trainingData.length; 
		int length = data.length; 
		int randIndex = 0; 								
		int index = 0; 
		int[] selected = new int[length];
		//A random index is selected from the total dataset and this index is marked so no duplicates are created.
		//The selected value is stored in the training set.
		for (int i=0; i&lt;numTrain; i++){
			randIndex = rand.nextInt(val); 
			while (selected[randIndex] != 0){
				randIndex = rand.nextInt(val); 
			}
			trainingData[index] = data[randIndex]; 
			selected[randIndex] = 1; 
			index++ ; 
		}
		index = 0; 
		//Remaining indices not randomly selected during the training data creation are used for the test set.
		for (int i=0; i&lt;length; i++){
			if (selected[i] == 0){
				testData[index] = data[i];
				index++; 
			}
		}
	} //End setTrainTestData Method
                </code>
            </pre> 
            
            <p>&nbsp;</p>
            
        </div>
        
        
        <div class="container"> 
            <h1>ERROR CALCULATION AND GRADIENT DESCENT</h1>
            <p class="bodyText"></p>
        </div>
        
        <div class="container"> 
            <h1>PSEUDOCODE</h1>
            <p class="bodyText">The general pseudocode for building a multi-layer backpropagation network is as follows:</p>
                <ol style="font-size: 12pt;">
                    <li>Initialize weights to random values.</li>
                    <li>While the sum squared error isn't satisfactory and the number of iterations isn't exceeded:</li>
                        <ol type="a">
                            <li>For each input pattern given to the network:</li>
                            <ol type="i">
                                    <li>Compute inputs for hidden nodes</li>
                                    <li>Compute outputs for hidden nodes</li>
                                    <li>Compute inputs for the output nodes</li>
                                    <li>Compute the output values (using the sigmoid function)</li>
                                    <li>Modify weights between hidden and output nodes</li>
                                    <li>Modify weights between input and hidden nodes</li>
                                </ol>
                        </ol>
                </ol>
            <p class="bodyText">This bit of pseudo will give us a nice framework for the rest of the tutorial.</p>
        </div>
         
        <hr/>

        <script src="js/jquery-2.1.4.min.js"></script>      <!--http://code.jquery.com/jquery-2.1.4.min.js-->
        <script src="js/script.js"></script>
        <script src="js/prism.js"></script>
    </body>
    
    <footer>
    
        <p id="footerText">&copy; Dan LaFreniere 2016</p>
    </footer>
</html>