<?php 

class Notification
{
    /**
     * @var object codeigniter instance
     */
    public $getInstance; 

    /**
     * @var array notifications
     */
    public $notifications = array();

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Start point. 
     */
    public function __construct() 
    {
        $this->getInstance = &get_instance();
    }

    public function getNotifications($to_id)
    {
        $this->notifications = $this->format($this->getInstance->notificacao->get($to_id));
        return json_encode($this->notifications);
    }

    public function notify($from_id = 0, $to_id, $text)
    {
        $notification = [
            'from_id'       => $from_id,
            'to_id'         => $to_id, 
            'created_at'    => date('Y-m-d H:i:s'),  
            'notification'  => $text
        ];

        $this->db->insert('notification', $notification);
    }

    /**
     * @author Pedro Henrique Guimarães
     * 
     * Formatação de informações 
     */
    private function format(Array $notifications)
    {
        if (!is_array($notifications))
            return; 

        foreach ($notifications as $key => $notification) {
            if ($key == 'created')
                $this->getInstance->swicthTimestamp($key);
        }
        return json_encode($notifications);
    }

}