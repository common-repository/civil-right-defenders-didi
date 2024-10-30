<?php
namespace DIDIPlugin\DIDIApi;


class DIDIApiResponse
{
    /**
     * @var boolean
     */
    public $success;

    /**
     * @var array
     */
    public $errors;

    /**
     * @var string
     */
    public $error_message;

    /**
     * @var array
     */
    public $data;

    public function __construct($errors, $success, $data, $error_message = null)
    {
        $this->success = $success;
        $this->errors = $errors;
        $this->data = $data;
        $this->error_message = $error_message;
    }
}