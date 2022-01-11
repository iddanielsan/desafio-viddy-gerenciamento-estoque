<?php

namespace App\Services;

use App\Models\User;

class AuthService {

    /**
     * Retorna credenciais de login
     *
     * @param array $data
     * @return bool|array
     */
    public function getLoginToken(array $data){
        $token = auth('api')->attempt($data);
        
        if(!$token) {
            return false;
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ];
    }
}