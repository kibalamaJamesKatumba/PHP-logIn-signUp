# PHP-logIn-signUp
This PHP project is a user authentication system with secure sign-up and login functionality.

## Exposed Functions:

*   `signUp($table, $fullname, $email, $username, $password)`
    *   Registers a new user, securely storing their details along with a hashed password.
*   `logIn($table, $username, $password)`
    *   Authenticates a user by verifying the provided username and password.

## How it Works:

*   **Sign Up:**
    *   Captures the user's full name, email, username, and a securely hashed version of their password.
    *   All data is saved into the database using prepared statements to effectively prevent SQL injection vulnerabilities.
*   **Login:**
    *   Compares the provided username to existing records.
    *   Verifies the password using PHP's `password_verify()` function, ensuring secure authentication.
*   **Database Connection:**
    *   Managed centrally by the `Database` class.
    *   Connection credentials are securely loaded from `DatabaseConfig.php`.
