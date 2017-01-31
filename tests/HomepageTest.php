<?php
/**
 * Created by PhpStorm.
 * User: mcalvez
 * Date: 27/04/16
 * Time: 14:44
 */

class HomepageTest extends TestCase
{
    public function testHomepageAccess()
    {
        $test = $this->visit(route('home'));
        $test->assertResponseOk();
        $test->see('GIRPAV');
    }
}