<?php
use PHPUnit\Framework\TestCase;

require_once 'test-files/signup.php'; 

class SignUpTest extends TestCase
{
    /**
     * @test
     */
    public function testSignUpWithValidData()
    {
        // Simulate form input data
        $_POST = [
            'username' => 'john.doe',
            'password' => 'Password123',
            'confirm-password' => 'Password123',
            'first-name' => 'John',
            'last-name' => 'Doe',
            'email' => 'john.doe@example.com',
            'date-of-birth' => '1990-01-01',
            'permission' => 'user'
        ];

        // Start output buffering to capture header
        ob_start();

        // Call the signup function
        signup();

        // Get the output buffer contents
        $output = ob_get_clean();

        // Assert redirection to login page
        $this->assertStringContainsString($output, 'location:../index.php');
    }

    /**
     * @test
     */
    public function testSignUpWithEmptyFields()
    {
        $_POST = [
            'username' => 'john.doe',
            'password' => 'Password123',
            'confirm-password' => 'Password123',
            'first-name' => '',
            'last-name' => '',
            'email' => '',
            'date-of-birth' => '',
            'permission' => 'user'
        ];
        ob_start();
     
        signup();
        $output = ob_get_clean();

        $this->assertStringContainsString($output, '<script>alert(\"All fields must be filled!\");</script>');
        
    }

    /**
     * @test
     */
    public function testSignUpWithNonMatchingPasswords()
    {
        $_POST = [
            'username' => 'john.doe',
            'password' => 'Password123',
            'confirm-password' => 'DifferentPassword',
            'first-name' => 'John',
            'last-name' => 'Doe',
            'email' => 'john.doe@example.com',
            'date-of-birth' => '1990-01-01',
            'permission' => 'user'
        ];
        ob_start();

        signup();
        $output = ob_get_clean();

        $this->assertStringContainsString($output, '<script>alert(\"Passwords not matching!!\");</script>');
        
    }
}
?>
