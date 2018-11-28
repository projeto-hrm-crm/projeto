<?php 

class Config_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModulesAndSubModules()
    {
        $data = [];
        //Módulos
        $this->db->select("*")
                 ->from("modulo");

        $modulos = $this->db->get(); 

        $this->db->select("*")
                 ->from('sub_modulo');
        $sub_modulos = $this->db->get(); 

        if ($modulos->num_rows() > 0)
            $data['modulos'] = $modulos->result(); 

        if ($sub_modulos->num_rows() > 0)
            $data['sub_modulos'] = $sub_modulos->result();    
        
        
        return $data;        
    }
    
    public function createCompany($data)
    {
        $result = array();

        $created = $this->db->insert('empresa', array(
            'nome_fantasia'         => $data['nome_fantasia'],
            'sigla'                 => $data['sigla'],
            'razao_social'          => $data['razao_social'],
            'cnpj'                  => $data['cnpj'],
            'inscricao_estadual'    => $data['inscricao_estadual'],
            'classificacao'         => $data['classificacao'],
            'numero_funcionarios'   => $data['numero_funcionarios'],
            'dominio'               => $data['dominio'],
            'cor'                   => $data['cor'],
            'finalidade'            => $data['finalidade'],
            'imagem'                => 'imagem.png',
        ));
        
        $id_empresa = $this->db->insert_id();  

        if ($created) {
            $result['id_empresa']       = $id_empresa;
            $result['id_grupo_acesso']  = 1;
            $result['status']           = 200;
        }
        
        return $result;
    }

    public function insertModules($data)
    {
        $mod = $data['modules'];

        if (empty($mod))
            return ['status' => '204', 'error' => 'Nenhum módulo foi selecionado'];
        
        foreach ($mod as $submodule) {
            if (strpos($submodule, '.') !== false) {
                $module = explode(".", $submodule);
                $modules[$module[1]][] = $module[0];
            }
        }

        //Seta a grupo de acesso modulo para o admin
        foreach (array_keys($modules) as $key) {
            $this->db->insert('grupo_acesso_modulo', [
                'id_grupo_acesso' => 1,
                'id_modulo'       => $key
            ]);
        }

        //  
        $sql = "INSERT INTO `permissao` (`id_permissao`, `id_grupo_acesso_modulo`, `id_menu`) VALUES
        (1, 1, 1),
        (2, 1, 2),
        (3, 1, 3),
        (4, 1, 5),
        (5, 1, 7),
        (6, 1, 9),
        (7, 1, 11),
        (8, 1, 13),
        (9, 1, 15),
        (10, 1, 25),
        (11, 1, 37),
        (12, 1, 39),
        (13, 1, 52),
        (14, 1, 54),
        (15, 1, 17),
        (16, 1, 18),
        (17, 1, 19),
        (18, 1, 20),
        (19, 1, 21),
        (20, 1, 22),
        (21, 1, 23),
        (22, 1, 24),
        (23, 1, 27),
        (24, 1, 47),
        (25, 1, 48),
        (26, 1, 49),
        (27, 1, 56),
        (28, 1, 28),
        (29, 1, 29),
        (30, 1, 30),
        (31, 1, 31),
        (32, 1, 32),
        (33, 1, 33),
        (34, 1, 34),
        (35, 1, 35),
        (36, 1, 36),
        (37, 1, 43),
        (38, 1, 44),
        (39, 1, 45),
        (40, 1, 57),
        (41, 2, 3),
        (42, 2, 4),
        (43, 2, 6),
        (44, 2, 8),
        (45, 2, 10),
        (46, 2, 12),
        (47, 2, 14),
        (48, 2, 16),
        (49, 2, 26),
        (50, 2, 40),
        (51, 2, 41),
        (52, 2, 42),
        (53, 2, 50),
        (54, 2, 51),
        (55, 2, 53),
        (56, 2, 55),
        (57, 2, 46)";

        $this->db->query($sql);
    }

    public function createProfile($data)
    {
        
        $this->db->insert('pessoa', array(
            'nome' => $data['nome'],
            'email' => $data['email'],
            'data_criacao' => date('Y-m-d')
        ));

        $id_pessoa = $this->db->insert_id();

        $this->db->insert('usuario', array(
            'login'                 => $data['email'],
            'senha'                 => $data['pessoa'],
            'id_pessoa'             => $id_pessoa, 
            'empresa_id_empresa'    => $data['id_empresa']
        ));
        
    }

    public function basicConfigs()
    {

        //Cria o grupo de acesso admin
        $this->db->insert("grupo_acesso", [
            [
               'nome' => 'admin' 
            ]
        ]);

        //Insere os módulos 
        $this->db->insert("modulo", [
            [
                'nome'      => 'CRM',
                'icone'     => 'fa fa-shopping-cart',
                'descricao' => 'Customer Relationship Management'
            ],
            [
                'nome'      => 'HRM',
                'icone'     => 'fa fa-users',
                'descricao' => 'Human Resource Management'
            ]
        ]);

        //Insere os submódulos 
        $this->db->insert('sub_modulo', [
            [
                'nome'      => 'Produto',
                'icone'     => 'fa fa-gift',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Cliente',
                'icone'     => 'fa fa-user',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Candidato',
                'icone'     => 'fa fa-address-book',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Fornecedor',
                'icone'     => 'fa fa-truck',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Funcionário',
                'icone'     => 'fa fa-address-card',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Cargo',
                'icone'     => 'fa fa-briefcase',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Setor',
                'icone'     => 'fa fa-building',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'SAC',
                'icone'     => 'fa fa-phone-square',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Vaga',
                'icone'     => 'fa fa-newspaper-o',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Processo Seletivo',
                'icone'     => 'fa fa-address-card',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Candidato Etapa',
                'icone'     => 'fa fa-bars',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Pedido',
                'icone'     => 'fa fa-archive',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Processos Seletivos',
                'icone'     => 'fa fa-newspaper-o',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Sugestão',
                'icone'     => 'fa fa-bullhorn',
                'id_modulo' => 1,
                'descricao' => ""
            ],
            [
                'nome'      => 'Agenda',
                'icone'     => 'fa fa-calendar',
                'id_modulo' => 2,
                'descricao' => ""
            ],
            [
                'nome'      => 'Almoxarifado',
                'icone'     => 'fa fa-shopping-cart',
                'id_modulo' => 2,
                'descricao' => ""
            ]
        ]);

        //Cria o sub menu
        $this->db->insert("sub_menu", [
            [
                'nome' => 'Cadastrar'
            ],
            [
                'nome' => 'Editar'
            ],
            [
                'nome' => 'Listar'
            ],
            [
                'nome' => 'Excluir'
            ],
        ]);

       //SQL de inserção de menu 
       $sql = "INSERT INTO `menu` (`id_menu`, `id_sub_menu`, `id_sub_modulo`, `link`, `icone`, `status`) VALUES
                    (1, 1, 1, 'produto/cadastrar', 'fa fa-plus', 0),
                    (2, 3, 1, 'produto', 'fa fa-list', 1),
                    (3, 1, 2, 'cliente/cadastrar', 'fa fa-plus', 0),
                    (4, 3, 2, 'cliente', 'fa fa-list', 1),
                    (5, 1, 3, 'candidato/cadastrar', 'fa fa-plus', 0),
                    (6, 3, 3, 'candidato', 'fa fa-list', 1),
                    (7, 1, 4, 'fornecedor/cadastrar', 'fa fa-plus', 0),
                    (8, 3, 4, 'fornecedor', 'fa fa-list', 1),
                    (9, 1, 5, 'funcionario/cadastrar', 'fa fa-plus', 0),
                    (10, 3, 5, 'funcionario', 'fa fa-list', 1),
                    (11, 1, 6, 'cargo/cadastrar', 'fa fa-plus', 0),
                    (12, 3, 6, 'cargo', 'fa fa-list', 1),
                    (13, 1, 7, 'setor/cadastrar', 'fa fa-plus', 0),
                    (14, 3, 7, 'setor', 'fa fa-list', 1),
                    (15, 1, 8, 'sac/cadastrar', 'fa fa-plus', 0),
                    (16, 3, 8, 'sac', 'fa fa-list', 1),
                    (17, 2, 1, 'produto/editar', NULL, 0),
                    (18, 2, 2, 'cliente/editar', NULL, 0),
                    (19, 2, 3, 'candidato/editar', NULL, 0),
                    (20, 2, 4, 'fornecedor/editar', NULL, 0),
                    (21, 2, 5, 'funcionario/editar', NULL, 0),
                    (22, 2, 6, 'cargo/editar', NULL, 0),
                    (23, 2, 7, 'setor/editar', NULL, 0),
                    (24, 2, 8, 'sac/editar', NULL, 0),
                    (25, 1, 9, 'vaga/cadastrar', 'fa fa-plus', 0),
                    (26, 3, 9, 'vaga', 'fa fa-list', 1),
                    (27, 2, 9, 'vaga/editar', NULL, 0),
                    (28, 4, 1, 'produto/excluir', NULL, 0),
                    (29, 4, 2, 'cliente/excluir', NULL, 0),
                    (30, 4, 3, 'candidato/excluir', NULL, 0),
                    (31, 4, 4, 'fornecedor/excluir', NULL, 0),
                    (32, 4, 5, 'funcionario/excluir', NULL, 0),
                    (33, 4, 6, 'cargo/excluir', NULL, 0),
                    (34, 4, 7, 'setor/excluir', NULL, 0),
                    (35, 4, 8, 'sac/excluir', NULL, 0),
                    (36, 4, 9, 'vaga/excluir', NULL, 0),
                    (37, 1, 10, 'processo_seletivo/cadastrar', 'fa fa-plus', 0),
                    (39, 1, 12, 'pedido/cadastrar', 'fa fa-plus', 0),
                    (40, 3, 10, 'processo_seletivo', 'fa fa-list', 1),
                    (41, 3, 11, 'candidato_etapa', 'fa fa-list', 1),
                    (42, 3, 12, 'pedido', 'fa fa-list', 1),
                    (43, 4, 10, 'processo_seletivo/excluir', NULL, 0),
                    (44, 4, 11, 'candidato_etapa/excluir', NULL, 0),
                    (45, 4, 12, 'pedido/excluir', NULL, 0),
                    (46, 5, 10, 'processo_seletivo/info', 'fa fa-info', 0),
                    (47, 2, 10, 'processo_seletivo/editar', NULL, 0),
                    (48, 2, 11, 'candidato_etapa/editar', NULL, 0),
                    (49, 2, 12, 'pedido/editar', NULL, 0),
                    (50, 3, 13, 'processo_seletivo/', NULL, 1),
                    (51, 3, 14, 'sugestao', 'fa fa-list', 1),
                    (52, 1, 15, 'agenda/cadastrar', 'fa fa-plus', 0),
                    (53, 3, 15, 'agenda', 'fa fa-list', 1),
                    (54, 1, 16, 'almoxarifado/cadastrar', 'fa fa-plus', 0),
                    (55, 3, 16, 'almoxarifado', 'fa fa-list', 1),
                    (56, 2, 16, 'almoxarifado/editar', NULL, 0),
                    (57, 4, 16, 'almoxarifado/excluir', NULL, 0)";

        $this->db->query($sql);


    }
}