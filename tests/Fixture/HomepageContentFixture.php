<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HomepageContentFixture
 */
class HomepageContentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'homepage_content';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title1' => 'Lorem ipsum dolor sit amet',
                'paragraph1' => 'Lorem ipsum dolor sit amet',
                'image1' => 'Lorem ipsum dolor sit amet',
                'title2' => 'Lorem ipsum dolor sit amet',
                'paragraph2' => 'Lorem ipsum dolor sit amet',
                'image2' => 'Lorem ipsum dolor sit amet',
                'title3' => 'Lorem ipsum dolor sit amet',
                'paragraph3' => 'Lorem ipsum dolor sit amet',
                'title4' => 'Lorem ipsum dolor sit amet',
                'paragraph4' => 'Lorem ipsum dolor sit amet',
                'image3' => 'Lorem ipsum dolor sit amet',
                'name1' => 'Lorem ipsum dolor sit amet',
                'usertype1' => 'Lorem ipsum dolor sit amet',
                'userdes' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
