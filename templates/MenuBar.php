



<!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                <?php echo $form_hidden_parameters ?>
                  <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="q" name="q" type="text"
                       value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'utf-8'); ?>" required=""  oninvalid="this.setCustomValidity('The search query is empty!')" oninput="setCustomValidity('')"/>
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="submit" type="submit" value="<?=t("Search"); ?>" onclick="waiting_on()">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


    <?php if (isset($_SESSION['userid'])): ?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>

                <?php if($_SESSION['GoogleSignIn']==="Google"):?>
                        <img style="border:2px #4e73df solid; border-radius:100%; width:35px; height:35px;" src="<?php echo $_SESSION['imageProfile']; ?>" />
                <?php else : ?>
                    <div style="background-color:orange;top:auto;text-align:center;display:inline-block; border:2px #4e73df solid; padding:3px; border-radius:100%; width:35px; height:35px;">
                        <i style="font-size:18pt; color:#4e73df;" class="fas fa-user"></i>
                    </div>
                <?php endif; ?>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" style="color:gray; pointer-events: none;">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

            <?php if ($_SESSION['role'] == "admin"): ?>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item" target="_blank" title="Configuration"
                href="/search-apps/setup/">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
            </a>
             <a class="dropdown-item" target="_blank"
                 title="Manage structure, navigation and interactive filters by ontologies like thesauri or lists of named entities like organizations, persons or locations"
                 href="/search-apps/thesaurus/">
                 <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Thesaurus
             </a>

             <div class="dropdown-divider"></div>



            <a class="dropdown-item" target="_blank" title="Manage datasources"
                href="/search-apps/datasources/">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Datasources
             </a>
            <a class="dropdown-item" target="_blank" title="Configuration"
                href="/SitemapGenerator/index.php"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Ingest Websites
            </a>
             <div class="dropdown-divider"></div>

             <a class="dropdown-item" title="Import structured data"
                href="<?php echo buildurl(null, 'view', 'ImportTuples', null, null); ?>">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Knowledge Base Operations
             </a>

            <?php
        endif
?>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo buildurl(null, 'view', 'SearchLog', null, null); ?>">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Search log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo buildurl(null, 'view', 'LoginPage', null, null); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
            </li>
    <?php
    else: ?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Guest</span>
                <div style="background-color:#4e73df;;top:auto;text-align:center;display:inline-block; border:2px #4e73df solid; padding:3px; border-radius:100%; width:35px; height:35px;">
                <i style="font-size:18pt; color:white" class="fas fa-user"></i> </div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo buildurl(null, 'view', 'LoginPage', null, null); ?>">
                  <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              <span>Login</span></a>
              </div>
            </li>
    <?php
    endif
?>

