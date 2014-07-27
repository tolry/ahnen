<?php
/*
 * @author Tobias Olry <tobias.olry@gmail.com>
 */

namespace Ahnen\AhnenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Relationships
{
    const TYPE_CHILDREN    = 'children';
    const TYPE_GODCHILDREN = 'godchildren';
    const TYPE_MARRIAGE    = 'marriage';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $type;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    protected $additionalData;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="relationshipsFrom")
     */
    protected $from;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="relationshipsTo")
     */
    protected $to;

    public function __construct()
    {
        $this->additionalData = array();
    }
}
