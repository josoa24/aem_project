<?php
$user =  $_SESSION['user'];

?>
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
    <title>Acceuil</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/acceuil.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $page_name . '.css') ?>">
    <script src="<?= base_url('assets/js/' . $page_name . '-search.js') ?>" defer></script>

</head>

<body>
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
                <p></p>
                <!-- <div class="notification-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#7f8b98">
                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                    </svg>
                </div>

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
                </div> -->

                <div class="profile-box">
                    <img src="<?= base_url($user['aem_identity_photo']) ?>" alt="">
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