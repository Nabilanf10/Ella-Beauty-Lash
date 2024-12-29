<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ella Beauty Lash</title>

  <link href="https://fonts.googleapis.com/css2?family=Yesteryear&display=swap" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
session_start();
?>

<style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: -5px;
    overflow: hidden;
    border: 1px solid #ec57cc;
    background-color: #cc50a7;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: #ffffff;
    text-align: center;
    margin: 14px 16px;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 70px;
  }

  li a:hover:not(.active) {
    background-color: #eecce5;
    border-radius: 70px;
    color: black;
  }

  li a.active {
    color: rgb(0, 0, 0);
    background-color: #eecce5;
  }

  .image-container {
    position: relative;
    display: inline-block;
  }

  .image-container img {
    display: block;
    width: 100%;
    height: auto;
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 50%;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .b {
    color: #ffffff;
    font-family: "Yesteryear";
  }

  .c {
    filter: brightness(80%);
    transition: filter 0.5s ease;
  }

  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f5e6f1;
  }

  h1 {
    font-size: 2.5rem;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 0;
  }

  p {
    text-align: center;
    font-size: 1.2rem;
    color: #555;
  }

  .bb {
    display: grid;
    grid-template-rows: repeat(2, auto);
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }

  .bb2 {
    display: grid;
    grid-template-columns: repeat(3, auto);
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }

  .container {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
  }

  .header-title {
    font-size: 2em;
    color: #333;
  }

  .subtext {
    color: #555;
  }

  .row {
    display: flex;
    justify-content: space-between;
    gap: 20px;
  }

  .card-ayam,
  .card-bebek,
  .card-kucing {
    background-color: #d68fbf;
    padding: 20px;
    border-radius: 15px;
    width: 30%;
    text-align: center;
    color: white;
  }

  .icon-wrapper {
    background-color: white;
    border-radius: 50%;
    padding: 10px;
    display: inline-block;
    margin-bottom: 10px;
  }

  .text-content {
    color: rgb(0, 0, 0);
    font-size: 0.9em;
    line-height: 1.5;
  }

  .ktk {
    background-color: #d68fbf;
    padding: 40px;
    text-align: center;
    color: black;
    font-size: 1.5rem;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  .ktk img {
    width: 40px;
    height: 40px;
    position: absolute;
    top: 15px;
  }

  .contact-form {
    background-color: #d68fbf;
    padding: 40px;
    border-radius: 10px;
    grid-column: 2;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .contact-form input,
  .contact-form textarea {
    padding: 10px;
    border-radius: 5px;
    border: none;
    font-size: 1rem;
    box-sizing: border-box;
  }

  .contact-form textarea {
    resize: none;
  }

  .contact-form button {
    background-color: #cc50a7;
    color: white;
    padding: 10px;
    border-radius: 5px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
  }

  .contact-form button:hover {
    background-color: #b276a3;
  }

  @media (max-width: 768px) {
    ul {
      flex-direction: column;
    }

    .container {
      width: 100%;
      flex-direction: column;
    }

    .row {
      flex-direction: column;
    }

    .card-ayam,
    .card-bebek,
    .card-kucing {
      width: 100%;
    }

    .bb {
      grid-template-rows: auto;
    }

    .contact-form {
      grid-column: 1;
    }
  }

  .image img {
    width: 100%;
    height: 90%;
    object-fit: contain;
  }

  .container {
    width: 80%;
    display: flex;
    flex-direction: row;
    border-radius: 10px;
  }

  .ee {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 40%;
  }

  .ee:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .eee {
    padding: 2px 16px;
  }

  footer p {
    text-align: center;
    font-size: 1.2rem;
    margin: 0px;
    color: #555;
  }

  footer a:hover {
    text-decoration: underline;
  }

  footer span {
    font-weight: bold;
  }

  .antic-slab-regular {
    font-family: "Antic Slab", serif;
    font-weight: 400;
    font-style: normal;
  }

  .hamburger {
    display: none;
    font-size: 30px;
  }

  @media (max-width: 768px) {
    .hamburger {
      display: block;
      cursor: pointer;
    }
  }
</style>

<body>
  <div>
    <ul style="display: flex; justify-content: space-between; align-items: center;">
      <div style="flex-shrink: 0; display: flex; justify-content: space-between; align-items: center;">
        <h2 class="b">Ella Beauty Lash</h2>
        <div class="hamburger" onclick="toggleMenu()">☰</div>
      </div>
      <?php include('header.php'); ?>
    </ul>
  </div>
  <div>
    <div class="w3-container"></div>
    <div class="w3-content w3-display-container" style="max-width: 100%">
      <div class="w3-display-middle w3-large w3-container w3-padding-16">
      </div>
      <img class="mySlide" src="4.jpg" style="width: 100%" />
      <img class="mySlide" src="5.jpg" style="width: 100%" />
      <img class="mySlide" src="6.jpg" style="width: 100%" />
      <img class="mySlide" src="7.jpg" style="width: 100%" />
      <button class="w3-button w3-display-left" onclick="plusDivs(-1)">
        &#10094;
      </button>
      <button class="w3-button w3-display-right" onclick="plusDivs(1)">
        &#10095;
      </button>
      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
        style="width: 100%">
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
    <script>
      var slideIndex = 1;
      showDivs(slideIndex);

      function plusDivs(n) {
        showDivs((slideIndex += n));
      }

      function currentDiv(n) {
        showDivs((slideIndex = n));
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlide");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
          slideIndex = 1;
        }
        if (n < 1) {
          slideIndex = x.length;
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-white";
      }
      setInterval(function() {
        plusDivs(1);
      }, 2000);
    </script>
  </div>
  <br>
  <h1 id="tentang"></h1>
  <div style="text-align: center;">
    <div class="container">
      <div class="image">
        <img src="6.jpg" alt="foto">
      </div>
      <div class="content">
        <h2>Ella BeautyLash</h2>
        <p>Ella beautylash berdiri sejak 2017 menawarkan treatment dengan ketelitian untuk mempercantik customer
          dipercaya hingga sekarang</p>
      </div>
    </div>

    <div style="text-align: center;">
      <div>
        <h1 id="porthofolio">Phortofolio</h1>
      </div>
      <div class="w3-row-padding w3-margin-top">
        <div class="w3-third">
          <div class="w3-card">
            <img src="1 (2).jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway"
              style="width:50%" />
            <div class="w3-container">
              <h5>Natural Premium</h5>
            </div>
          </div>
        </div>

        <div class="w3-third">
          <div class="w3-card">
            <img src="4.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
            <div class="w3-container">
              <h5>Princess Premium</h5>
            </div>
          </div>
        </div>

        <div class="w3-third">
          <div class="w3-card">
            <img src="3 (2).jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway"
              style="width:50%" />
            <div class="w3-container">
              <h5>Premium Dramatic</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="w3-row-padding w3-margin-top">
      <div class="w3-third">
        <div class="w3-card">
          <img src="5.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
          <div class="w3-container">
            <h5>Double Lash</h5>
          </div>
        </div>
      </div>

      <div class="w3-third">
        <div class="w3-card">
          <img src="6.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
          <div class="w3-container">
            <h5>Natural</h5>
          </div>
        </div>
      </div>

      <div class="w3-third">
        <div class="w3-card">
          <img src="7.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
          <div class="w3-container">
            <h5>Yie Lash</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="w3-row-padding w3-margin-top">
    <div class="w3-third">
      <div class="w3-card">
        <img src="8.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
        <div class="w3-container">
        </div>
      </div>
    </div>

    <div class="w3-third">
      <div class="w3-card">
        <img src="9.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50" />
        <div class="w3-container">
        </div>
      </div>
    </div>

    <div class="w3-third">
      <div class="w3-card">
        <img src="10.jpg" style="width: 100%" class="w3-hover-opacity" alt="Norway" style="width:50%" />
        <div class="w3-container">
        </div>
      </div>
    </div>
  </div>
  </div>

  <h1 id="perawatan"">Perawatan</h1> 
    <p class=" subtext">Deskripsi singkat</p>
    <div class="container">
      <div class="row">
        <div class="card-ayam">
          <div class="icon-wrapper">💅</div>
          <h4>Nail Price</h4>
          <div class="text-content">Kami menawarkan layanan Nail Price dengan desaain unik yang bisa
            disesuaikan dengan gaya dan kepribadianmu. dengan nuansa studio yang nyaman, dan teknisi
            berpengalaman, kami siap memberikan hasil yang memukau.</div>
        </div>
        <div class="card-bebek">
          <div class="icon-wrapper">👁️</div>
          <h4>Eyelash</h4>
          <div class="text-content">Lash artist bisa membuat eyelash kamu menjadi seperti yang diinginkan. Mau
            yang natural, yang panjang atau yang dramatis sekalipun. lash artist nenyiapkan jenis bulu mata
            yang sesuai dengan kebutuhanmu.</div>
        </div>
        <div class="card-kucing">
          <div class="icon-wrapper">🏠</div>
          <h4>Home Service Price</h4>
          <div class="text-content">Kami hadir untuk mempercantik kukumu dengan layanan home service price
            langsung dirumahmu. Dengan peralatan steril, bahan berkualitas, dan teknisi profesional, kami
            menjamin kenyamanan dan kebersihan, dan hasil maksimal.</div>
        </div>
      </div>
    </div>

    <h1 id="kontak">Kontak</h1>

    <div class="bb">
      <div class="ktk">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d530.9912043112931!2d110.36239961286222!3d-7.7614032703258005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a585bc0594225%3A0x91fde0144d17010!2sElla%20Beauty%20Lash!5e0!3m2!1sen!2sid!4v1729865027558!5m2!1sen!2sid"
          width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <div class="contact-form">
        <input type="text" placeholder="Your Name" required />
        <input type="email" placeholder="Your Email" required />
        <input type="text" placeholder="Subject" required />
        <textarea rows="5" placeholder="Message" required></textarea>
        <button type="submit">Send Message</button>
      </div>
    </div>
    </div>
    <footer>
      <p>© Copyright <span>Ella Beauty Lash</span> All Rights Reserved</p>
      <p>Designed by Ella Beauty Lash</p>
    </footer>
</body>

</html>