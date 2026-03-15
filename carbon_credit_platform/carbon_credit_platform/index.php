<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CreditSustain – Empower Your Future</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', Arial, sans-serif;
      background: #fff;
      color: #1a1a1a;
    }
    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 43px 63px 0px 63px;
      width: 100%;
      margin-bottom: 36px;
    }
    .site-brand {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 31px;
    }
    .nav-actions {
      display: flex;
      gap: 20px;
      align-items: center;
    }
    .nav-btn {
      background: #000;
      color: #fff;
      border: none;
      border-radius: 9px;
      padding: 13.5px 28.5px;
      font-size: 17px;
      cursor: pointer;
      font-weight: 600;
    }
    .nav-link {
      font-size: 20px;
      font-weight: 600;
    }
    .hero-section {
      width: 100%;
      max-width:1180px;
      margin: 0 auto;
      padding: 29px 63px 0px 63px;
      margin-bottom: 550px; /* LESS space for more balanced look */
    }
    .hero-title {
      font-size: 54px;
      font-weight: 900;
      margin-bottom: 14px;
      line-height: 1.11;
    }
    .hero-desc {
      font-size: 21px;
      color: #555;
      margin-bottom: 40px;
      max-width: 810px;
    }
    .price-card {
      background: #111;
      color: #fff;
      font-size: 29px;
      font-weight: 600;
      padding: 16px 40px;
      display: inline-block;
      border-radius: 12px;
      margin-bottom: 36px;
    }
    .hero-img-row {
      display: flex;
      justify-content: flex-end;
      gap: 0;
    }
    .hero-img {
      max-width: 567px;
      width: 100%;
      height: 378px;
      object-fit: cover;
      border-radius: 16px;
      margin-bottom: 27px;
    }
    .features-section {
      width: 100%;
      max-width:1180px;
      margin: 0 auto;
      padding: 0px 63px 0px 63px;
      margin-bottom: 550px;
    }
    .features-title {
      font-size: 50px;
      font-weight: 900;
      margin-bottom: 34px;
      margin-top: 22px;
    }
    .features-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px 0;
      margin-bottom: 54px;
      align-items: center;
      justify-items: center;
    }
    .feature-block {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      max-width: 342px;
    }
    .feature-block img {
      width: 135px;
      height: 135px;
    }
    .feature-title {
      font-size: 25px;
      font-weight: 700;
      margin-top: 14px;
      margin-bottom: 7px;
    }
    .feature-desc {
      font-size: 20px;
      color: #888;
      font-weight: 400;
      margin-bottom: 100px;
    }
    .how-section {
      width: 100%;
      max-width: 1180px;
      margin: 0 auto;
      display: flex;
      gap: 50px;
      align-items: flex-start;
      padding: 54px 63px 54px 63px;
      margin-bottom: 75px;
    }
    .how-img {
      width: 477px;
      height: 373px;
      object-fit: cover;
      border-radius: 15px;
    }
    .how-content {
      max-width: 576px;
      flex: 1;
    }
    .how-title {
      font-size: 42px;
      font-weight: 900;
      margin-bottom: 22px;
    }
    .how-desc {
      font-size: 23px;
      color: #666;
      font-weight: 400;
      line-height: 1.55;
      margin-bottom: 7px;
    }
    /* Contact Section */
    .contact-section {
      width: 100%;
      max-width: 800px;
      margin: 0 auto 70px auto;
      background: #fff;
      padding: 54px 20px 40px 20px;
      border-radius: 14px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.04);
    }
    .contact-heading {
      font-size: 38px;
      font-weight: 800;
      margin-bottom: 30px;
      text-align: center;
    }
    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 25px;
    }
    .contact-form label {
      font-size: 17px;
      font-weight: 600;
      margin-bottom: 8px;
      color: #222;
    }
    .contact-input,
    .contact-textarea {
      font-size: 18px;
      padding: 13px 14px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fafafa;
      resize: none;
      font-family: inherit;
      margin-bottom: 0;
    }
    .contact-textarea {
      min-height: 110px;
      max-height: 550px;
      width: 550px;
    }
    .contact-btn {
      width: 160px;
      background: #000;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 14px 0;
      font-size: 20px;
      font-weight: 700;
      margin-top: 12px;
      cursor: pointer;
      align-self: center;
      box-shadow: 0 4px 20px rgba(0,0,0,0.07);
      transition: background 0.15s;
    }
    .contact-btn:hover {
      background: #222;
    }
    .about-section {
      width: 100vw;
      background: #f3f3f3;
      margin-top: 43px;
      padding: 63px 0;
      margin-bottom: 1px;
    }
    .about-content {
      width: 1080px;
      margin: 0 auto;
      text-align: center;
    }
    .about-title {
      font-size: 36px;
      font-weight: 900;
      margin-bottom: 22px;
    }
    .about-desc {
      font-size: 21px;
      color: #333;
      font-weight: 400;
      margin-bottom: 11px;
      line-height: 1.5;
    }

    /* .splash {
      position: absolute;
      width: 20px;
      height: 20px;
      background: rgba(46, 44, 44, 0.8);
      border-radius: 50%;
      pointer-events: none;
      transform: translate(-50%, -50%);
      animation: splash 0.5s ease-out forwards;
    }

    @keyframes splash {
      0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
      100% { transform: translate(-50%, -50%) scale(8); opacity: 0; }
    } */

    /* Responsive */
    @media (max-width: 1300px) {
      .about-content, .features-section, .hero-section, .how-section { max-width: 98vw; }
      .about-content, .features-section, .hero-section, .how-section { width: 98vw; }
      .contact-section { max-width: 100vw; }
    }
    @media (max-width: 900px) {
      .main-header, .hero-section, .features-section, .how-section {
        padding: 18px 14px 0 14px;
      }
      .about-section { padding: 36px 0; }
      .how-section { flex-direction: column; gap: 18px; }
      .how-img { width: 90vw; height: auto; }
      .how-content { max-width: 100%; }
      .features-grid { grid-template-columns: 1fr; }
      .features-title, .hero-title, .how-title { font-size: 31px; }
      .contact-heading { font-size: 28px; }
      .price-card { font-size: 20px; padding: 9px 20px;}
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div class="main-header">
    <div class="site-brand">EcoVision</div>
    <div class="nav-actions">
      
      <button class="nav-btn" onclick="window.location.href='admin/admin_login.php'">Admin</button>
      <button class="nav-btn"  onclick="window.location.href='auth/login.php'">Sign In</button>
      <button class="nav-btn" onclick="window.location.href='auth/register.php'">Sign Up</button>
            
      <!--<span class="nav-link">Home</span>-->
    </div>
  </div>
  <!-- Hero Section -->
  <div class="hero-section">
    <div class="hero-title">Empower Your Future with<br>Sustainability</div>
    <div class="hero-desc">
      Unlock the potential of carbon credits to boost your income and protect the planet with smart agricultural practices.
    </div>
    <div class="price-card">Current CCT Price: ₹14.71</div>
    <div class="hero-img-row">
      <img src="./assets/20.webp" class="hero-img" alt="Sustainable City" />
    </div>
  </div>
  <!-- Features Section -->
  <div class="features-section">
    <div class="features-title">Why Choose Us?</div>
    <div class="features-grid">
      <div class="feature-block">
        <img src="./assets/blockchain.png" alt="Blockchain Transparency" />
        <div class="feature-title">Blockchain Transparency</div>
        <div class="feature-desc">Body text for whatever you’d like to add more to the subheading.</div>
      </div>
      <div class="feature-block">
        <img src="./assets/ai-brain.png" alt="AI Prediction" />
        <div class="feature-title">AI Prediction</div>
        <div class="feature-desc">Body text for whatever you’d like to expand on the main point.</div>
      </div>
      <div class="feature-block">
        <img src="./assets/add-user.png" alt="User Friendly Interface" />
        <div class="feature-title">User Friendly Interface</div>
        <div class="feature-desc">Body text for whatever you’d like to share more.</div>
      </div>
      <div class="feature-block">
        <img src="./assets/smart-contracts.png" alt="Smart Contracts" />
        <div class="feature-title">Smart Contracts</div>
        <div class="feature-desc">Body text for whatever you’d like to expand on the main point.</div>
      </div>
    </div>
  </div>
  <!-- How To Use Section -->
  <div class="how-section">
    <img src="./assets/9.webp" class="how-img" alt="Carbon Credit Platform" />
    <div class="how-content">
      <div class="how-title">How To Use?</div>
      <div class="how-desc">
        In this carbon credit trading platform, users first login with their credentials and add all relevant data on the profile page. The platforms’ AI model analyzes this data and converts it into carbon credit points. These points can be listed for sale in the marketplace. When a company expresses interest in purchasing these credits, blockchain technology ensures a secure transaction. Upon transaction, both the residential houses and company’s profiles are automatically updated to reflect the transaction, with points transferred securely. This platform ensures transparency and trust while enabling seamless trading between the parties.
      </div>
    </div>
  </div>
  <!-- Contact Us Section -->
  <div class="contact-section">
    <div class="contact-heading">Contact Us</div>
    <form id="contactForm" class="contact-form">
      <div>
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name" class="contact-input" placeholder="Enter your name">
      </div>
      <div>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" class="contact-input" placeholder="Enter your email">
      </div>
      <div>
        <label for="message">Message</label><br>
        <textarea id="message" name="message" class="contact-textarea" placeholder="Your message"></textarea>
      </div>
      <button type="submit" class="contact-btn">Submit</button>
    </form>
  </div>
  <script>
  document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent actual form submission
    alert("message sent successfully!");
    this.reset(); // Optional: clear the form after submission
  });
</script>


  <script>
  document.addEventListener('mousemove', e => {
    const splash = document.createElement('div');
    splash.classList.add('splash');
    splash.style.left = e.pageX + 'px';
    splash.style.top = e.pageY + 'px';
    document.body.appendChild(splash);

    // remove after animation
    setTimeout(() => splash.remove(), 500);
  });
</script>

  <!-- About Section -->
  <div class="about-section">
    <div class="about-content">
      <div class="about-title">EcoVision</div>
      <div class="about-desc">
        AI and ML Based Carbon Credit Trading Platform leverages blockchain for transparent and secure carbon credit transactions while utilizing AI to predict carbon credits from residential houses. This approach empowers businesses and residencies to trade credits with real-time insights, promoting sustainability through technology.
      </div>
    </div>
  </div>


</body>
</html>


