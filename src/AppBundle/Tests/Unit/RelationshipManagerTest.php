<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace AppBundle\Tests\Unit;

use AppBundle\Entity\Person;
use AppBundle\Entity\Relationship;
use AppBundle\RelationshipManager;

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
