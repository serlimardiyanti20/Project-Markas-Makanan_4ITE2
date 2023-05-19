<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?= $title ?></title>
  <meta name="theme-color" content="#ffffff">
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
  <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <?= $this->renderSection('content') ?>
        </div>
      </div>
    </div>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="/assets/vendors/simplebar/js/simplebar.min.js"></script>
  <script>
  </script>

</body>

</html>