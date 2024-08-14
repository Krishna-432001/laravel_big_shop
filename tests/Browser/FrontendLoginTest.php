<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FrontendLoginTest extends DuskTestCase
{

    // public function testVisitHomePage(): void
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')->assertSee('home')->screenshot('home_page');;
    //     });
    // }

    public function testVisitLoginPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')                
                ->pause(2000) // Pause for 1000 milliseconds (1 second)
                ->waitFor('#onloadModal') // Wait for the modal to appear
                ->assertVisible('#onloadModal') // Ensure the modal is visible
                ->press('.btn-close') // Press the close button
                ->pause(1000) // Optional: pause to visually confirm the modal is closed
                ->assertMissing('#onloadModal') // Assert that the modal is no longer visible
                ->assertSee('Login')
                ->screenshot('login_page');;
        });
    }

    // public function testVisitRegisterPage(): void
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/register')->assertSee('Register')->screenshot('register_page');;
    //     });   
    // }

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
