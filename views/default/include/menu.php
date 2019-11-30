<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/logo.png"></a>
    </div>
    <div class="navbar-collapse collapse">
         <?php
            $menu = new menu();
            echo $menu->menu();
            ?>  
    </div>
</div>