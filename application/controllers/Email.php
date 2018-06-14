<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Email extends CI_Controller {     
 
   /**
   * Author: Rodrigo Alves
   * Metodo que utiliza a biblioteca nativa do codeigniter para disparo de e-mails
   *
   * Aguarda os dados minimos nome e email do destinatario, assunto, e caminho do template 
   * de de redirecionameto do após o envio
   *
   **/
   public function EnviarEmail() {
      
      // Carrega a library email
      $this->load->library('email');
      
      //Recupera os dados do formulário
      $dados = $this->input->post();

      //Configurações para o envio do email
      $config['protocol'] = 'mail'; // define o protocolo utilizado
      $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
      $config['validate'] = TRUE; // define se haverá validação dos endereços de email
     
      $config['mailtype'] = 'html'; // tipo do email pode ser html ou texto

      // Inicializa a library Email, passando os parâmetros de configuração
      $this->email->initialize($config);

      // Remetente e destinatário
      $this->email->from('noreply@lambda.com', 'Lambda'); // Remetente
      $this->email->to($dados['email'], $dados['nome']); // Destinatário

      // Assunto do email
      $this->email->subject($dados['assunto']);

      $this->email->message($this->load->view($dados['template'],$dados, TRUE));
      
      
      if($this->email->send()) {
         $this->session->set_flashdata('Mensagem enviada com sucesso','Email enviado com sucesso!');
         redirect($dados['retorno']);
      }
      else {
         $this->session->set_flashdata('Mensagem enviada não pode ser enviada',$this->email->print_debugger());
         redirect($dados['retorno']);
      }
      
   }
}