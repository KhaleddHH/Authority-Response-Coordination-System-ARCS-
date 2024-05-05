(<?php
use PHPUnit\Framework\TestCase;

class ManageUsersTest extends TestCase
{
    /**
     * @test
     */
    public function testAddUserWithValidData()
    {
        
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

        // Start output buffering to capture potential header redirects or output
        ob_start();

        // Call the add-user.php script
        include 'test-files/add-user.php';

        // Get the output buffer contents
        $output = ob_get_clean();

        // Assert expected output
        $this->assertStringContainsString($output,'User successfuly added!',  'Successful user addition message displayed');
    }

    /**
     * @test
     */
    public function testAddUserWithEmptyFields()
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

        include 'test-files/add-user.php';

        $output = ob_get_clean();

        $this->assertStringContainsString($output,'<script>alert("All fields must be filled!");</script>');
    }

    /**
     * @test
     */
    public function testAddUserWithNonMatchingPasswords()
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

     
        include 'test-files/add-user.php';     
        $output = ob_get_clean();

        $this->assertStringContainsString($output,'<script>alert("Passwords not matching!");</script>');
    }
}
?>)