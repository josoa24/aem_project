<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?= base_url('assets/icons/favicon-96x96.png') ?>" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/icons/favicon.svg') ?>" />
  <link rel="shortcut icon" href="<?= base_url('assets/icons/favicon.ico') ?>" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/icons/apple-touch-icon.png') ?>" />
  <link rel="manifest" href="<?= base_url('assets/icons/site.webmanifest') ?>" />
  <title>AEM ADMIN</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/template.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/' . $page_name . '.css') ?>">
  <script src="<?= base_url('assets/js/' . $page_name . '-search.js') ?>" defer></script>
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <img src="<?= base_url('assets/images/AEM_Final_blanc.png') ?>" alt="">
    </div>
    <ul class="menu">
      <li class="menu-category">GESTION DES MEMBRES</li>
      <li class="menu-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#7f8b98">
          <path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
        </svg>
        <a href="#">Validation des membres</a>
      </li>

      <li class="menu-category">ADMIN</li>
      <li class="menu-item">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#7f8b98">
          <path d="M680-280q25 0 42.5-17.5T740-340q0-25-17.5-42.5T680-400q-25 0-42.5 17.5T620-340q0 25 17.5 42.5T680-280Zm0 120q31 0 57-14.5t42-38.5q-22-13-47-20t-52-7q-27 0-52 7t-47 20q16 24 42 38.5t57 14.5ZM480-80q-139-35-229.5-159.5T160-516v-244l320-120 320 120v227q-19-8-39-14.5t-41-9.5v-147l-240-90-240 90v188q0 47 12.5 94t35 89.5Q310-290 342-254t71 60q11 32 29 61t41 52q-1 0-1.5.5t-1.5.5Zm200 0q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80ZM480-494Z" />
        </svg>
        <a href="addAdmin">Ajouter un admin</a>
      </li>
    </ul>
  </div>
  <div class="right-container">
    <header class="header-tools">
      <aside class="left-tools">
        <div class="menu-box">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#737a83">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
          </svg>
        </div>
        <input class="search" id="search-input" type="text" placeholder="Rechercher...">
      </aside>
      <article class="admin-tools">
        <div class="notification-icon">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#737a83">
            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
          </svg>
          <div class="notification-box">
            <div class="nav-notif">
              <p>Notification</p>
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#737a83">
                <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
              </svg>
            </div>
            <div class="notif-content">
              <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="each-notification">
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="profile-box">
          <img src="<?= base_url('assets/images/Josoa.jpg') ?>" alt="">
          <span class="status"></span>
          <div class="profile-tools">

          </div>
        </div>
      </article>
    </header>
    <?php include $page_name . ".php" ?>
  </div>
</body>

</html>