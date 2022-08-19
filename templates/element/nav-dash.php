<style>
  .unread{
    display: inline-block;
    width: 15px;
    height: 15px;
    text-align: center;
    background-color: red;
    border: red 1px solid;
    border-radius: 50%;
    line-height: 15px;
    color: white;
    font-size: 12px;
    margin-left: 5px;
    padding-top: 0px;

  }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
              <?= $this->Html->link('<span class="app-brand-text demo menu-text fw-bolder ms-2">User Dashboard</span>',
              ['controller'=>'Forums','action'=>'notification'],['escape'=>false,'class'=>'app-brand-link']); ?>


            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <li class="menu-item">
                <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-table"></i>
              <div data-i18n="Tables">Homepage</div>',
                    ['controller'=>'pages','action'=>'display'],['escape'=>false,'class'=>'menu-link']); ?>
            </li>

            <li class="menu-item">
                <?php if($this->getRequest()->getSession()->read('notification')>0){
                    echo $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Notifications</div><span class="unread">'.$this->getRequest()->getSession()->read('notification').'</span>',
                       ['controller'=>'Forums','action'=>'notification'],['escape'=>false,'class'=>'menu-link']);
                }else{
                    echo $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">Notifications</div>',
                       ['controller'=>'Forums','action'=>'notification'],['escape'=>false,'class'=>'menu-link']);
                } ?>
            </li>

            <!-- forums -->
            <?php if($this->request->getSession()->read('Auth')['User']['user_type']=='admin'){ ?>
              <li class="menu-item">
              <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">Articles</div>',
                  ['controller'=>'Articles','action'=>'index'],['escape'=>false,'class'=>'menu-link']); ?>
              </li>
            <?php } ?>

            <li class="menu-item">
            <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Forums</div>',
              ['controller'=>'Forums','action'=>'index'],['escape'=>false,'class'=>'menu-link']); ?>
            </li>



             <?php if($this->request->getSession()->read('Auth')['User']['user_type']=='admin'||$this->request->getSession()->read('Auth')['User']['user_type']=='moderator'){ ?>
              <li class="menu-item">
                <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Pending Approvals</div><span class="unread">'.$allUnApprove.'</span>',
                    ['controller'=>'Forums','action'=>'approved','forum'],['escape'=>false,'class'=>'menu-link']); ?>
                </li>
              <?php } ?>

              <?php if($this->request->getSession()->read('Auth')['User']['user_type']=='admin'||$this->request->getSession()->read('Auth')['User']['user_type']=='moderator'){ ?>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Forum Management</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Delete forums</div>',
                    ['controller'=>'Forums','action'=>'all'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                    <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Delete comments</div>',
                    ['controller'=>'Comments','action'=>'all'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>

                  </ul>
                </li>
              <?php } ?>

              <?php if($this->request->getSession()->read('Auth')['User']['user_type']=='admin'||$this->request->getSession()->read('Auth')['User']['user_type']=='moderator'){ ?>
                  <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">User Management</div>',
                        ['controller'=>'Users','action'=>'managment'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                  <?php } ?>

                  <?php if($this->request->getSession()->read('Auth')['User']['user_type']=='admin'){ ?>

                    <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Edit Website</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Homepage</div>',
                    ['controller'=>'HomepageContent','action'=>'add'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                    <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Fourms</div>',
                    ['controller'=>'ForumContent','action'=>'add'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                    <li class="menu-item">
                    <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Articles</div>',
                    ['controller'=>'ArticleContent','action'=>'add'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                    <li class="menu-item">
                        <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Contact Us</div>',
                            ['controller'=>'ContactusContent','action'=>'edit'],['escape'=>false,'class'=>'menu-link']); ?>
                    </li>
                  </ul>
                </li>


              <?php } ?>
            <li class="menu-item">
            <?= $this->Html->link('<i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Logout</div>',
              ['controller'=>'Users','action'=>'logout'],['escape'=>false,'class'=>'menu-link']); ?>
            </li>


          </ul>
        </aside>
