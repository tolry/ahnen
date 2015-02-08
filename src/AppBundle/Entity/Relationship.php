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
class Relationship
{
    const TYPE_CHILDREN    = 'children';
    const TYPE_GODCHILDREN = 'godchildren';
    const TYPE_MARRIAGE    = 'marriage';

    private static $allowedTypes = [
        self::TYPE_CHILDREN,
        self::TYPE_GODCHILDREN,
        self::TYPE_MARRIAGE,
    ];

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

    public function __construct(Person $from, Person $to, $type)
    {
        $this->from           = $from;
        $this->to             = $to;
        $this->additionalData = array();

        $this->setType($type);
    }

    public function setType($type)
    {
        // @todo use beberlei/assertion?
        if (! in_array($type, self::$allowedTypes)) {
            throw new \InvalidArgumentException(
                'unknown type "' . $type . '", ' .
                'allowed types: ' . implode(', ', self::$allowedTypes)
            );
        }

        $this->type = $type;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getType()
    {
        return $this->type;
    }
}
