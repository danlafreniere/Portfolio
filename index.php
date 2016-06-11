<?php
                
            session_start();

            require_once 'helpers/security.php';
            $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
            $fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

?>
        

<!doctype html>
<html lan="en" prefix="og: http://ogp.me/ns#">

<!--    ADD CONTENT FOR ACCESSIBILITY-->
	<head>
    	<meta charset="UTF-8"/>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta property="og:site_name" content="Dan LaFreniere Portfolio"/>
        <meta property="og:title" content="Dan LaFreniere's Portfolio"/>
        <meta property="og:description" content="My portfolio outlining some of my work/side projects and some stuff about myself too!"/>
        <meta property="og:image" content="http://www.danlafreniere.com/images/AshTree-Social.png">
        <meta property="og:url" content="http://www.danlafreniere.com/">
        <meta property="og:type" content="blog"/>
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
                <a class="primary-nav-trigger"><span class="menu-text">Menu</span><span class="menu-icon"></span></a>
            </nav>
        
   	    </div>
        <nav>
	  	   	<ul class="primary-nav">
                <li id="firstItem"><a href="#jumpto-About">About Me</a></li>
           	    <li><a href="#jumpto-Projects">Projects</a></li>
                <li><a href="#jumpto-Blog">Blog</a></li>
                <li><a href="#jumpto-Contact">Contact</a></li>
           	    <li class="primary-nav-title"><strong>Follow Me</strong></li>
           	    <li><a href="https://ca.linkedin.com/pub/daniel-lafreniere/72/403/469"><i class="social_linkedin_circle"></i></a>&nbsp;<a href="https://www.facebook.com/dan.lafreniere.56"><i class="social_facebook_circle"></i></a>&nbsp;<a href="https://twitter.com/JustLacksZazz"><i class="social_twitter_circle"></i></a>&nbsp;<a href="https://plus.google.com/+DanLaFreniere/posts"><i class="social_googleplus_circle"></i>
</a>&nbsp;<a href="https://github.com/danlafreniere"><i style="font-size: 35px; margin-bottom: -5px;" class="fa fa-github"></i></a></li>
	       </ul>
   	    </nav>
             
             
        <div id="shortDescription">
            <h1 class="intro">Hi, my name is Dan</h1>
            <p class="introKicker">I am an enthusiastic computer science student from Queen’s University.</p>
            <p class="introKicker">I love to <b class="bigFont">code, create</b>, and <b class="bigFont">problem solve.</b></p>
            <img alt="Portrait of Dan LaFreniere" src="images/Dan.png" id="selfPortrait"/>
        </div>

        <div class="container topPadding bigBottom"> 
            <hr/ id="jumpto-About">
            <h1>ABOUT ME</h1>
       
            <p class="bodyText">I am currently a second-degree student in my third and final year of computing at Queen’s University. My first degree in psychology was obtained from the University of Alberta. I have recently completed a summer position at Queen's IT services where I worked with clients to build and maintain websites for their respective faculties. I built up strong rapport with many of these clients over the summer and am now freelancing during my studies with these awesome individuals along with some other great people that I've been recommended to.</p>
                
            <p class="bodyText">In the past, I spent a number of years in the field of clinical neuropsychology where I studied human cognition and abnormal brain structure in patients suffering from schizophrenia via patient testing and MRI acquisition. Though I loved the field, I found myself spending a lot of my free time coding and decided that I should follow my heart and pursue computer science. My passions lie in artificial intelligence, software development and app/web development but I love learning new skills and facing the rewarding challenges that computer science presents to me every day.</p>
            
            <p class="bodyText">I'm a huge music fan and dig everything from death metal to dream pop. I'm told I'm a very nice fella so don't hesitate to <a href="#jumpto-Contact">drop me a line!</a></p>

           
       
                <div class="container topPadding bigBottom">
                    <div class="skill">
                        <h4>Communication</h4>
                        <img class="img-responsive" src="images/Skills/CommunicationBar.png">
                    </div>
                    <div class="skill">
                        <h4>Organization</h4>
                        <img class="img-responsive" src="images/Skills/OrganizationBar.png">
                    </div>
                    <div class="skill">    
                        <h4>User Experience (UX)</h4>
                        <img class="img-responsive" src="images/Skills/UXBar.png">
                    </div>
                    <div class="skill">
                        <h4>Learning</h4>
                        <img class="img-responsive" src="images/Skills/LearningBar.png">
                    </div>
                    <div class="skill">
                        <h4>Programming</h4>
                        <img class="img-responsive" src="images/Skills/ProgrammingBar.png">
                    </div>
                    <div class="skill"> 
                        <h4>Team Work</h4>
                        <img class="img-responsive" src="images/Skills/TeamWorkBar.png">
                    </div>
                </div>

                <p class="bodyText topPadding" style="clear: both;">Also feel free to download my resume (PDF, 68.4kB) or transcript (PDF, 6.6kB), friend!</p>
            
            <a download href="files/Daniel_LaFreniere_Resume.pdf"><img alt="Button to Download my Resume (PDF Format)" src="images/ResumeButton.png" id="resume"/></a>
            <a download href="files/Daniel_LaFreniere_Transcript.pdf"><img alt="Button to Download my Transcript (PDF Format)" src="images/TranscriptButton.png" id="resume"/></a>
            <p>&nbsp;</p>
      
            </div>
        </section>
         
        
        <section class="tealBackground topPadding bigBottom">
            <p id="jumpto-Projects">&nbsp;</p>

            <div class="container"><h1 class="whiteText">PROJECTS</h1><br/>&nbsp;</div>
            <div class="container">
                
                 <a class="thumb" style="background-image: url(/images/Websites.png);">
                    <div class="thumb-overlay">
                        <strong class="thumb-text">Queen's University Faculty Websites</strong>
                        <div class="coming-soon"><strong>- Page Coming Soon -</strong></div>
                    </div>
                </a>
                
                <a class="thumb" style="background-image: url(/images/MDSS.png);">
                    
                    <div class="thumb-overlay">
                        <strong class="thumb-text">Medical Decision Support System</strong>
                        <div class="coming-soon"><strong>- Page Coming Soon -</strong></div>
                    </div>
                </a>
            
               
                
                <a class="thumb" style="background-image: url(/images/Moon.png);">
                    <div class="thumb-overlay">
                        <strong class="thumb-text">Automated Barn Door Star Tracker</strong>
                        <div class="coming-soon"><strong>- Page Coming Soon -</strong></div>
                    </div>
                </a>
                
                <a class="thumb" style="background-image: url(/images/TechSupport.png);">
                    <div class="thumb-overlay">
                        <strong class="thumb-text">Tech Support <br/>(Android App)</strong>
                        <div class="coming-soon"><strong>- Page Coming Soon -</strong></div>
                    </div>
                </a>
                
                <a class="thumb" style="background-image: url(/images/CNTAS_Screen.png);">
                    <div class="thumb-overlay">
                        <strong class="thumb-text">Clinical Neuropsychology Test Administration System</strong>
                        <div class="coming-soon"><strong>- Page Coming Soon -</strong></div>
                    </div>
                </a>
                
            </div>
            
            <p id="jumpto-Blog">&nbsp;</p>
        </section>

        <a href="blogHome.php">
        <div class="photoContainer">
            <img id="planet" src="images/Planet.gif"/>
            <img id="littleComet" src="images/Comet.gif"/>
            <img id="bigComet" src="images/Comet.gif"/>
            <div class="photoContainer_content">
                <h1 class="sliding-underline">MY BLOG</h1>
                <h5>Check It Out</h5>
            </div> 
            <div style="background-image: url('images/backsplash_teal.jpg');" class="photoContainer_pic"></div>
        </div></a>
        
        <hr style="margin-top:-0em;"/>
   
        
        
        <div class="container" id="contact" >
              <hr id="jumpto-Contact"/>
                <h1>CONTACT</h1>
                <h2>Drop me a line!</h2>
            
                <form method="post" action="contact.php">
                    <label for="name">
                        <span>YOUR NAME</span>
                        <input type="text" class="name" name="name"<?php echo isset($fields['name']) ? 'value="' . e($fields['name']) . '"' : ''?>/></label>
            
                    <label for="email">
                        <span>YOUR EMAIL</span>
                        <input type="email" class="email" name="email"<?php echo isset($fields['email']) ? 'value="' . e($fields['email']) . '"' : ''?>/></label>
        
                    <label for="message">
                        <span class="message">YOUR MESSAGE</span>
                        <textarea id="message" name="message"><?php echo isset($fields['message']) ? e($fields['message']) : ''?></textarea>  
                    </label>
                    <input type="submit" class="button next" value="SEND MESSAGE" name="contact_submit"></input>
                </form>
        
                <p>&nbsp;</p>
                <p>&nbsp;</p>
        </div>

        <script src="js/jquery-2.1.4.min.js"></script>      <!--http://code.jquery.com/jquery-2.1.4.min.js-->
        <script src="js/script.js"></script>
    </body>
    
    <footer>
    
        <p id="footerText">&copy; Dan LaFreniere 2016</p>
    </footer>
</html>

<?php
    unset($_SESSION['errors']);     
    unset($_SESSION['fields']);            

?>