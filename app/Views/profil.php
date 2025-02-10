<div class="box-content">
    <div class="container-all">
        <img src="<?= base_url($user['aem_identity_photo']) ?>" alt="">
        <div class="infos-box">
            <h2><?= $user['aem_name'] ?></h2>
            <p><?= $user['aem_phone_number'] ?></p>
        </div>
        <div class="tools-bar">
            <ul>
                <li>Mon badge</li>
                <!-- <li>Mon Profil</li> -->
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="badge">
            <div class="button-container">
                <button id="downloadBadge">Télécharger
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFF">
                        <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
                    </svg>

                </button>
            </div>
            <div class="realBadge">
                <img src="<?= base_url('assets/images/badge_AEM.png') ?>" alt="">
                <div class="infos-container">
                    <div class="top">
                        <img src="<?= base_url('assets/images/AEM_Final.png') ?>" alt="">
                        <div class="picture-container">
                            <img src="<?= base_url($user['aem_identity_photo']) ?>" alt="<?= base_url($user['aem_identity_photo']) ?>">
                        </div>
                    </div>
                    <div class="bottom">
                        <p>Numéro matricule : <?= str_pad($user['aem_id_user'], 4, '0', STR_PAD_LEFT); ?></p>
                        <p>Nom : <?= $user['aem_name'] ?></p>
                        <p>Prénoms : <?= $user['aem_first_name'] ?></p>
                        <p>Téléphone : <?= $user['aem_phone_number'] ?></p>
                        <div class="qr_code">
                            <?= $barcode; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="timeline-container">
            <div class="each-timeline timeline-active">
                <aside>
                    <p> <span>1</span></p>
                    <div class="bar"></div>
                </aside>
                <article>
                    <h2>Inscription terminée
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3c5571">
                            <path d="M80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18q30 0 58.5 3t55.5 9l-70 70q-11-2-21.5-2H400q-71 0-127.5 17T180-306q-9 5-14.5 14t-5.5 20v32h250l80 80H80Zm542 16L484-282l56-56 82 82 202-202 56 56-258 258ZM400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm10 240Zm-10-320q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Z" />
                        </svg>
                    </h2>
                    <div class="content-text">
                        <p>Bienvenue dans la communauté AEM ! Vous faites désormais partie d’un réseau solidaire engagé.</p>
                    </div>
                </article>
            </div>

            <div class="each-timeline">
                <aside>
                    <p><span>2</span></p>
                    <div class="bar"></div>
                </aside>
                <article>
                    <h2> Participez aux activités
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3c5571">
                            <path d="M720-440v-80h160v80H720Zm48 280-128-96 48-64 128 96-48 64Zm-80-480-48-64 128-96 48 64-128 96ZM200-200v-160h-40q-33 0-56.5-23.5T80-440v-80q0-33 23.5-56.5T160-600h160l200-120v480L320-360h-40v160h-80Zm240-182v-196l-98 58H160v80h182l98 58Zm120 36v-268q27 24 43.5 58.5T620-480q0 41-16.5 75.5T560-346ZM300-480Z" />
                        </svg>
                    </h2>
                    <div class="content-text">
                        <p>Impliquez-vous dans les actions de l’association : événements, rencontres, projets collectifs...</p>
                    </div>
                </article>
            </div>

            <div class="each-timeline">
                <aside>
                    <p><span>3</span></p>
                    <div class="bar"></div>
                </aside>
                <article>
                    <h2> Proposez des idées innovantes
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3c5571">
                            <path d="M480-80q-26 0-47-12.5T400-126q-33 0-56.5-23.5T320-206v-142q-59-39-94.5-103T190-590q0-121 84.5-205.5T480-880q121 0 205.5 84.5T770-590q0 77-35.5 140T640-348v142q0 33-23.5 56.5T560-126q-12 21-33 33.5T480-80Zm-80-126h160v-36H400v36Zm0-76h160v-38H400v38Zm-8-118h58v-108l-88-88 42-42 76 76 76-76 42 42-88 88v108h58q54-26 88-76.5T690-590q0-88-61-149t-149-61q-88 0-149 61t-61 149q0 63 34 113.5t88 76.5Zm88-162Zm0-38Z" />
                        </svg>
                    </h2>
                    <div class="content-text">
                        <p>Contribuez à la croissance de l’AEM en partageant vos idées et en lançant des initiatives.</p>
                    </div>
                </article>
            </div>

            <div class="each-timeline">
                <aside>
                    <p><span>4</span></p>
                    <div class="bar"></div>
                </aside>
                <article>
                    <h2>Accumulez des points
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3c5571">
                            <path d="m320-240 160-122 160 122-60-198 160-114H544l-64-208-64 208H220l160 114-60 198ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                        </svg>
                    </h2>
                    <div class="content-text">
                        <p>Vos efforts sont récompensés : chaque participation et chaque idée validée vous rapportent des points.</p>
                    </div>
                </article>
            </div>

            <div class="each-timeline">
                <aside>
                    <p><span>5</span></p>
                    <div class="bar"></div>
                </aside>
                <article>
                    <h2>Obtenez un financement
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#3c5571">
                            <path d="M336-120q-91 0-153.5-62.5T120-336q0-38 13-74t37-65l142-171-97-194h530l-97 194 142 171q24 29 37 65t13 74q0 91-63 153.5T624-120H336Zm144-200q-33 0-56.5-23.5T400-400q0-33 23.5-56.5T480-480q33 0 56.5 23.5T560-400q0 33-23.5 56.5T480-320Zm-95-360h190l40-80H345l40 80Zm-49 480h288q57 0 96.5-39.5T760-336q0-24-8.5-46.5T728-423L581-600H380L232-424q-15 18-23.5 41t-8.5 47q0 57 39.5 96.5T336-200Z" />
                        </svg>
                    </h2>
                    <div class="content-text">
                        <p>Les membres les plus actifs et engagés sont prioritaires pour obtenir un soutien financier.</p>
                    </div>
                </article>
            </div>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<style>
    .material-icons {
        font-size: 24px;
        vertical-align: middle;
    }
</style>