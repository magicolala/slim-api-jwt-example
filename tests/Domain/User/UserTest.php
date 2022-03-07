<?php
declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function userProvider(): array
    {
        return [
            [1, 'bill.gates', '123456', 'Bill', 'Gates'],
            [2, 'steve.jobs', '123456', 'Steve', 'Jobs'],
            [3, 'mark.zuckerberg', '123456', 'Mark', 'Zuckerberg'],
            [4, 'evan.spiegel', '123456', 'Evan', 'Spiegel'],
            [5, 'jack.dorsey', '123456', 'Jack', 'Dorsey'],
        ];
    }

    /**
     * @dataProvider userProvider
     * @param $id
     * @param $username
     * @param $password
     * @param $firstName
     * @param $lastName
     */
    public function testGetters($id, $username, $password, $firstName, $lastName)
    {
        $user = new User($id, $username, $password, $firstName, $lastName);

        $this->assertEquals($id, $user->getId());
        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($password, $user->getPassword());
        $this->assertEquals($firstName, $user->getFirstName());
        $this->assertEquals($lastName, $user->getLastName());
    }

    /**
     * @dataProvider userProvider
     * @param $id
     * @param $username
     * @param $password
     * @param $firstName
     * @param $lastName
     */
    public function testJsonSerialize($id, $username, $password, $firstName, $lastName)
    {
        $user = new User($id, $username, $password, $firstName, $lastName);

        $expectedPayload = json_encode([
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);

        $this->assertEquals($expectedPayload, json_encode($user));
    }
}
