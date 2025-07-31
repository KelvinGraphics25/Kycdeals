<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="manifest" href="manifest.json">
  <meta charset="UTF-8">
  <title>KYC Deals</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- AOS Animation CDN -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="Verified.png" type="image/png">
  <!-- Primary Meta Tags -->
<meta name="title" content="KYC Deals - Fast, Trusted KYC Services">
<meta name="description" content="We provide reliable KYC services with payment. Track your process in real-time. Fast, secure, and flexible payment methods.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://kycdeals.ct.ws/">
<meta property="og:title" content="KYC Deals - Fast, Trusted KYC Services">
<meta property="og:description" content="We provide reliable KYC services with payment. Track your process in real-time. Fast, secure, and flexible payment methods.">
<meta property="og:image" content="https://kycdeals.ct.ws/Verified.png"> 

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="https://kycdeals.ct.ws/">
<meta name="twitter:title" content="KYC Deals - Fast, Trusted KYC Services">
<meta name="twitter:description" content="We provide reliable KYC services with  payment. Track your process in real-time. Fast, secure, and flexible payment methods.">
<meta name="twitter:image" content="https://kycdeals.ct.ws/Verified.png">

<!-- Mobile Friendly -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO Keywords -->
<meta name="keywords" content="KYC, KYC Verification, Binance KYC, Crypto KYC, KYC Deals, Online KYC Services, MEC verification, No upfront payment KYC, Kelvin Kikwa , Mr cc">

<!-- Author -->
<meta name="author" content="KYC Deals by Kelvin Graphics and MR CC">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #000;
      color: white;
      scroll-behavior: smooth;
    }
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 40px;
  background: linear-gradient(135deg, #001f3f, #0074D9);
  position: sticky;
  top: 0;
  z-index: 1000;
  flex-wrap: nowrap; /* ❌ prevent wrapping */
}

nav img {
  height: auto;
  width: 75px;
  flex-shrink: 0; /* 🔒 prevents image from shrinking too much */
}

.glow-btn,
.glow-btn-other{
  background: transparent;
  color: #00bfff;
  border: 2px solid #00bfff;
  padding: 10px 20px;
  border-radius: 30px;
  font-weight: bold;
  text-decoration: none;
  transition: 0.3s;
  box-shadow: 0 0 10px #00bfff, 0 0 20px #00bfff3a;
  display: inline-block;
  margin: 10px;
  flex-shrink: 0; /* 🔒 prevents button from collapsing */
}


.glow-btn:hover {
  background: #00bfff;
  color: black;
  box-shadow: 0 0 20px #00bfff, 0 0 30px #00bfff9f;
}


.hero {
  position: relative;
  height: 100vh;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: white;
}
.hero-bg {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  z-index: -2;
  transition: background-image 1s ease-in-out;
}
.hero::after {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  z-index: -1;
}
@media (max-width: 500px) {
  nav {
    padding: 10px 20px;
  }

  nav img {
    width: 70px;
  }

  .glow-btn {
    font-size: 16px;
    padding: 6px 14px;
    margin: 5px;
  }
  .glow-btn-other{
    font-size: 19px;
    padding: 6px 14px;
    margin: 6px;
  }
    .hero {
    height: 70vh; /* Reduce from 100vh */
    padding: 20px 10px;
  }

}


    .hero img {
      width: 100px;
      margin-bottom: 20px;
    }
    .hero h1 {
      font-size: 2.5em;
      margin-bottom: 10px;
    }
    .hero p {
      font-size: 1.2em;
      max-width: 600px;
      margin-bottom: 30px;
    }

    .section {
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
    }
    .section h2 {
      text-align: center;
      margin-bottom: 40px;
      font-size: 2em;
      color: #00bfff;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }
    .card {
      background: #111;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 0 10px #00bfff33;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 20px #00bfff99;
    }

    .centered-card {
      max-width: 600px;
      margin: auto;
      background: #111;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px #00bfff55;
      text-align: center;
    }

    .carousel-controls {
      text-align: center;
      margin-top: 20px;
    }
    .carousel-controls button {
      background: transparent;
      border: 1px solid #00bfff;
      color: #00bfff;
      padding: 5px 15px;
      margin: 0 10px;
      border-radius: 20px;
      cursor: pointer;
    }

    footer {
      text-align: center;
      padding: 30px 20px 10px;
      background: #0a0a0a;
    }
    .whatsapp-icons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 10px;
    }
    .whatsapp-icons a {
      color: #00ff88;
      font-size: 18px;
      text-decoration: none;
      border: 1px solid #00ff88;
      padding: 6px 12px;
      border-radius: 20px;
    }

    @media (max-width: 600px) {
      .hero h1 {
        font-size: 1.8em;
      }
      .hero p {
        font-size: 1em;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav>
  <img src="Verified.png" alt="KYC Deals Logo">
  <a href="https://chat.whatsapp.com/FBWyQ7zZnxr2oZpY2U0fn4?mode=r_t" class="glow-btn">Get Started</a>
</nav>

<!-- Hero Section -->
<section class="hero" id="hero" data-aos="fade-up">
  <div class="hero-bg" id="heroBg"></div> <!-- 🔹 Slideshow Background -->
  
  <h1>Welcome to KYC Deals</h1>
  <p>We offer seamless and reliable KYC services for various platforms. Fast, secure, and trusted.</p>

    <a href="https://chat.whatsapp.com/FBWyQ7zZnxr2oZpY2U0fn4?mode=r_t" class="glow-btn-other">Join Our Group</a>
  </div>
</section>


<!-- What We Offer -->
<section class="section" >
  <h2>What We Offer</h2>
  <div class="cards">
    <div class="card">
      <h3>Binance account management</h3>
      <p>Get your binance account verified and let us manage your account.</p>
      <a href="https://wa.me/254799800366" class="glow-btn-other">Do Now</a>
    </div>
    <div class="card">
      <h3>MEC KYC</h3>
      <p>With this, Get verified on mec and sell for us the mec token</p>
      <a href="https://i.mec.me/?c=sh8kc2uu" class="glow-btn-other">Do Now</a>
    </div>
    <div class="card">
      <h3>Efootball Deal</h3>
      <p>We're Buying Efootball accounts with 3200+ player development. Contact us for details and payment.</p>
      <a href="https://wa.me/254799800366" class="glow-btn-other">Do Now</a>
    </div>
       <div class="card">
      <h3>Bet365 deals</h3>
      <p>With this, Get verified and sell the account to us. Join our group and contact one of the admins for directions till payment.</p>
      <a href="https://chat.whatsapp.com/FBWyQ7zZnxr2oZpY2U0fn4?mode=r_t" class="glow-btn-other">Do Now</a>
    </div>
        <div class="card">
      <h3>Linkedin Account hire</h3>
      <p>We hire linkedin accounts that are 6+ months old  and have 200+ connections. Reach out to get started.</p>
      <a href="https://chat.whatsapp.com/FBWyQ7zZnxr2oZpY2U0fn4?mode=r_t" class="glow-btn-other">Do Now</a>
    </div>
  </div>
</section>

<!-- Why Trust Us -->
<section class="section" data-aos="fade-up">
  <h2>Why Trust Us</h2>
  <div class="centered-card">
 <p>We're transparent , you can track everything we do at any time. Services are completed before payment; no upfront payment is asked. We support multiple payment methods for your convenience.</p>

  </div>
</section>

<!-- What Our Users Say -->
<section class="section" data-aos="fade-up">
  <h2>What Our Users Say</h2>
  <div class="centered-card" id="testimonialCard">
    <p id="testimonialText">"Fast service and real. Nishauza mec coin. "</p>
    <strong id="testimonialAuthor">- James .</strong>
  </div>
  <div class="carousel-controls">
    <button onclick="prevTestimonial()">←</button>
    <button onclick="nextTestimonial()">→</button>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 || KYC Deals</p>
  <div class="whatsapp-icons">
    <a href="https://wa.me/254717389121"><i class="bi bi-whatsapp"></i> Admin One</a>
    <a href="https://wa.me/254799800366"><i class="bi bi-whatsapp"></i> Admin Two</a>
  </div>
</footer>
  
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./sw.js')
      .then(reg => console.log('Service Worker registered:', reg))
      .catch(err => console.error('SW registration failed:', err));
  }
</script>

<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();

  // Background slideshow for hero
const bgImages = [
  "https://plus.unsplash.com/premium_photo-1661963874418-df1110ee39c1?q=80&w=1086&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
  "https://images.unsplash.com/photo-1556155092-490a1ba16284",
  "https://images.unsplash.com/photo-1597733336794-12d05021d510?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
  "https://images.unsplash.com/photo-1644088379091-d574269d422f?q=80&w=1393&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
  "https://images.unsplash.com/photo-1678693362448-27bc143e74d9?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",


];
  let currentBg = 0;
  const heroBg = document.getElementById("heroBg");

  function rotateBackground() {
    heroBg.style.backgroundImage = `url('${bgImages[currentBg]}')`;
    currentBg = (currentBg + 1) % bgImages.length;
  }

  rotateBackground(); // Show first background
  setInterval(rotateBackground, 1000); // Rotate every 1 seconds


  // Testimonial data
  const testimonials = [
    { text: '"Fast service and real. Nishauza mec coin."', author: '- James K.' },
    { text: '"Very supportive, Endelea kusema ni scam!"', author: '- Pixie W.' },
    { text: '"Comrades😂. Kujeni huku teketeke"', author: '- Brian O.' }
  ];
  let current = 0;

  function showTestimonial() {
    document.getElementById('testimonialText').textContent = testimonials[current].text;
    document.getElementById('testimonialAuthor').textContent = testimonials[current].author;
  }

  function nextTestimonial() {
    current = (current + 1) % testimonials.length;
    showTestimonial();
  }

  function prevTestimonial() {
    current = (current - 1 + testimonials.length) % testimonials.length;
    showTestimonial();
  }
</script>
</body>
</html>
