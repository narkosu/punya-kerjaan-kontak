<div id="columns" style="margin-top:20px">	
    <?php
    foreach ((array) $dataProvider as $idx => $data) {
        ?>
        <div class="grid-product">

            <div style="width:100%;background: #fff;padding:10px;">
                <div style="float:left;margin-right:10px;">
                    <div class="avatarlogo" style="border-radius: 50%;overflow:hidden;width:64px;height:64px;">
                        <?php $company = $data->shop_store->company; ?>
                        <?php
                        $urlLogo = (!empty($company->picture_id) ?
                                        Yii::app()->baseUrl . '/images/' .
                                                Yii::app()->image
                                                ->renderVersion($company->picture_id, 'logo')
                                        ->urlpath : '');
                        ?>
                        <?php if (!empty($urlLogo)) { ?>
                            <img class="avatar" src="<?php echo $urlLogo ?>" style="width:64px">
                        <?php } ?>
                    </div>
                </div>        
                <div style="float:left;width:800px;">
                    <div class="product-title">
                        <?php echo CHtml::link(CHtml::encode($data->title), array('products/view', 'id' => $data->product_id)); ?>
                    </div>
                    <div>
                        <a rel="<?php echo Yii::app()->createUrl('members/profile/ajaxprofile/id/' . $data->shop_store->shop_name); ?>" href="<?php echo Yii::app()->baseUrl ?>/company/factory/view/id/<?php echo $data->shop_store->company->id ?>" class="qtipsy">
                            <?php echo (isset($data->shop_store->shop_name) ? $data->shop_store->company->company_name : 'Noname') ?></a>
                    </div>
                    <div>
                        <table class="listproductTable" style="width:100%;">
                            <tbody>
                                <tr style="clear:both;">
                                    <td width="110">
                                        <div class="product-overview-image">	
                                            <?php
                                            if ($data->images) {
                                                $this->renderPartial('/image/view', array('thumb' => true, 'model' => $data->images[0], 'size'=> '180x180'));
                                            } else {
                                                echo CHtml::image(Shop::register('no-pic.jpg'));
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="product-overview-description">
                                            <p> <?php echo substr($data->description, 0, 100) . '..'; ?> </p>
                                            <p><strong> <?php echo Shop::priceFormat($data->price); ?></strong> <br />
                                                <?php /* <p><?php echo Shop::pricingInfo(); ?></p> */ ?>
                                            <p><?php echo CHtml::link(Shop::t('Detail Produk'), array('products/view', 'id' => $data->product_id), array('class' => 'btn show-product')); ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <div style="padding-left:20px;">

            </div>	
        </div>
    <?php } ?>
</div>
