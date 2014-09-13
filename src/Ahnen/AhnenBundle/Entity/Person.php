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
class Person
{
    const GENDER_MALE   = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfDeath;

    /**
     * @ORM\OneToMany(targetEntity="Relationship", mappedBy="from")
     */
    protected $relationshipsFrom;

    /**
     * @ORM\OneToMany(targetEntity="Relationship", mappedBy="to")
     */
    protected $relationshipsTo;

    public function __construct()
    {
        $this->relationshipsFrom = new ArrayCollection();
        $this->relationshipsTo   = new ArrayCollection();
    }

    public function getRelationshipsFrom()
    {
        return $this->relationshipsFrom;
    }

    public function getRelationshipsTo()
    {
        return $this->relationshipsTo;
    }
}
