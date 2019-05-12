<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$result['short'] = mb_strlen($result['text']) > 150 ? mb_substr($result['text'], 0, 150) . '...' : ($result['text'] ? $result['text'] : '[ Нет текста ]');

?>
            <tr>
                <th scope="row"><?=$number?></th>
                <td>
                    <?php if(isset($result['attachments'][0]['type']) && $result['attachments'][0]['type'] == 'photo'){?>
                        <?=anchor('vk/view/'. $result['owner_id'] . '_' . $result['id'],
                            '<img src="' . $result['attachments'][0]['photo']['sizes'][0]['url'] . '" title="Иллюстрация" class="img-thumbnail rounded mx-auto d-block w-75">')?>
                    <?php }else{ ?>
                        <?=anchor('vk/view/'. $result['owner_id'] . '_' . $result['id'],
                            '<img src="' . base_url(config_item('dummy_image')) . '" title="Иллюстрация" class="img-thumbnail rounded mx-auto d-block w-75">')?>
                    <?php }?>
                </td>
                <td><?=anchor('vk/view/'. $result['owner_id'] . '_' . $result['id'] , $result['short'])?></td>
                <td><?=date(config_item('vk_date_format'), $result['date'])?></td>
                <td class="text-center"><?=$result['likes']['count']?></td>
            </tr>
