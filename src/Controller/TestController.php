<?php

namespace App\Controller;

use App\Entity\A;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * Nullifying the identifier of a lazy-loaded entity, then populating it, populates the wrong entity.
     */
    public function test1(EntityManagerInterface $em): Response
    {
        /** @var A */
        $a = $em->getRepository(A::class)->find(2);
        $b = $a->b;
        dump($b); // Displays B entity with id = 2 (OK)
        $b->id = null;
        dump($b->id); // Displays null (OK)
        dump($b->field); // On this line, it populates B entity with id = 1 and displays 'b-1', the field value of B entity with id 1. (KO)
        dump($b->id); // Displays 1 (KO)
        dump($b); // Displays B entity with id = 1 (KO)
        die;
    }

    /**
     * Cloning an lazy-loaded entity nullifies the entity's properties.
     */
    public function test2(EntityManagerInterface $em): Response
    {
        /** @var A */
        $a = $em->getRepository(A::class)->find(2);
        $cloneA = clone $a;
        $cloneB = clone $a->b;
        $cloneA->b = $cloneB;
        $cloneA->id = null; // These lines are optional, but I prefer to add them for clarity
        $cloneB->id = null; // These lines are optional, but I prefer to add them for clarity
        $em->persist($cloneA);
        $em->persist($cloneB);
        $em->flush();
        $cloneB->field; // populates $cloneB
        dd($cloneB); // $cloneB->field is null while $a->b->field is not null
    }
}
