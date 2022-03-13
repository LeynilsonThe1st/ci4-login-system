<?php
$uri = service('uri');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>CI4-Login-System</title>
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">CI4 Login System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <?php if (session()->get('isLoggedIn')) : ?>
          <div class="navbar-nav me-auto">
            <a class="nav-link <?= ($uri->getPath() == 'users/dashboard') ? 'active' : '' ?>" href="/users/dashboard">Dashboard</a>
            <a class="nav-link <?= ($uri->getPath() == 'users/profile') ? 'active' : '' ?>" href="/users/profile">Profile</a>
          </div>
          <div class="navbar-nav">
            <a class="nav-link" href="/users/logout">Logout</a>
          </div>
        <?php else : ?>
          <div class="navbar-nav">
            <a class="nav-link <?= ($uri->getPath() == 'users/login') ? 'active' : '' ?>" href="/users/login">Login</a>
            <a class="nav-link <?= ($uri->getPath() == 'users/register') ? 'active' : '' ?>" href="/users/register">Register</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>