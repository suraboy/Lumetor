<?php

use Tests\BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\{replace};

class {replace}Test extends BaseTestCase
{
    # use faker for mocking data
    use WithFaker;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testGetRoleListSuccess()
    {
        $response = $this->get('/api/v1/{replace_sm}s')->getContent();
        $this->assertJson($response);
    }

    public function testCreateRoleSuccess()
    {
        $response = $this->post('/api/v1/{replace_sm}s', $this->getRoleData())->getContent();
        $this->assertJson($response);
    }

    public function get{replace}Data(): array
    {
        return array(
        );
    }

    public function testUpdate{replace}Success()
    {
        ${replace_sm}     = factory({replace}::class)->create();
        $response = $this->put('/api/v1/{replace_sm}s/' . ${replace_sm}->id, ${replace_sm}->toArray())->getContent();
        $this->assertJson($response);
    }

    public function testDelete{replace}Success()
    {
        ${replace_sm}     = factory({replace}::class)->create();
        $response = $this->delete('/api/v1/{replace_sm}s/' . ${replace_sm}->id);
    }
}