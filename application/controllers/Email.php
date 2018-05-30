<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Email extends CI_Controller {     
 
   /**
   * Author: Rodrigo Alves
   * Metodo que utiliza a biblioteca nativa do codeigniter para disparo de e-mails
   *
   **/
   public function EnviarEmail() {
      
      // Carrega a library email
      $this->load->library('email');
      //Recupera os dados do formulário
      $dados = $this->input->post();

      //Inicia o processo de configuração para o envio do email
      $config['protocol'] = 'mail'; // define o protocolo utilizado
      $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
      $config['validate'] = TRUE; // define se haverá validação dos endereços de email
         
      /*
      * Se o usuário escolheu o envio com template, define o 'mailtype' para html, 
      * caso contrário usa text
      */
      $config['mailtype'] = 'html';

      // Inicializa a library Email, passando os parâmetros de configuração
      $this->email->initialize($config);

      // Define remetente e destinatário
      $this->email->from('noreply@lambda.com', 'Lambda'); // Remetente
      $this->email->to($dados['email'], $dados['nome']); // Destinatário

      // Define o assunto do email
      $this->email->subject($dados['assunto']);

      $this->email->message($this->load->view('email/email-template',$dados, TRUE));
       
      /*
      * Se o envio foi feito com sucesso, define a mensagem de sucesso
      * caso contrário define a mensagem de erro, e carrega redireciona para pagina anterior
      */
      
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