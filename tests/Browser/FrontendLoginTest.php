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
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(1000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->type('email', 'admin@gmail.com')
                ->type('password', 'admin')  
                ->press('Login')  
                ->assertPathIs('/')  
                ->assertSee('welcome to profile')
                ->screenshot('login_test_ok');

        });
    }

    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(1000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->mouseover('.header-action-icon-2 > a') // Hover over the account icon
                ->waitFor('.cart-dropdown-wrap.cart-dropdown-hm2.account-dropdown') // Wait for the dropdown to appear
                ->assertVisible('.cart-dropdown-wrap.cart-dropdown-hm2.account-dropdown') // Ensure the dropdown is visible
                ->screenshot('profile_page_logout_button_present')
                ->clickLink('Sign out')
                ->assertPathIs('/')
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
        $this->browse(function (Browser $browser){
           $browser->visit('/login')
               ->screenshot('login_page_working')
               ->clickLink('Don\'t have an account? Sign up')
               ->assertPathIs('/register')
                ->type('name', 'krishna')
                ->radio('gender', 'male')
                ->type('email', 'krishna@gmail.com')
                ->type('password', 'krishna')
                ->type('confirmPassword', 'krishna')
                ->type('phone', '9487342961')  
                ->type('address', 'abcd')  
                ->type('pincode', '607302')
                // Select an option from the dropdown
                ->select('country', 'us')
                ->type('captcha', '123')
                // Assert the values are selected (optional)
                // ->assertChecked('gender', 'male')
                ->assertSelected('country', 'us')
                ->press('Register') 
                ->pause(1000) 
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
