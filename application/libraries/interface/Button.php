<?php 

class Button
{
    public $ci;

    public function __construct() 
    {
        $this->ci = &get_instance();
    }

    /**
     * @author Pedro Henrique Guimarães
     * Esse método é responsável por construir um botão
     *
     * @param string $type - <a> <button> <input> 
     * @param string $label - Nome do botão
     * @param array $classes - Todas as classes necessárias para o botão 
     * @param array $attr - Atributos em geral
     * 
     * @return string
     */
    public function build($type, $label, $classes, $attr)
    {
            $button_open = "<$type ";

            $button_open .= $this->addClass($classes);
            $button_open .= $this->addAttr($attr);
            
            $button_open .= ">"; 
            $button_label = !empty($label) ? $label : "Please insert a label"; 
            $button_close = "</$type>";

            echo $button_open . $button_label . $button_close;
    }

     /**
     * @author Pedro Henrique Guimarães
     * 
     * renderiza o botão se o usuário tiver a permissão.
     * @return bool
     */
    public function verify($sub_modulo, $action)
    {

        if (empty($sub_modulo))
            die("Insira um submodulo para gerar o botão");

        if (empty($action))
            die("Insira uma ação para gerar o botão");
        
        $this->ci->db->select('sub_menu.nome')
                     ->from('grupo_acesso')
                     ->join('grupo_acesso_modulo', 'grupo_acesso_modulo.id_grupo_acesso = grupo_acesso.id_grupo_acesso')
                     ->join('permissao', 'permissao.id_grupo_acesso_modulo = grupo_acesso_modulo.id_grupo_acesso_modulo')
                     ->join('menu', 'permissao.id_menu = menu.id_menu')
                     ->join('sub_modulo', 'menu.id_sub_modulo = sub_modulo.id_sub_modulo')
                     ->join('sub_menu', 'menu.id_sub_menu = sub_menu.id_sub_menu')
                     ->where('grupo_acesso.id_grupo_acesso', $this->ci->session->userdata('user_id_grupo_acesso'))
                     ->where('sub_modulo.nome', ucfirst($sub_modulo))
                     ->where('sub_menu.nome', ucfirst($action));
        $result = $this->ci->db->get();

        if ($result->num_rows() > 0)
            return $this; 
        return null;
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * @param array 
     * @return string
     */
    private function addClass($classes)
    {
        $class = "";
        if (!is_array($classes))
            die('PLEASE NOOOOOOO, GOD NOOOOOOOOOOO: $classes must be an array'); 
        
        if (!is_null($classes)){
            $classes = implode(" ", $classes);
            $class .= " class='$classes'";
        }
    
        return $class;
    }

    /**
     * @author Pedro Henrique
     * 
     * @param array $attributes
     * @return string
     */
    private function addAttr($attributes)
    {
        $attr = "";
        if (!is_array($attributes)) {
            die('PLEASE NOOOOOOO, GOD NOOOOOOOOOOO: $attributes must be an array');
        }

        if (!is_null($attributes)){
            foreach ($attributes as $key => $att) {
                $attr .= " ". $key ."=" . $att;
            }
        }
        
        return $attr;
    }
        
}

