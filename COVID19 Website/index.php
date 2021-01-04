<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>CovidGPS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
   



  <!-- Navbar -->
  
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <div class="hii">
    <img src="https://img.icons8.com/officel/60/4a90e2/coronavirus.png" class="icon"/>
  COVID-SPY
</div>
</svg></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
      aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
      <ul class="navbar-nav ml-auto active">
        <li class="nav-item">
          <a class="nav-link mx-4 my-0 h5 " href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-4 h5 my-0 " href="news.php">Top Headlines</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-4 h5 my-0" href="about.php">About Covid</a>
        </li>
        
      </ul>
    
    </div>
  </div>
</nav>
<br><br>


    <div class="happy"><span class="typed-text"></span><span class="cursor">&nbsp;</span></div>
 
  <table class="table">
     <thead>
     	 <th>Updated On</th>
     	 <th>States</th>
     	 <th>Confirmed</th>
     	 <th>Active</th>
     	 <th>Recovered</th>
     	 <th>Deaths</th>
     </thead>
 <?php

$data = file_get_contents('https://api.covid19india.org/data.json');
$coranalive = json_decode($data, true);

$statescount = count($coranalive['statewise']);
$i=1;
while($i < $statescount){
?>
<tbody>
<tr>
  <td><?php echo $coranalive['statewise'][$i]['lastupdatedtime']  ?></td>
  <td><?php echo $coranalive['statewise'][$i]['state']  ?></td>
  <td><?php echo $coranalive['statewise'][$i]['confirmed']  ?></td>
  <td><?php echo $coranalive['statewise'][$i]['active'] ?></td>
  <td><?php echo $coranalive['statewise'][$i]['recovered']  ?></td>
  <td><?php echo $coranalive['statewise'][$i]['deaths'] ?></td>
</tr>
</tbody>
<?php

  $i++;
}
?>
</table>

<footer>
        <div class="footer-content">
            <h3><img src="https://img.icons8.com/officel/60/4a90e2/coronavirus.png" class="icon1"/>&nbsp;COVID-SPY</h3>
            <p class="op">Found any bugs? Have any suggestions to make this better?
              Feel free to contact <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJfmrNrrzmNFtPLQjfvXfnGKntGXpStGRrrMtwXpLvnBBSMHCfQrlDsslpLBnDFBVTTPvlq" target="_blank">me</a>
            </p>
            <ul class="socials">
                <li><a href="https://www.facebook.com/pankaj.baheti.505" target="_blank"><i class="fa fa-facebook "></i></a></li>
                <li><a href="https://twitter.com/pankajbaheti321" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/pankaj_o_0_7/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/in/pankaj-kamal-baheti-13a5aa1b0/" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2020 COVID-SPY. designed by <span>Pankaj Baheti</span></p>
        </div>
    </footer>

<script>
const typedTextSpan = document.querySelector(".typed-text");
const cursorSpan = document.querySelector(".cursor");
const textArray = ["Be Negative in Corona, Be positive in Life !", "Spread Facts, not fear!","Be kind to address stigma during coronavirus.","TOGETHER WE CAN REDUCE COVID-19, LET’S STOP IT !"];
const typingDelay = 70;
const erasingDelay = 50;
const newTextDelay = 500; // Delay between current and next text
let textArrayIndex = 0;
let charIndex = 0;

function type() {
  if (charIndex < textArray[textArrayIndex].length) {
    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
    typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
    charIndex++;
    setTimeout(type, typingDelay);
  } 
  else {
    cursorSpan.classList.remove("typing");
  	setTimeout(erase, newTextDelay);
  }
}

function erase() {
	if (charIndex > 0) {
    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
    typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex-1);
    charIndex--;
    setTimeout(erase, erasingDelay);
  } 
  else {
    cursorSpan.classList.remove("typing");
    textArrayIndex++;
    if(textArrayIndex>=textArray.length) textArrayIndex=0;
    setTimeout(type, typingDelay + 1100);
  }
}

document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
  if(textArray.length) setTimeout(type, newTextDelay + 250);
});
</script>



     
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>