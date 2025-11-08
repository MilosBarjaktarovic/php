<?php

require_once "Baza.php";

class Korisnik extends Baza {

    // ✅ 1. Registracija korisnika
    public function register($email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->sql->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);

        if ($stmt->execute()) {
           echo "✅ Korisnik sa email-om $email je uspešno registrovan!<br>";
        } else {
            echo "❌ Greška prilikom dodavanja korisnika: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // ✅ 2. Ažuriranje korisnika
    public function update($id, $newEmail, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $this->sql->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $newEmail, $hashedPassword, $id);

        if ($stmt->execute()) {
            echo "📝 Korisnik ID $id je uspešno ažuriran!<br>";
        } else {
            echo "❌ Greška prilikom ažuriranja korisnika: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // ✅ 3. Brisanje korisnika
    public function delete($id) {
        $stmt = $this->sql->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "🗑️ Korisnik ID $id je uspešno obrisan!<br>";
        } else {
            echo "❌ Greška prilikom brisanja korisnika: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }
}

?>
