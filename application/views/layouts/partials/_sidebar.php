<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li>
                <a href="<?php route('data/inputdatagpon'); ?>">
                    <i class="fa fa-upload"></i> Input Gpon
                </a>
            </li>

            <li>
                <a href="<?php route('data'); ?>">
                    <i class="fa fa-file"></i> Semua Data
                </a>
            </li>

            <?php if ($this->auth->is_administrator()): ?>
                <li>
                    <a href="<?php route('user'); ?>">
                        <i class="fa fa-user"></i> User/Pelaksana
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
