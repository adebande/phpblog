<?php
namespace App\Table\Exception;

class NotFoundException extends \Exception {

    public function __construct(string $table, int $id)
    {
        $this->message = "No item matching id #$id in table '$table'";
    }

}