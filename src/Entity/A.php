<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'a')]
#[ORM\Entity]
class A {
    #[ORM\Column(name: 'id', type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    public ?int $id = null;

    #[ORM\Column(name: 'field', type: 'string', length: 255)]
    public ?string $field = null;

    #[ORM\OneToOne(targetEntity: 'B', inversedBy: 'a')]
    #[ORM\JoinColumn(name: 'b_id', referencedColumnName: 'id')]
    public ?B $b = null;
}
