<style>
    .nav-item.active{
        background-color:#696cff;
        border-radius:8px;
    }
</style>

<?php
    $currentController = $this->request->getParam('controller');
    $currentAction = $this->request->getParam('action');

    $isHome =$currentController === "Pages" && $currentAction==="display";
    $isArticles=$currentController === "Articles" && $currentAction==="home";
    $isForum=$currentController === "Forums" && $currentAction==="list";
    $isContactUs=$currentController === "ContactusContent" && $currentAction==="view";
    $isLogin=$currentController === "Users" && $currentAction==="login";

    ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">Active Hearts</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item <?php echo $isHome?'active':'' ?>"><?= $this->Html->link('Home',['controller'=>'Pages','action'=>'display'],['class'=>'nav-link']); ?></li>
                <li class="nav-item <?php echo $isArticles?'active':'' ?>"><?= $this->Html->link('Articles',['controller'=>'Articles','action'=>'home'],['class'=>'nav-link']); ?></li>
                <li class="nav-item <?php echo $isForum?'active':'' ?>"><?= $this->Html->link('Forum',['controller'=>'Forums','action'=>'list'],['class'=>'nav-link']); ?></li>
                <li class="nav-item <?php echo $isContactUs?'active':'' ?>"><?= $this->Html->link('Contact us',['controller'=>'ContactusContent','action'=>'view'],['class'=>'nav-link']); ?></li>
                <?php if($this->request->getSession()->read('Auth')) { ?>
                    <li class="nav-item dropdown">

                        <?= $this->Html->link('Dashboard','#',['class'=>'nav-link dropdown-toggle','id'=>'navbarDropdown','data-bs-toggle'=>'dropdown','aria-expanded'=>false]); ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li>
                              <?= $this->Html->link('Dashboard',['controller'=>'Users','action'=>'dashboard'],['class'=>'dropdown-item']); ?>
                          </li>
                          <li><?= $this->Html->link('Logout',['controller'=>'Users','action'=>'logout'],['class'=>'dropdown-item']); ?></li>

                        </ul>
                      </li>

                <?php }else{ ?>
                    <li class="nav-item <?php echo $isLogin?'active':'' ?>"><?= $this->Html->link('Login',['controller'=>'Users','action'=>'login'],['class'=>'nav-link']); ?></li>
                <?php }

                ?>

            </ul>
        </div>
    </div>
</nav>
