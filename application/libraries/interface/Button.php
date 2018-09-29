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
     * @param String $type - <a> <button> <input> 
     * @param String $label - Nome do botão
     * @param Array $classes - Todas as classes necessárias para o botão 
     * @param Array $attr - Atributos em geral
     * 
     * @return String
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
     * @param Array 
     * @return String
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
     * @param Array $attributes
     * @return String
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

