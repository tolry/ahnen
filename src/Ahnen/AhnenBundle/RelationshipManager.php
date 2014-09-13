<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace Ahnen\AhnenBundle;

use Ahnen\AhnenBundle\Entity\Person;
use Ahnen\AhnenBundle\Entity\Relationship;

class RelationshipManager
{
    public function connectParentToChild(Person $parent, Person $child)
    {
        $relationship = new Relationship($parent, $child, Relationship::TYPE_CHILDREN);

        $parent->getRelationshipsFrom()->add($relationship);
        $child->getRelationshipsTo()->add($relationship);
    }
}
