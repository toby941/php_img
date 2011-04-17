<!DOCTYPE html> 
<html> 
  <head> 
  <title>Page Title</title> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
</head> 
<body> 

<div data-role="page" id="home">

  <div data-role="header">
    <h1>Home</h1>
  </div>

  <div data-role="content"> 
    <p><a href="#about">About this app</a></p>    
  </div>

</div>

<div data-role="page" id="about">

  <div data-role="header">
    <h1>About This App</h1>
  </div>

  <div data-role="content"> 
    <p>This app rocks! <a href="#home">Go home</a></p>    
  </div>

</div>

</body>
</html>