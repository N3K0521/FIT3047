<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'user_id' => 1,
                'user_type' => 'Lorem ipsum dolor sit amet',
                'user_email' => 'Lorem ipsum dolor sit amet',
                'user_fname' => 'Lorem ipsum dolor sit amet',
                'user_lname' => 'Lorem ipsum dolor sit amet',
                'user_password' => 'Lorem ipsum dolor sit amet',
                'registered_timestamp' => 1648392578,
                'passkey' => 'Lorem ipsum dolor sit amet',
                'timeout' => 1648392578,
            ],
        ];
        parent::init();
    }
}
