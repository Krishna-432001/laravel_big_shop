<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FrontendLoginTest extends DuskTestCase
{

    public function testVisitHomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')                
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(2000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->assertSee('Home')
                ->screenshot('home_page');
        });
    }

    public function testVisitLoginPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')                
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(2000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->assertSee('Login')
                ->pause(2000)
                ->screenshot('login_page');
        });
    }

    public function testLogin(): void
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->pause(2000) // Wait for the page to load
            ->waitFor('#onloadModal') // Ensure the modal is present
            ->assertVisible('#onloadModal') // Check if the modal is visible
            ->press('.btn-close') // Close the modal
            ->pause(1000) // Allow the modal to close
            ->assertMissing('#onloadModal') // Ensure the modal is no longer visible
            ->type('email', 'admin@gmail.com') // Enter email
            ->type('password', 'admin') // Enter password
            ->press('Log in') // Submit the form
            ->pause(3000) // Wait for the login to process
            ->assertPathIs('/')
            ->waitFor('#onloadModal') // Ensure the modal is present
            ->assertVisible('#onloadModal') // Check if the modal is visible
            ->press('.btn-close') // Close the modal // Check if redirected to home
            ->assertSee('welcome to profile') // Ensure the profile welcome message is displayed
            ->screenshot('login_test_ok');
    });
}


public function testLogout(): void
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->pause(2000) // Wait for the page to load
            ->waitFor('#onloadModal') // Ensure the modal is present
            ->assertVisible('#onloadModal') // Check if the modal is visible
            ->press('.btn-close') // Close the modal
            ->pause(1000) // Allow the modal to close
            ->assertMissing('#onloadModal') // Ensure the modal is no longer visible
            ->mouseover('.header-action-icon-2 > a') // Hover over the account icon
            ->waitFor('.cart-dropdown-wrap.cart-dropdown-hm2.account-dropdown') // Wait for the dropdown
            ->assertVisible('.cart-dropdown-wrap.cart-dropdown-hm2.account-dropdown') // Ensure the dropdown is visible
            ->clickLink('Sign out') // Click the sign-out link
            ->pause(2000) // Wait for logout process
            ->assertPathIs('/') // Confirm redirect to home after logout
            ->screenshot('logout_success');
    });
}



    public function testVisitRegisterPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')                
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(1000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->assertSee('Register')
                ->screenshot('register_page');
        });   
    }

    public function testRegister(): void
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->pause(2000) // Wait for the page to load
            ->waitFor('#onloadModal') // Ensure the modal is present
            ->assertVisible('#onloadModal') // Check if the modal is visible
            ->press('.btn-close') // Close the modal
            ->pause(2000) // Allow the modal to close
            ->assertMissing('#onloadModal') // Ensure the modal is no longer visible
            ->clickLink('Don\'t have an account? Sign up') // Navigate to register page
            ->assertPathIs('/register') // Confirm the register page is shown
            ->type('name', 'krishna') // Fill in the name
            ->radio('gender', 'male') // Select gender
            ->type('email', 'krishna@gmail.com') // Enter email
            ->type('password', 'krishna') // Enter password
            ->type('confirmPassword', 'krishna') // Confirm password
            ->type('phone', '9487342961') // Enter phone
            ->type('address', 'abcd') // Enter address
            ->type('pincode', '607302') // Enter pincode
            ->select('country', 'us') // Select country
            ->type('captcha', '123') // Enter captcha
            ->assertSelected('country', 'us') // Confirm country is selected
            ->press('Submit & Register') // Submit the form
            ->pause(2000) // Wait for the registration to process
            ->assertPathIs('/some-path-after-registration') // Replace with actual path after successful registration
            ->screenshot('register_success');
    });
}

    // public function testVisitForgetPasswordPage(): void
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/forget_password')->assertSee('Forget')->screenshot('forget_password_page');;
    //     });
    // }

    // public function testVisitResetPasswordPage(): void
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/reset_password')->assertSee('reset')->screenshot('reset_password_page');;
    //     });
    // }
}
