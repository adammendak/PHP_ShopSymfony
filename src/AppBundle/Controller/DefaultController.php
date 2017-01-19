<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if(!$session->get('basket'))
        {
            $session->set('basket', array());
        }
        return $this->render('@App/index.html.twig');
    }

    /**
     * @Route("/{id}/delete", name="user_delete_link")
     */
    public function deleteLinkAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(['id' => $id]);
        $em->remove($user);
        $em->flush($user);

        return $this->redirectToRoute('fos_user_security_logout');
    }

    /**
     * @Route("/admin", name="admin_page")
     * @Method("GET")
     */
    public function adminAction()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Access denied!');
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();
        $products = $em->getRepository('AppBundle:Product')->findAll();
        $purchase = $em->getRepository('AppBundle:Purchase')->findAll();
        return $this->render('@App/admin/index.html.twig', array(
            'users' => $users,
            'products' => $products,
            'purchases' => $purchase,
        ));
    }

    /**
     * @Route("/basket", name="basket_page")
     */
    public function basketAction(Request $request)
    {
        $session = $request->getSession();
        $basket= $session->get('basket');
      return $this->render('@App/basket.html.twig', array(
          'basket' => $basket,
      ));
    }
}
