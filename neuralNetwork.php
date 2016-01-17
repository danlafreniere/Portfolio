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
        <link rel="stylesheet" href="css/prism.css"/>
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
                <li id="firstItem"><a href="index.php">Portfolio</a></li>
           	    <li><a href="blogHome.php">Blog Home</a></li>
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
            
            <pre class="codeBlockSmall">
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
        
        <div class="container"> 
            <h1>INITIALIZING THE WEIGHTS</h1>
            <p class="bodyText">This part is nice and easy - a random number generator will set the weights to a number between 0.001 and 0.0001. Getting to these values took a little trial and error and some Googling around to find something that would work nicely. As a rule of thumb, small weight values are nice when coupled with a sigmoid function in order to avoid slow learning (this is a result of the sigmoid curve flattening when a &rarr; &plusmn;&infin;).</p>
            
            <pre class="codeBlockSmall">
                <code class="language-java">
    //weights are initialized to random values and stored in their respective arrays for later use
	private void InitializeWeights(){

		Random rand = new Random(); 
		double min = 0.0001;							//min weight value
		double max = 0.001;								//max weight value
		this.ihWeights = new double[numHN][numIN+1]; 	//input-hidden weights: (numIN+1) is used to account for bias weights
		this.hoWeights = new double[numON][numHN];		//hidden-output weights

		//all weights are assigned initial random values:
		for (int h=0; h&lt;(numHN); h++){
			for (int i=0; i&lt;numIN+1; i++){
				ihWeights[h][i] = min + (max - min) * rand.nextDouble(); 	
			}
		}
		for (int j=0; j&lt;numON; j++){
			for (int h=0; h&lt;numHN; h++){
				hoWeights[j][h] = min + (max - min) * rand.nextDouble();
			}
		}
	} //End InitializeWeights Method
                </code>
            </pre>
            <p>&nbsp;</p>
        </div>
        
        <div class="container"> 
            <h1>While Loop</h1>
            <h2>ERROR CALCULATION</h2>
            <p class="bodyText">The goal of our network is to modify weights so that the output vector y<sub>p</sub> is as close as possible to the desired output vector d<sub>p</sub> where p is the given input vector for that iteration. Error can be calculated as e = (d<sub>p</sub> - y<sub>p</sub>) which is the desired output compared to the actual output for a particular input pattern p:</p>
            
            <pre>
                <code class="language-java">
        //obtained the desired output values from the last 3 values of the training data vectors
		for (int j=4; j&lt;inputVectorLength; j++){
			desiredOut[index] = trainingData[P][j]; 
			index++; 
		}
		//error is (desired output - actual output) for each node
		for (int j=0; j&lt;numON; j++){	
			outputError[j] = desiredOut[j] - outputs[j]; 
		}
                </code>
            </pre>
                
            <p class="bodyText">Therefore, total error is calculated by <b>sum squared error</b> and is: &sum;<sub>p</sub>(d<sub>p</sub> - y<sub>p</sub>)<sup>2</sup> &nbsp;&nbsp;This calculation is necessary for one of the stopping conditions of our network (along with an iteration threshold).</p> 
            
            <pre>
                <code class="language-java">
        for (int j=0; j&lt;outputError.length; j++){
			sse += Math.pow(outputError[j],2);
		}
		sse = (1.0/2) * sse; 
                </code>
            </pre>
                
            <p class="bodyText">As for selecting the termination conditions of the while loop, I decided on a very small error value and a relatively high iteration value - these values should be altered with trial and error.</p>
            
            <pre>
                <code class="language-java">
            int maxEpoch = 500;
            while ((thisEpoch &lt;= maxEpochs) &amp;&amp; (sse &gt; 0.001)){          
                </code>
            </pre>
            
          
        </div>
        
        <div class="container"> 
            <h1>COMPUTING HIDDEN NODE INPUTS</h1>
            <p class="bodyText">For each of the h hidden nodes, the input to that node is a<sup>1</sup><sub>h</sub> = &sum; w<sup>10</sup><sub>hi</sub>x<sub>i</sub> where x is the output from the input node, and w<sub>ih</sub> represents the weight on the connection from input node i and hidden node h. Here is a diagram to help with the visualization (which I will include for each step):</p>
            
            <img src="images/SimpleNetworkDiagram.png"/>
        
            <pre>
                <code class="language-java">
            //------------------ 1. Calculate net input to each node in hidden layer h ------------------
            for (int h=0; h&lt;(numHN); h++){
				for (int i=0; i&lt;numIN+1; i++){
				    if (i &lt; 4){							//compute inputs to hidden nodes from the 4 data dimensions
				        hiddenInputs[h] += (ihWeights[h][i] * trainingData[P][i]); 
				    } else {							//compute the input to hidden node for bias value b=1
				        hiddenInputs[h] += (ihWeights[h][i] * 1);
				    }	
				}
            } //-----------------------------------------------------------------------------------------
                </code>
            </pre>
            <p>&nbsp;</p>
        </div>

        
        <div class="container"> 
            <h1>COMPUTING HIDDEN NODE OUTPUTS</h1>
            <p class="bodyText">The hidden node output (y<sup>1</sup><sub>h</sub>) is simply a sigmoid function applied to the calculated hidden input: S(a<sup>1</sup><sub>h</sub>) where S = 1 / (1 + e<sup>(-m * net)</sup>), net = a<sup>1</sup><sub>h</sub>, e = Euler's number, and m = the slope of the sigmoid function. In order to keep things simple, I set m = 1.</p>
            <img src="images/SimpleNetworkDiagram.png"/>
            
            <pre>
                <code class="language-java">
            //-------------- 2. Calculate sigmoid output from each node in hidden layer h ---------------
            for (int h=0; h&lt;(numHN); h++){
				//hiddenOutput = Sigmoid(net) = 1/(1+e^(-m*net)) -> logistic function:
				hiddenOutputs[h] = 1 / (1 + Math.exp(-hiddenInputs[h] * m));
            } //-----------------------------------------------------------------------------------------

                </code>
            </pre>
            <p>&nbsp;</p>
        </div>
        
        <div class="container"> 
            <h1>COMPUTING OUTPUT NODE VALUES</h1>
            <p class="bodyText">Calculating the inputs and outputs for the output nodes follows the same methods as the hidden node methods above.</p>
            <img src="images/SimpleNetworkDiagram.png"/>
            
            <h2>INPUT</h2>
        
            <pre>
                <code class="language-java">
            //------------------ 3. Calculate net input to each node in output layer j ------------------
            for (int j=0; j&lt;(numON); j++){
				for (int h=0; h&lt;numHN; h++){
				    valForON[j] += (hoWeights[j][h] * hiddenOutputs[h]);
				}
            } //-----------------------------------------------------------------------------------------

                </code>
            </pre>
            
            <p>&nbsp;</p>
            
            <h2>OUTPUT</h2>
            <pre>
                <code class="language-java">
            //-------------- 4. Calculate sigmoid output from each node in output layer j ---------------
            for (int j=0; j&lt;(numON); j++){
				outputs[j] = 1 / (1 + Math.exp(-valForON[j] * m));
            } //----------------------------------------------------------------------------------------
                </code>
            </pre>
            <p>&nbsp;</p>
        </div>
        
        
        <div class="container"> 
            <h1>UPDATING WEIGHTS</h1>
              <h2>GRADIENT DESCIENT</h2>
            <p class="bodyText"><b>Gradient descent</b> is the heart and soul of the backpropagation network. It refers to the direction of change for our weights and thus allows us to modify them accurately. In short, this is calculated as: &#916;w = -&#948;E/&#948;w &nbsp;&nbsp; Essentially we end up using a chain rule on these derivations to obtain the necessary weight changes. The final calculations acquired at the end of each chain rule is what we end up implementing. It's not really necessary to know the chain rule process in intense detail but if you really want to learn a bit more this resource will help: <a href="https://en.wikipedia.org/wiki/Delta_rule">"derivation of the delta rule"</a>.</p>
           
            <h2>HIDDEN-OUTPUT WEIGHT UPDATES</h2>
            <p class="bodyText">First we need to calculate the output gradient for the particular ouput node o (as with all of these calculations, they were reached through the chain rule).<br/> 
            &delta;<sup>o</sup><sub>h</sub> = (d<sub>o</sub> - y<sub>o</sub>) * y<sup>2</sup><sub>o</sub> * (1 - y<sup>2</sup><sub>o</sub>) where d is out desired output and y is the actual output for that particular node (these together = output error).</p>
            
            <p class="bodyText">Once we have the output gradient (&delta;<sup>o</sup><sub>h</sub>), we can calculate our delta weight value:<br/>
            &Delta;w<sup>21</sup><sub>oh</sub> = c * &delta;<sup>o</sup><sub>h</sub> * x<sup>1</sup><sub>h</sub><br/>
            Now we can update our weight value:<br/>
            w<sup>21</sup><sub>oh</sub>  = &Delta;w<sup>21</sup><sub>oh</sub> + w<sup>21</sup><sub>oh</sub></p>
        
            <h2>INPUT-HIDDEN WEIGHT UPDATES</h2>
            <p class="bodyText">Updating the input-hidden weights follows a very similar method to the hidden-output updates. However, the output gradient is needed when we calculate the hidden gradient - remember that this network backpropagates error backwards? <b>This carry over of the gradient is how this happens</b>.</p>
            
            <p class="bodyText"><b>The calculations:</b><br/>
            &delta;<sup>h</sup><sub>i</sub> = (&sum;(&delta;<sup>o</sup><sub>h</sub> * w<sup>21</sup><sub>oh</sub>)) * y<sup>1</sup><sub>h</sub> * (1 - y<sup>1</sup><sub>h</sub>)<br/>
            &Delta;w<sup>10</sup><sub>hi</sub> = c * &delta;<sup>h</sup><sub>i</sub> * x<sup>0</sup><sub>i</sub><br/>
            w<sup>10</sup><sub>hi</sub> = &Delta;w<sup>10</sup><sub>hi</sub> + w<sup>10</sup><sub>hi</sub></p>
                        
            <pre class="codeBlockSmall">
                <code class="language-java">
    //after errors have been calculated, we can now update each weight in our network
	public void updateWeights(double learningRate, double momentum, int P, double[][] trainingData){

		double deltaWeight = 0; 
		double previousDelta = 0; 
		double runningSum; 
		double val;

		//------------------------------------ 1. Update Hidden-Output Weights ------------------------------------
		for (int o=0; o&lt;(numON); o++){
			//outputGradient = (d - y) * y * (1 - y)
			outputGradients[o] = outputError[o] * outputs[o] * (1-outputs[o]);
			for (int h=0; h&lt;numHN; h++){
				deltaWeight = learningRate * hiddenOutputs[h] * outputGradients[o];
				//momentum is computed using stored value of previous deltaWeight (below)
				deltaWeight += momentum * previousDelta; 
				hoWeights[o][h] = hoWeights[o][h] + deltaWeight; 
				previousDelta = deltaWeight; 
			}
		} 
		//------------------------------------ 2. Update Input-Hidden Weights -------------------------------------
		//hiddenGradients are calculated first in order to make the weight update calculations more straightforward:
		for (int h=0; h&lt;numHN; h++) {
			runningSum = 0;
			for (int i=0; i&lt;numON; i++) {
				val = outputGradients[i] * hoWeights[i][h];
				runningSum += val;	
			}
			//hiddenGradient = SUMOF{ outputGradients[i] * hoWeights[i][h] } * (d - y) * y * (1 - y)
			hiddenGradients[h] = runningSum * hiddenOutputs[h] * (1 - hiddenOutputs[h]);
		}
		//weights can now be updated now that we have the proper hidden gradients:
		previousDelta = 0; 
		for (int h=0; h&lt;(numHN); h++){
			for (int i=0; i&lt;numIN+1; i++){
				deltaWeight = learningRate * trainingData[P][i] * hiddenGradients[h];
				deltaWeight += momentum * previousDelta;
				ihWeights[h][i] = ihWeights[h][i] + deltaWeight; 
				previousDelta = deltaWeight; 
			}
		}
	}
                </code>
            </pre>
        </div>
        
        <div class="container"> 
            <h1>CONCLUSION</h1>
            <p class="bodyText">That's how a neural network is made! <a href="https://www.youtube.com/watch?v=NmPhaG1ud38">...and there was much rejoicing.</a></p>
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