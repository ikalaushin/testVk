<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var array $result
 */
?>
    <h1>Просмотр новости Vk.com</h1>

    <div class="container border bg-white">
    <?php if($result){?>
        <div class="row pt-3">
            <div class="col-sm-1">
                <img src="<?=$result['author']['photo_50']?>" class="img-thumbnail rounded mx-auto d-block" title="Аватар">
            </div>
            <div class="col text-left">
                <span><?=$result['author']['first_name']?>
                    <?=$result['author']['last_name']?></span>
                <br> <small><?=(isset($result['author']['online']) && $result['author']['online']) ? 'Online' : 'Offline'?></small>
            </div>
            <div class="col text-right">
                <small><?=date(config_item('vk_date_format'), $result['date'])?></small>
            </div>
        </div>
        <hr>
        <div class="row py-3 mx-1">
            <div class="col-xl-12 text-justify">
                <?=$result['text'] ? $result['text'] : '[ Нет текста ]'?>
            </div>на
        </div>
        <?php if(isset($result['attachments']) && count($result['attachments'])){?>
            <div class="row py-3 border mx-2 bg-light">
                <div class="col-xl-12">
                    <div class="panel panel-primary autocollapse">
                        <div class="panel-heading clickable" style="cursor: pointer;">
                            <button class="panel-title btn btn-outline-dark w-100">Вложенные фотографии</button>
                        </div>
                        <div class="panel-body collapse m-2">
                            <div class="row">
                                <?php $i = 0;
                                foreach($result['attachments'] as $attachment) {
                                    if($attachment['type'] != 'photo') continue;
                                    if(fmod($i++,4) == 0) {?>
                            </div>
                            <div class="row">
                                    <?php }?>
                                <div class="col-3 my-1">
                                    <a href="<?=$attachment['photo']['sizes'][count($attachment['photo']['sizes']) - 1]['url']?>"
                                       data-toggle="lightbox"
                                       data-type="image"
                                       data-gallery="<?=$result['id']?>"
                                       data-title=""
                                       data-footer="<?=$attachment['photo']['text']?>"
                                    >
                                        <img src="<?=$attachment['photo']['sizes'][0]['url']?>" class="img-thumbnail rounded mx-auto d-block" title="Иллюстрация">
                                    </a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div >
            </div >
        <?php }?>
        <div class="row py-3">
            <div class="col-sm text-center border-right"><small>Комментариев</small><br><?=$result['comments']['count']?></div>
            <div class="col-sm text-center"><small>Лайков</small><br><?=$result['likes']['count']?></div>
            <div class="col-sm text-center border-left"><small>Репостов</small><br><?=$result['reposts']['count']?></div>
        </div>
    <?php }else{ ?>
            <div class="row py-3">
                <div class="col"></div>
                <div class="col text-center">
                    <strong class="">Пост не найден</strong><br>
                    <small>Попробуйте повторить попытку</small>
                </div>
                <div class="col"></div>
            </div>
    <?php }?>

    </div>
<script>
    $(document).on('click', '.panel div.clickable', function (e) {
        e.preventDefault();
        $(this).parent().children('.panel-body').collapse('toggle')
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({alwaysShowClose: true});
    });

    $(document).ready(function(e){
        $('.panel-body.collapse').collapse('hide');
    });
</script>