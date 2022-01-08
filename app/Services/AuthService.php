<?php

namespace App\Services;

class AuthService {

    /**
     * Retorna credenciais de login
     *
     * @param array $data
     * @return bool|array
     */
    public function getLoginToken(array $data){
        $token = auth()->attempt($data);

        if(!$token) {
            return false;
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ];
    }
}