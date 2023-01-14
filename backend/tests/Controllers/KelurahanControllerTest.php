<?php
    
namespace Tests\Controllers;
    
use Illuminate\Http\Response;
use Tests\TestCase;
    
class KelurahanControllerTest extends TestCase {
    
    public function testIndexReturnsDataInValidFormat() {

        $this->json('get', '/kelurahan/list')
            ->assertStatus(Response::HTTP_OK);
  }
    
}