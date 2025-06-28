<?php

namespace Tests\Unit;

use App\Models\Pet;
use Illuminate\Database\ConnectionResolver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\SQLiteConnection;
use PDO;
use PHPUnit\Framework\TestCase;

class PetRelationshipTest extends TestCase
{
    /** @test */
    public function reminders_relationship_is_has_many(): void
    {
        $pdo = new PDO('sqlite::memory:');
        $connection = new SQLiteConnection($pdo);

        $resolver = new ConnectionResolver(['testing' => $connection]);
        $resolver->setDefaultConnection('testing');

        Model::setConnectionResolver($resolver);

        $pet = new Pet();

        $this->assertInstanceOf(HasMany::class, $pet->reminders());
    }
}
