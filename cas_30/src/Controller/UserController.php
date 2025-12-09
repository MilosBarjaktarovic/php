<?php
namespace PHP28\Controller;

use PHP28\Models\User;

class UserController {

    public function register($data) {

        $username = trim($data['username']);
        $password = trim($data['password']);

        if(empty($username) || empty($password)) {
            return "Sva polja su obavezna!";
        }

        $userModel = new User();

        // Provera da li korisnik postoji
        if($userModel->getUserByUsername($username)) {
            return "Korisnik već postoji!";
        }

        // Hesiranje lozinke
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        if($userModel->createUser($username, $hashed)) {
            return "Uspešna registracija! Možete se ulogovati.";
        } else {
            return "Greška prilikom registracije!";
        }
    }

    public function login($data) {

        $username = trim($data['username']);
        $password = trim($data['password']);

        $userModel = new User();
        $user = $userModel->getUserByUsername($username);

        if(!$user) {
            return "Ne postoji takav korisnik!";
        }

        if(password_verify($password, $user['password'])) {
            return "Uspešno ste se ulogovali!";
        } else {
            return "Pogrešna lozinka!";
        }

        $mailServices = new services();
        $mailServices->sendMail('Registracija uspesna', 'Dobrodosli na nas sajt!');
    }
}
