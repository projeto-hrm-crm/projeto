<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 3/26/18
 * Time: 11:52 PM
 */

/**
 * @author Pedro Henrique
 * Carrega o conteúdo dentro do template base.
 *
 * @param $header_path
 * @param $body_path
 * @param $footer_path
 * @param null $data
 */
function loadTemplate($header_path = "", $body_path = "", $footer_path = "", $data = null)
{
    $ci = &get_instance();

    if (empty($header_path))
        die('Não há caminho especificado para o cabeçalho');
    if (empty($body_path))
        die('Não há caminho especificado para o conteúdo');
    if (empty($footer_path))
        die('Não há caminho especificado para o rodapé');


    $ci->load->view($header_path, $data);
    $ci->load->view($body_path, $data);
    $ci->load->view($footer_path, $data);
}
