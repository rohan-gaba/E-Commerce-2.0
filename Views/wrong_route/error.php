<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Error Page</title>
    <style>
      body {
        background-color: rgb(245, 248, 250);
        font-family: Arial, sans-serif;
      }
      
      h1 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #555;
      }
      
      p {
        font-size: 18px;
        margin-bottom: 20px;
        color: #888;
      }
      
      button{
        color: #fff !important;
        background-color: #195a6a;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s ease;
      }
      
      button:hover {
        background-color: #444;
      }
      img{
        float:right;
        height:80vh;
        width:50vw;
        margin:0;
        position:relative;
        right:30vh;
        top:5vh
      }
      #u{
        float:left;
        margin:0;
        max-width:30vw;
        font-size:150%;
        margin-left:13vw;
        align:center;
      }
    </style>
  </head>
  <body>
    <div id="error-page">
      <div id="u">
        <center>
          <h1 style="font-size:20vh; color:#195a6a;">404</h1>
          <h2>Oh no! Page not Found</h2>
          <p>We're sorry, the page you requested could not be found.Please go back to the homepage</p>
          <button><a href="/" style="color:white;text-decoration:none;">Go back to the homepage</a></button>
          </center>
        </div>  
      <img src="https://images.ctfassets.net/y6oq7udscnj8/5xfckopijPW9cfAm23FC7s/3833fac0bf6d8631c0d3850f81b8180e/404-Background.png?w=2562&h=2784&q=50&fm=webp" alt="" srcset="">
    </div>
  </body>
</html> 