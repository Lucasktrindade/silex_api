<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 15/12/2016
 * Time: 19:39
 */

namespace Game\Controllers;

use Game\model\Bcrypt;
use Symfony\Component\HttpFoundation\Request;
use Game\Repository\PessoaRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Firebase\JWT\JWT;

class AuthController
{
    protected $pessoa;
    public function __construct(PessoaRepository $repo)
    {
        $this->pessoa = $repo;
    }

    public function Authenticate(Request $request)
    {
        $email = $request->request->get("email");
        $senha = $request->request->get("senha");
        $pessoa = $this->pessoa->findByEmail($email);
        if($pessoa != null){
            if(Bcrypt::check($senha,$pessoa->senha)){
                return new JsonResponse($this->GenerateToken($pessoa));
            } else{
                return new JsonResponse("Senha errada");
            }
        }
    }

    public function GenerateToken($pessoa)
    {
        $tokenId    = base64_encode(mcrypt_create_iv(32));
        $issuedAt   = time();
        $notBefore  = $issuedAt + 10;             //Adding 10 seconds
        $expire     = $notBefore + 1800;            // Adding 60 seconds
        $serverName = "http://localhost:8000";

        /*
         * Create the token as an array
         */
        $data = [
            'iat'  => $issuedAt,         // Issued at: time when the token was generated
            'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
            'iss'  => $serverName,       // Issuer
            'nbf'  => $notBefore,        // Not before
            'exp'  => $expire,           // Expire
            'data' => [                  // Data related to the signer user
                'uid'   => $pessoa->id, // userid from the users table
            ]
        ];

        $secretKey = base64_decode('stringsecreta');

        return JWT::encode(
            $data,      //Data to be encoded in the JWT
            $secretKey, // The signing key
            'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        );
    }
}