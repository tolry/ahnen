<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace Ahnen\AhnenBundle\Tests\Unit;

use Ahnen\AhnenBundle\Entity\Person;
use Ahnen\AhnenBundle\Entity\Relationship;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected function assertRelationship(Person $from, Person $to, $type)
    {
        $this->assertEquals(1, $from->getRelationshipsFrom()->count());
        $this->assertEquals(1, $to->getRelationshipsTo()->count());

        $this->assertEquals(
            $to->getRelationshipsTo()->first(),
            $from->getRelationshipsFrom()->first()
        );

        $relationship = $from->getRelationshipsFrom()->first();

        $this->assertEquals(Relationship::TYPE_CHILDREN, $relationship->getType());
        $this->assertEquals($from, $relationship->getFrom());
        $this->assertEquals($to, $relationship->getTo());
    }
}

