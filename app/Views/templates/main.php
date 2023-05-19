<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?= $title ?></title>
  <!-- Vendors styles-->
  <link rel="stylesheet" href="/assets/vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="/assets/css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
  <link href="/assets/css/examples.css" rel="stylesheet">
  <style>
    .bg-markasmasak {
      background-color: #FFDAEB;
    }

    .btn-markasmasak {
      background-color: #FFDAEB;
    }

    .btn-markasmasak:hover {
      background-color: #FFE1EB;
    }
  </style>
</head>

<body>
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <div class="sidebar-brand-full">
        <h4 class="fst-italic">Markas Masakan</h4>
      </div>
      <div class="sidebar-brand-narrow">
        <h5 class="fst-italic">MM</h5>
      </div>
      <!-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="/assets/img/markas-masak.jpg"></use>
      </svg>
      <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="/assets/img/markas-masak.jpg"></use>
      </svg> -->
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-title">Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="/user">
          <svg class="nav-icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg> User
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/recipe">
          <svg class="nav-icon">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
          </svg> Masakan
        </a>
      </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <svg class="icon icon-lg">
            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/assets/assets/brand/coreui.svg#full"></use>
          </svg>
        </a>
        <ul class="header-nav ms-3">
          <p class="my-auto"><?= session()->get('nama') ?></p>
          <li class="nav-item dropdown">
            <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="/assets/img/pp-default.png" alt="<?= session()->get('email') ?>">
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Settings</div>
              </div>
              <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Profile
              </a>
              <a class="dropdown-item" href="#">
                <svg class="icon me-2">
                  <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg> Settings
              </a>
              <a class="dropdown-item" href="/login/logout/<?= session()->get('id') ?>">
                <svg class="icon me-2">
                  <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </header>
    <div class="body flex-grow-1 px-3">
      <?= $this->renderSection('content') ?>
    </div>
    <footer class="footer">
      <div>
        <p>&copy; Markas Masakan</p>
      </div>
      <div class="ms-auto">
        Powered by&nbsp;
        <a href="https://coreui.io/docs/">CoreUI UI Components</a>
      </div>
    </footer>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="/assets/vendors/simplebar/js/simplebar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script>
  </script>

</body>

</html>