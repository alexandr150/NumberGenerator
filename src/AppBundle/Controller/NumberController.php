<?php


namespace AppBundle\Controller;

use AppBundle\Entity\GeneratedNumber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class NumberController extends Controller
{
    const MIN_VALUE = -1000;
    const MAX_VALUE = 1000;
    /**
     * @Route("/generate", name="generate")
     * @return JsonResponse
     */
    public function generateAction()
    {
        $generatedNumber = new GeneratedNumber();
        $generatedNumber->setNumber(rand(self::MIN_VALUE, self::MAX_VALUE));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($generatedNumber);
        $entityManager->flush();

        return new JsonResponse([
            'id' => $generatedNumber->getId(),
            'value' => $generatedNumber->getNumber()
            ]);
    }

    /**
     * @Route("/retrieve/{id}", name="retrieve", requirements={"id":"[0-9]+"})
     * @param $id
     * @return JsonResponse
     */
    public function retrieveAction($id)
    {
        $number = $this
            ->getDoctrine()
            ->getRepository('AppBundle:GeneratedNumber')
            ->find($id);

        if (!$number) {
            throw $this->createNotFoundException(
                'No number found for id '.$id
            );
        }

        return new JsonResponse(["number" => $number->getNumber()]);
    }
}