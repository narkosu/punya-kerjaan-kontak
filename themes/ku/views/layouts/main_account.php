<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo Yii::app()->name ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styleaccount.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
    </head>
    <body>
        <?php
            include('_header.php');
            ?>

        <!-- wrapper start -->
        <div id="wrapper">

            <!-- container start -->
            <div id="left-container">      
                <div class="account_avatar">

                </div>
                <!--  menu -->
                <div class="left-menu">
                  <ul class="menu-grey">
                       <li>
                            <div style="padding:10px 0px;">PRIBADI</div>
                       </li>
                       <li>
                            <a href="<?php echo Yii::app()->createUrl('setting')?>">Profil</a>
                        </li>
                        <li>
                            <a href="">Ganti Password</a>
                        </li>
                        <li>
                              <div style="padding:10px 0px;">PERUSAHAAN</div>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('company/setting')?>">Profil</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('company/produk')?>">Produk</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="container">      
                <?php echo $content ?>
            </div>  
            
            <!-- container end -->
            <div class="boo-clr"></div> 	
        </div>
        <!-- wrapper end -->

        <!-- footer start -->
        <?php include('_footer.php')?>
        <!-- footer end -->
    </body>
</html>
