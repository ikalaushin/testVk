<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @var array $results
 * @var string $pagination
 */
?>


    <h1>Результат поиска новостей Vk.com</h1>
<?php if($q = $this->input->get('q')){?>
    <h2>Поисковая фраза "<?=$q?>"</h2>
<?php }?>

    <?php if(is_array($results['items']) && count($results['items'])){?>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="heading">
                    <th scope="col">#</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Лайки</th>
                </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < count($results['items']); $i++){
                $this->load->view('vk/result', ['result' => $results['items'][$i], 'number' => $this->input->get('start_from') + $i + 1]);
            }?>
            </tbody>
        </table>
        <?=$pagination?>
    <?php }else{ ?>
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col text-center">
                    <strong class="">Результатов не найдено</strong><br>
                    <small>Попробуйте повторить попытку</small><br>
                    <small>(<code>api.vk.com</code> время от времени отдает пустой результат запроса <code>newsfeed.search</code>)</small>
                </div>
                <div class="col"></div>
            </div>
        </div>
    <?php }?>