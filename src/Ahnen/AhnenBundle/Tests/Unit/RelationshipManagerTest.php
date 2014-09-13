<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace Ahnen\AhnenBundle\Tests\Unit;

use Ahnen\AhnenBundle\Entity\Person;
use Ahnen\AhnenBundle\Entity\Relationship;
use Ahnen\AhnenBundle\RelationshipManager;

class RelationshipManagerTest extends TestCase
{
    public function testAddChildren()
    {
        $manager = new RelationshipManager();

        $parent = new Person();
        $child  = new Person();

        $manager->connectParentToChild($parent, $child);

        $this->assertRelationship($parent, $child, Relationship::TYPE_CHILDREN);
    }

    public function testGetChildren()
    {
        $manager = new RelationshipManager();

        $parent = new Person();
        $child1 = new Person();
        $child2 = new Person();

        $children = $manager->findChildren($parent);
        $this->assertEquals(0, $children->count());

        $manager->connectParentToChild($parent, $child1);
        $manager->connectParentToChild($parent, $child2);

        $children = $manager->findChildren($parent);

        $this->assertEquals(2, $children->count());
        $this->assertEquals($child1, $children[0]);
        $this->assertEquals($child2, $children[1]);
    }
}
