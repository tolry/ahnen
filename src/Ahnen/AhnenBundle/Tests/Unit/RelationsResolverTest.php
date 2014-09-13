<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace Ahnen\AhnenBundle\Tests\Unit;

use Ahnen\AhnenBundle\Entity\Person;
use Ahnen\AhnenBundle\Entity\Relationship;
use Ahnen\AhnenBundle\RelationshipManager;

class RelationshipResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testAddChildren()
    {
        $manager = new RelationshipManager();

        $parent = new Person();
        $child  = new Person();

        $manager->connectParentToChild($parent, $child);

        $this->assertEquals(1, $parent->getRelationshipsFrom()->count());
        $this->assertEquals(1, $child->getRelationshipsTo()->count());

        $this->assertEquals(
            $child->getRelationshipsTo()->first(),
            $parent->getRelationshipsFrom()->first()
        );

        $relationship = $parent->getRelationshipsFrom()->first();

        $this->assertEquals(Relationship::TYPE_CHILDREN, $relationship->getType());
        $this->assertEquals($parent, $relationship->getFrom());
        $this->assertEquals($child, $relationship->getTo());
    }
}
