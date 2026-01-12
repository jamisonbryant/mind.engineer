<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 *
 * Seeds a single admin user. Change the email/password after first login.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'admin@mind.engineer',
                'password' => password_hash('changeme', PASSWORD_DEFAULT),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
