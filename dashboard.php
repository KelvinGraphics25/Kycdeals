<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
    exit();
}

$phone = htmlspecialchars($_SESSION['phone'], ENT_QUOTES, 'UTF-8');


// Set timezone and login time
date_default_timezone_set("Africa/Nairobi");
if (!isset($_SESSION['login_time'])) {
    try {
        $_SESSION['login_time'] = date("d F Y, h:i A");
    } catch (Exception $e) {
        $_SESSION['login_time'] = "Unknown time";
    }
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
$login_time = $_SESSION['login_time'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<div style="text-align:right; padding: 10px;">
  <a href="logout.php" style="color:#0ff; font-weight:bold;">Logout</a>
</div>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KYC Deals Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('wallpaper.jpg') no-repeat center center fixed;
      background-size: cover;
      overflow-x: hidden;
      color: #fff;
    }
    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }
    .floating-shapes div {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: float 10s infinite ease-in-out;
    }
    .floating-shapes .shape1 { width: 100px; height: 100px; top: 10%; left: 20%; }
    .floating-shapes .shape2 { width: 60px; height: 60px; top: 50%; left: 70%; }
    .floating-shapes .shape3 { width: 80px; height: 80px; top: 30%; left: 40%; }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0); }
    }

    @keyframes glow {
      0% { filter: brightness(1); }
      100% { filter: brightness(1.6); }
    }

    .container {
      padding: 2rem;
    }

    .section {
      background: rgba(255, 255, 255, 0.05);
      padding: 1rem;
      margin: 1rem 0;
      border-radius: 10px;
    }

    .task {
      background: rgba(0, 255, 255, 0.1);
      margin: 0.5rem 0;
      padding: 0.5rem;
      border-radius: 6px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .task button {
      background: #00f0ff;
      border: none;
      padding: 0.4rem 0.8rem;
      color: black;
      border-radius: 5px;
      cursor: pointer;
    }

    @media screen and (max-width: 600px) {
      .advertisement { font-size: 1rem; }
    }
    .join-link {
  color: #00bfff;
  text-decoration: underline;
  font-weight: bold;
  animation: zoomInOut 2s infinite;
  display: inline-block;
}

@keyframes zoomInOut {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
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
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="floating-shapes">
    <div class="shape1"></div>
    <div class="shape2"></div>
    <div class="shape3"></div>
  </div>

<div class="advertisement-banner" style="background: #1a1a1a; padding: 16px 16px 12px; border-radius: 10px; margin-top: 30px; margin-bottom: 20px; box-shadow: 0 0 10px rgba(138, 43, 226, 0.4); font-size: 14px; color: #ccc; position: relative; overflow: visible;">

  <span style="position: absolute; top: -14px; left: 20px; background: #8a2be2; padding: 3px 10px; font-size: 11px; color: #ffffff; border-radius: 4px; font-weight: bold; box-shadow: 0 0 6px #8a2be2;">
    ADVERTISEMENT
  </span>

  🚀 <span style="color: #8a2be2;" id="typewriter-text"></span> 
<a href="https://kiknetworks.ct.ws/signup.php" target="_blank" class="join-link" style="color: #00bfff; text-decoration: underline;">Join now</a>
</div>



<h2 id="active-header" style="color:#0ff;">Active Tasks</h2>
<div class="section" id="active-tasks"></div>

<h2 id="expired-header" style="color:#f66;">Expired Tasks</h2>
<div class="section" id="expired-tasks"></div>

<footer>
  <p>&copy; 2025 || KYC Deals</p>
  <div class="whatsapp-icons">
    <a href="https://wa.me/254717389121"><i class="bi bi-whatsapp"></i> Admin One</a>
    <a href="https://wa.me/254799800366"><i class="bi bi-whatsapp"></i> Admin Two</a>
  </div>
</footer>

<script>
// Ask for Notification permission on load
document.addEventListener("DOMContentLoaded", () => {
  if ("Notification" in window) {
    if (Notification.permission === "default") {
      Notification.requestPermission().then(permission => {
        console.log("Notification permission:", permission);
      });
    }
  }
});

  const phrases = [
    "Join KikNetworks and earn daily",
    "It is absolutely free to start with ",
    "That is Affiliate Marketing ",
    "Or else choose a package to earn bigger",
    "Tap the link to join now",
    "Earn at your own comfort"
  ];

  let i = 0;
  let j = 0;
  let currentPhrase = [];
  let isDeleting = false;
  let isEnd = false;
  const typewriter = document.getElementById("typewriter-text");

  function loop() {
    isEnd = false;
    typewriter.innerHTML = currentPhrase.join("");

    if (i < phrases.length) {
      if (!isDeleting && j <= phrases[i].length) {
        currentPhrase.push(phrases[i][j]);
        j++;
        typewriter.innerHTML = currentPhrase.join("");
      }

      if (isDeleting && j <= phrases[i].length) {
        currentPhrase.pop();
        j--;
        typewriter.innerHTML = currentPhrase.join("");
      }

      if (j == phrases[i].length) {
        isEnd = true;
        isDeleting = true;
      }

      if (isDeleting && j === 0) {
        currentPhrase = [];
        isDeleting = false;
        i++;
        if (i === phrases.length) {
          i = 0; // loop
        }
      }
    }

    const speed = isEnd ? 2000 : isDeleting ? 50 : 80;
    setTimeout(loop, speed);
  }

  document.addEventListener("DOMContentLoaded", loop);
</script>

<audio id="notifSound" src="https://kginvestments.ct.ws/notifications.wav" preload="auto"></audio>

<script>
let previousTasksText = [];

// Ask permission for Notifications
document.addEventListener("DOMContentLoaded", () => {
  if ("Notification" in window && Notification.permission === "default") {
    Notification.requestPermission().then(permission => {
      console.log("Notification permission:", permission);
    });
  }
});

function loadTasks() {
    fetch('load_tasks.php')
        .then(response => response.json())
        .then(tasks => {
            const active = document.getElementById('active-tasks');
            const expired = document.getElementById('expired-tasks');
            const activeHeader = document.getElementById('active-header');
            const expiredHeader = document.getElementById('expired-header');

            active.innerHTML = '';
            expired.innerHTML = '';

            let hasActive = false;
            let hasExpired = false;
            let currentTasksText = [];

            tasks.forEach(task => {
                currentTasksText.push(task.text); // Track task content

                const div = document.createElement('div');
                div.style.padding = "10px";
                div.style.marginBottom = "10px";
                div.style.border = "1px solid #0ff";
                div.style.borderRadius = "8px";
                div.style.background = "rgba(255,255,255,0.05)";
                div.style.color = "#fff";
                div.innerHTML = `<strong>${task.text}</strong><br><small>Posted: ${task.time}</small>`;

                if (task.status === 'expired') {
                    div.style.opacity = 0.5;
                    div.style.textDecoration = "line-through";
                    expired.appendChild(div);
                    hasExpired = true;
                } else {
                    active.appendChild(div);
                    hasActive = true;
                }
            });

            // Compare tasks to detect new additions
            const isNew = JSON.stringify(currentTasksText) !== JSON.stringify(previousTasksText);
            if (isNew && currentTasksText.length > previousTasksText.length) {
                const audio = document.getElementById('notifSound');
                audio.play().catch(err => {
                    console.warn('Autoplay blocked or user not interacted:', err);
                });

                if (Notification.permission === "granted") {
                    new Notification("🆕 New Task Available!", {
                        body: "Check your dashboard for updates.",
                        icon: "verified.png"
                    });
                }
            }

            previousTasksText = currentTasksText;

            activeHeader.style.display = hasActive ? 'block' : 'none';
            expiredHeader.style.display = hasExpired ? 'block' : 'none';
        });
}

// Initial trigger and interval setup
loadTasks();
setInterval(loadTasks, 5000);

// Prime audio with user interaction to bypass autoplay block
document.addEventListener('click', () => {
    const audio = document.getElementById('notifSound');
    audio.play().then(() => {
        audio.pause();
        audio.currentTime = 0;
    }).catch(() => {});
}, { once: true });
</script>




  <!--<script src="tasks.js"></script>-->
</body>
</html>
