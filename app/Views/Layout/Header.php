<header>
    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm align-middle" style="background: linear-gradient(0.9turn, #000000, #000000, #000000);">
        <div class="container justify-content-center">
            <a class="navbar-brand" style="animation: blink 1s infinite; color:yellow" href="<?= site_url() ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
  <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/>
  
  <style>
@keyframes blink {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
}
</style>
  
</svg> <?= BASE_NAME ?> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (session()->has('userid')) : ?>
                    <ul class="navbar-nav text-white me-auto mb-2 mb-lg-0">
                        <li class="nav-item text-white">
                            <a class="nav-link text-white" href="<?= site_url('keys') ?>">Keys</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link text-white" href="<?= site_url('keys/generate') ?>">Generate</a>
                        </li>
                    </ul>
                    <div class="float-right" >
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle pe-2"></i><?= getName($user) ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown"  >
                                <?php if (($user->level == 1) || ($user->level ==2)) : ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('settings') ?>">
                                            <i class="bi bi-gear"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                    <a class="dropdown-item" href="<?= site_url('Server') ?>">
                                                <i class="bi bi-controller"></i> Online System
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                        
                                        
                                        </li>
                                        <?php if($user->level == 1) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('admin/manage-users') ?>">
                                                <i class="bi bi-card-checklist"></i> Manage Users
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (($user->level == 1) || ($user->level ==2)) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= site_url('admin/create-referral') ?>">
                                                <i class="bi bi-people"></i> Create Referral
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <a class="dropdown-item" href="https://telegram.me/TECHNO_MODE_OWNER">
                                                <i class="bi bi-chat-square-dots"></i> Get Support
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    
                                    <li>
                                        <a class="dropdown-item text-danger" href="<?= site_url('logout') ?>">
                                            <i class="bi bi-box-arrow-in-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </div>
        <?php endif; ?>

        </div>
    </nav>
</header>