<?php
// Check if user is logged in

session_start();
session_unset();
session_destroy();



// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendence");

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Retrieve all books from database
$query = "SELECT * FROM book";
$result = mysqli_query($conn, $query);

// Display book list
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Gravitas+One&display=swap" rel="stylesheet"><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
  #lib{display: flex;transition: .6s ease;
    flex-direction: row;justify-content:space-between;width:198px;background: transparent;color: white;border-top-right-radius: 23px;border-left: none;border-top-left-radius:0px;border-bottom-left-radius: 0px;}
  #lib:hover{
background-color: black;
width: 240px;
  }
 #search{
  color: white !important;
 }
 /* Phone screen styles (≤ 575px) */
/* Phone screen styles (≤ 575px) */
@media (max-width: 575px) {
 #bks{
  flex-direction: column;
 }
 .carousel-item{
  width:fit-content;height:fit-content;
}
  .search-form-wrapper {
    width: 50% !important;
    padding: 10px !important;
    margin: 0 auto !important;
    
    border-radius: 10px !important;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
  }
  .search-form input[type="search"] {
    width: 44% !important;
    padding: 10px !important;
    border: none !important;
    border-radius: 10px !important;
    background: transparent;
  }
  .search-form button[type="submit"] {
    width: 37% !important;
    padding: 10px !important;
    border: none !important;
    border-radius: 10px !important;
    background-color: #4CAF50 !important;
    color: #fff !important;
  }

 
}
.reveal-element {
  opacity: 0;
  transform: translateY(100px);
  transition: all .5s ease-in-out;
}

.reveal-element.revealed {
  opacity: 1;
  transform: translateY(0);
}


.rubik-broken-fax-regular {
  font-family: "Fredericka the Great", serif;
  font-weight: 400;
  font-style: normal;
}
.gravitas-one-regular {
  font-family: "Gravitas One", serif;
  font-weight: 400;
  font-style: normal;
}
#b2{
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}
.clr{color:yellow;background-color:firebrick;}
body{
 background:linear-gradient(to right, rgb(37, 37, 57),rgb(114, 128, 148));

  
}

img{
  width: 100%;
  height: 100%;
  object-fit: cover;

}

.carousel-item{
  width:100%;height:350px;
}

.modal-dialog{
  background-color: #4CAF50;
}
.modal-content{
  background-color: red;
}

.modal-header {
  border-bottom: none;
}
.modal-footer {
  border: none;
}
.modal-content {
            opacity: 0;
            transition: opacity 0.5s;
        }
        .modal-content.show {
            opacity: 1;
        }
        .modal-header, .modal-body, .modal-footer {
            transform: translateY(-100%);
            transition: transform 0.5s;border: none; background: transparent;
        }
        .modal-header.show, .modal-body.show, .modal-footer.show {
            transform: translateY(0); background: transparent;
        }
        #password::placeholder {
  color: white;
}
#username::placeholder {
  color: white;
}
/* Add this to your CSS file */

.contact-icon {
  transition: all 0.3s ease-in-out; /* Add a transition effect */
}

.contact-icon:hover {
  transform: scale(1.2); /* Scale the icon on hover */
  background-color: #ffc107; /* Change the background color on hover */
  border-radius: 50%; /* Add a rounded corner effect */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow effect */
}
</style>


  </head>
<body style="width: fit-content;">
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 20px;">
    <div class="modal-dialog" style="background: transparent;border: none;">
      <div class="modal-content" style="background: transparent; border: none;">
        <div class="modal-header" style="background: transparent; border: none;">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">office work</h1>
          
        </div>
        <div class="modal-body">
          <form action="login.php" method="post">
            <div class="mb-3">
             
              <input  type="text" class="form-control text-white md-ml-5" style="background: transparent;border: none;border-bottom: 1px groove white; color:white;text-align:center" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
             
              <input type="password" id="password" name="password" class="form-control text-white "  placeholder="Password" style="background: transparent; border: none;border-bottom: 1px ridge;color:white;text-align:center">
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Login"></input>
        </div>
      </form>
      </div>
    </div>
  </div>
<nav class="navbar navbar-expand-lg" style="background: transparent;">
        <div class="container-fluid">
          <a class="navbar-brand" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@href=index.php" style="cursor:pointer;color:white">Office</a>
          <button disabled class="navbar-toggler disabled" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div disabled class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a style="color: wheat;cursor:pointer;"
               class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@href=#">NC official</a>
              </li>
             
              
            <form id="search-form" class="d-flex form-inline my-2 my-lg-0  " role="search" style="margin-left: 796px;" action="searchshow.php" method="post">
              <input id="search" name="search" class="form-control me-2 " type="search" placeholder="Search Book" aria-label="Search" style="background: transparent;border-top: 1px; border-color: hwb(0 100% 0% / 0.806);border-top-left-radius: 0px;border-top-right-radius: 0px;border-right: 0px;border-bottom-right-radius: 0px;">
              <button class="btn btn-outline-success" type="submit" style="color:white;border-left: 0px; border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-top-right-radius: 0px;border-top: none;border-color: hwb(0 99% 0% / 0.806);">Search</button>
            </form>
          </div>
        </div>
      </nav>



      
<div style="width: 100%;" >


<div style="display: flex; flex-direction: row;width:100%;" class="row md-justify-content-center md-align-items-center">

<div class="reveal-element search-form-wrapper d-md-none d-sm-none">
  <form class="search-form" action="searchshow.php" method="post">
    <input type="search" placeholder="Book"  id="search" name="search" style="color: #fff;">
    <button type="submit">Search</button>
  </form>
</div>



<div class="justify-content-end md-justify-content-center md-align-items-center container-fluid d-flex  mt-5 col-md-4"  >
        <h1><span class="rubik-broken-fax-regular" style="font-size: larger; font-weight: bolder;margin-left: 40px;color: wheat;">North_<span class="clr">Campus</span></span><br> <sub style="color: wheat;margin-left: 53px;"  >University <span >of Kashmir</span></sub></h1>
      
      </div>



      <!-- Container on the right side of the screen -->
      <div class="col-md-4 md-justify-content-center md-align-items-center container-fluid d-flex justify-content-end  " style="margin-right: 15%; margin-top: 10%;">
        <div class="card  p-3" style="width: 250px;background: transparent; border: none;">
        <form action="student.php" method="post">
                <label for="student" class="reveal-element justify-content-center  mt-4" style="font-size: large;font-weight: bold;color: white;">Student <svg class="reveal-element" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></label>
                <input type="text" class="mt-4 reveal-element"  id="enrollment-number" name="enrollment-number" style="border: none; border-bottom: 1px solid #ccc; outline: none; background: transparent;" placeholder="Enrollment">
             
                <input type="submit"  value="Login" class="btn btn-primary mt-4 reveal-element"></input>
          </form>
        </div>
      </div>



     
    </div>
    
    
<div class="row" style="width: 100%;">
    
    <div id="lib" class="reveal-element col-md-3 alert alert-info " role="alert"  style="height:fit-content">
    <a href="library.php" style="text-decoration: none;"> <div >  Visit Library  </div></a>
    <a href="library.php"><div style="width: fit-content;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right  " viewBox="0 0 16 16" >
        <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
        <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
      </svg>
   
</a>
</div>
</div>


<div  class="col-8 align-items-end container-fluid d-flex justify-content-end   flex-md-column" >
<svg class="reveal-element contact-icon"  style="margin-left: 15px;box-shadow:2px 2px 3px aqua;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg>
<br>

<svg class="reveal-element contact-icon"  style="margin-left: 15px;box-shadow:2px 2px 3px aqua;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
</svg>

<br>
<svg class="reveal-element contact-icon"  style="margin-left: 15px;box-shadow:2px 2px 3px aqua;"  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg>

<br>
<svg class="reveal-element contact-icon" style="margin-left: 15px;box-shadow:2px 2px 3px aqua;"  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg>

</div>

</div>



<div class="alert reveal-element " role="alert" style="width: fit-content;border:0px solid white;color:white;font-size:larger;font-weight:bolder;">
  
Check out newly added Books!
</div>

<div id="bks" style="display: flex; margin-bottom:50px;overflow:hidden;width:100% " class="container-fluid ">


<div class="reveal-element container justify-content-center" style="width: 300px;" style="position: relative;"  >
  <div class="row justify-content-center carousel slide carousel-fade" id="carouselExampleSlidesOnly"  data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="pexels-chevanon-1335971.jpg" d-block  alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-jplenio-1103970.jpg" d-block alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-mikhail-nilov-7676857.jpg"d-block  alt="...">
    </div>
  </div>
</div>
</div>
<div class="reveal-element container justify-content-center" style="width: 300px;" style="position: relative;"  >
  <div class="row justify-content-center carousel slide carousel-fade" id="carouselExampleSlidesOnly"  data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="pexels-chevanon-1335971.jpg" d-block  alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-jplenio-1103970.jpg" d-block alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-mikhail-nilov-7676857.jpg"d-block  alt="...">
    </div>
  </div>
</div>
</div>
<div class="reveal-element container justify-content-center" style="width: 300px;" style="position: relative;"  >
  <div class="row justify-content-center carousel slide carousel-fade" id="carouselExampleSlidesOnly"  data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="pexels-chevanon-1335971.jpg" d-block  alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-jplenio-1103970.jpg" d-block alt="...">
    </div>
    <div class="carousel-item" >
      <img src="pexels-mikhail-nilov-7676857.jpg"d-block  alt="...">
    </div>
  </div>
</div>
</div>

</div>


 </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>

  window.addEventListener('scroll', function() {
    var revealElements = document.querySelectorAll('.reveal-element');
    var delay = 0;
    revealElements.forEach(function(element) {
      setTimeout(function() {
        var rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
          element.classList.add('revealed');
        }
      }, delay);
      delay += 200; // adjust the delay time as needed
    });
  });
  
    const modal = document.getElementById('exampleModal2');
    modal.addEventListener('shown.bs.modal', () => {
      const modalContent = modal.querySelector('.modal-content');
      const modalHeader = modal.querySelector('.modal-header');
      const modalBody1 = modal.querySelector('.modal-body');
      const modalFooter = modal.querySelector('.modal-footer');
      modalContent.classList.add('show');
      setTimeout(() => {
        modalHeader.classList.add('show');
      }, 10);
      setTimeout(() => {
        modalBody1.classList.add('show');
      }, 10);
      setTimeout(() => {
        modalFooter.classList.add('show');
      },10);
    });


</script>
</body>
</html>
















