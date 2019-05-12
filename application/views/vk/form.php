<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');
?>


    <h1>Поиск новостей Vk.com</h1>

	<?=form_open('vk/search', ['method' => 'get'])?>
        <div class="form-group">
            <label for="queryString"> Запрос для поиска</label>
            <?=form_input([
                'name' => 'q',
                'type' => 'text',
                'placeholder' => 'Введите поисковый запрос',
                'class' => 'form-control',
                'id' => 'queryString'
            ],
            '')?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close('')?>

