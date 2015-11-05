<?php
//use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{

    public function testIndex()
    {
        $this->action('GET', 'HomeController@index');
        $this->assertResponseOk();
        $this->assertViewHas('apartments');
        $this->assertViewHas('slider_photos');
     }

}