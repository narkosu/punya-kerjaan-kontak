<div id="header">
    <div id="blockHeader">
        <!-- logo -->
        <div class="logo">
            <a href="<?php echo Yii::app()->baseUrl ?>" class="logo-title">
                KONTAKUSAHA
            </a>
        </div>
        <!-- logo end -->

        <!-- topmenu-->
        <div id="topright">
            <ul id="topmenu">
                <li class="signup">
                    <a href="<?php echo Yii::app()->createUrl('/produk') ?>">PRODUK</a>
                    <a href="<?php echo Yii::app()->createUrl('/company') ?>">PENYEDIA</a>
                </li>
                <?php if (Yii::app()->user->isGuest) { ?>
                <li class="signup">
                    <a href="<?php echo Yii::app()->createUrl('/site/login') ?>">LOGIN</a>
                    <a href="<?php echo Yii::app()->createUrl('/site/signup') ?>">SIGN UP <span class="red">(FREE)</span></a>
                </li>
                <?php } else { ?>
                <li class="signin">
                    <a href="<?php echo Yii::app()->createUrl('/setting')?>" title="profile"	>
                        My Account
                    </a>
                    <a href="<?php echo Yii::app()->createUrl('/members/'.Yii::app()->user->name)?>"><?php echo Yii::app()->user->name ?></a>
                    <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">SIGN OUT </a>
                </li>    
                <?php } ?>
            </ul>      
        </div>

        <!-- topmenu end-->
        <div style="clear:both;"></div>	
    </div>
</div>	
<!-- header end -->
