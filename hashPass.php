<?php
function hashPassword($password) {
    // Generate a bcrypt hash of the password
    return password_hash($password, PASSWORD_BCRYPT);
}

function verifyPassword($password, $hashedPassword) {
    // Verify the password against its bcrypt hash
    return password_verify($password, $hashedPassword);
}
?>
