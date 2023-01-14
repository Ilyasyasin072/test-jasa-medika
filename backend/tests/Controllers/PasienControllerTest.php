<?php
    
namespace Tests\Controllers;
    
use Illuminate\Http\Response;
use Tests\TestCase;
    
class PasienControllerTest extends TestCase {
    
    public function testIndexReturnsDataInValidFormat() {

        $this->json('get', '/pasien/list')
            ->assertStatus(Response::HTTP_OK);
    }
    
}