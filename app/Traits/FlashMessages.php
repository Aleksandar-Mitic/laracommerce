<?php

namespace App\Traits;

trait FlashMessages
{

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];

    /**
     * @param array $message
     * @param string $type
     * @return void
     */
    public function setFlashMessage($message, $type)
    {
        // Instantiate $messageType and set default to 'infoMessages'
        $messageType = 'infoMessages';

        switch ($type) {
            case 'info':
                $messageType = 'infoMessages';
                break;
            case 'success':
                $messageType = 'successMessages';
                break;            
            case 'error':
                $messageType = 'errorMessages';
                break;            
            case 'warning':
                $messageType = 'warningMessages';
                break;            
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) 
            {
                array_push($this->$messageType, $value);
            }
        } else {
            array_push($this->$messageType, $message);
        }
    }


    /**
     * @return array
     */
    protected function getFlashMessage()
    {
        return [
            'error'     =>  $this->errorMessages,
            'info'      =>  $this->infoMessages,
            'success'   =>  $this->successMessages,
            'warning'   =>  $this->warningMessages,
        ];
    }

    /**
     * Flushing flash messages to Laravel's session
     */
    protected function showFlashMessages()
    {
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }

}