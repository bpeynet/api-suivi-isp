<?php

namespace App\Exceptions;

class ElementSavingException extends \Exception {
 
    public function render($request) {
        $data = [
            'error' => true,
            'message' => $this->getMessage()
        ];
        return response()->json($data, 400);
    }
}
