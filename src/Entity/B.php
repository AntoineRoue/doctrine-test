<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'b')]
#[ORM\Entity]
class B {
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public ?int $id = null;

    #[ORM\Column(name: 'field', type: 'string', length: 255, nullable: true)]
    public ?string $field = null;

    #[ORM\OneToOne(targetEntity: 'A', mappedBy: 'b')]
    public ?A $a = null;
}
