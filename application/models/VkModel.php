<?php
/**
 * VkModel.php
 * Created by PhpStorm.
 * Created at 12.05.2019 14:37 as part of test project
 * @author    : ikalaushin
 * @copyright 2013-2019 YOU GLOBAL LTD
 */


class VkModel extends  CI_Model {
    public function __construct() {;
        parent::__construct();
    }

    /**
     *
     * @param string $methodName
     * @param array  $methodParams
     *
     * @return string
     */
    private function __create_vk_url(string $methodName = '', array $methodParams = []){
        $params = [
            'access_token' => config_item('vk_service_key'),
            'v' => config_item('vk_api_version')
        ];
        return
            config_item('vk_base_url')
            . ($methodName ? $methodName : config_item('vk_search_method')) . '?'
            . http_build_query(array_merge($methodParams, $params));
    }

    /**
     *
     *
     * @param string $methodName
     * @param array  $methodParams
     *
     * @return mixed
     */
    private function __make_vk_api_request(string $methodName = '', array $methodParams = []) {
        try {
            $url = $this->__create_vk_url($methodName, $methodParams);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);

            if (curl_errno($ch)) {
                show_error(curl_error($ch));
                return false;
            } else {
                $decodedData = json_decode($data, true);
                curl_close($ch);
                return $decodedData['response'];
            }
        }catch (Exception $e){
            show_error($e->getMessage());
            return false;
        }
    }

    /**
     * Get search results from VK
     *
     * @param $q
     *
     * @return mixed
     */
    public function search($q, $start_from = 0) {
        $params = [
            'q' => $q,
            'filters' => 'post',
            'extended' => 0,
            'count' => 20,
            'start_from' => $start_from
        ];
        $result = $this->__make_vk_api_request(config_item('vk_search_method'), $params);


        return $result;
    }

    public function getNewsById($id = '') {

        $params = [
            'posts' => $id,
            'extended' => 1,
        ];
        $res = $this->__make_vk_api_request(config_item('vk_getbyid_method'), $params);
        $result = isset($res['items'][0]) ? $res['items'][0] : null;
        if($result && isset($res['profiles'][0])){
            $result['author'] = $res['profiles'][0];
        }else{
            if($result && isset($res['groups'][0])) {
                $result['author'] = [
                    'first_name' => $res['groups'][0]['name'],
                    'last_name' => '',
                    'photo_50' => $res['groups'][0]['photo_50'],
                ];
            }elseif($result){
                $result['author'] = null;
            }
        }

        return $result;
    }
}