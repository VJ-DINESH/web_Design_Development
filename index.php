<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simple Blog Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body.dark-mode {
      background-color: #121212;
      color: #ffffff;
    }

    .card.dark-mode {
      background-color: #1e1e1e;
      color: #ffffff;
    }

    .comment-box {
      background-color: #f1f1f1;
      border-radius: 5px;
    }

    .comment-box.dark-mode {
      background-color: #2c2c2c;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-light shadow-sm px-4">
    <a class="navbar-brand" href="#">My Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <button id="darkModeToggle" class="btn btn-outline-dark ms-auto" onclick="toggleDarkMode()">Dark Mode</button>
    </div>
  </nav>

  <!-- Blog Section -->
  <div class="container mt-4">
    <div class="row g-4">
      <!-- Blog Post 1 -->
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card h-100">
          <img src="public/php.png" class="card-img-top p-2 img-fluid" alt="PHP Blog Image" />
          <div class="card-body">
            <h5 class="card-title">PHP Hypertext Preprocessor</h5>
            <p class="card-text">Server-side scripting language for web development.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card h-100">
          <img src="public/js.png" class="card-img-top p-2 img-fluid" alt="JS Blog Image" />
          <div class="card-body">
            <h5 class="card-title">JavaScript Programming</h5>
            <p class="card-text">Client-side scripting for interactive web features.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>

      <!-- Blog Post 3 -->
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card h-100">
          <img src="public/laravel.png" class="card-img-top p-2 img-fluid" alt="Laravel Blog Image" />
          <div class="card-body">
            <h5 class="card-title">Laravel Framework</h5>
            <p class="card-text">Elegant PHP framework for modern web apps.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Comment Section -->
    <div class="container mt-5">
      <h4>Leave a Comment</h4>
      <form id="commentForm">
        <div class="mb-3">
          <input type="text" id="name" class="form-control" placeholder="Your Name" required />
        </div>
        <div class="mb-3">
          <textarea id="comment" class="form-control" rows="3" placeholder="Your Comment" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Post Comment</button>
      </form>
      <div id="commentsList" class="mt-4"></div>
    </div>
  </div>

  <!-- Bootstrap JS and Custom Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let isDarkMode = false;

    function toggleDarkMode() {
      isDarkMode = !isDarkMode;

      document.body.classList.toggle("dark-mode", isDarkMode);

      document.querySelectorAll(".card").forEach(card => {
        card.classList.toggle("dark-mode", isDarkMode);
      });

      document.querySelectorAll(".comment-box").forEach(box => {
        box.classList.toggle("dark-mode", isDarkMode);
        box.classList.toggle("text-white", isDarkMode);
      });

      document.getElementById("darkModeToggle").textContent = isDarkMode ? "Light Mode" : "Dark Mode";
    }

    document.getElementById("commentForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const name = document.getElementById("name").value;
      const comment = document.getElementById("comment").value;

      const commentHTML = `
        <div class="p-3 mb-2 comment-box ${isDarkMode ? 'dark-mode text-white' : ''}">
          <strong>${name}</strong>
          <p class="mb-0">${comment}</p>
        </div>
      `;
      document.getElementById("commentsList").insertAdjacentHTML("afterbegin", commentHTML);
      this.reset();
    });
  </script>
</body>
</html>
