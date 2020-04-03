<?php
namespace App\Controller;
use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
//use http\Env\Request;
//use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\UsuarioType;

/**
 * @Route("/usuario")
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/", name="usuario_index", methods={"GET"})
     * @param UsuarioRepository $usuarioRepository
     * @return Response
     */
    public function index(UsuarioRepository $usuarioRepository): Response
    {
        return $this->render('usuario/index.html.twig', [
            'usuarios' => $usuarioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="usuario_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request):Response
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('usuario_index');
        }

        return $this->render('usuario/new.html.twig',[
           'usuario' => $usuario,
           'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_show", methods={"GET"})
     * @param Usuario $usuario
     * @return Response
     */
    public function show(Usuario $usuario):Response
    {
        return $this->render('usuario/show.html.twig',[
           'usuario' => $usuario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="usuario_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param Usuario $usuario
     * @return Response
     */
    public function edit(Request $request, Usuario $usuario):Response
    {
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuario_index');
        }

        return $this->render('usuario/edit.html.twig',[
            'usuario'=>$usuario,
            'form' =>$form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_delete", methods={"DELETE"})
     * @param Request $request
     * @param Usuario $usuario
     * @return Response
     */
    public function delete(Request $request, Usuario $usuario):Response
    {
        if($this->isCsrfTokenValid('delete'.$usuario->getId(), $request->request->get('_token'))){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usuario);
            $entityManager->flush();
        }
        return $this->redirectToRoute('usuario_index');
    }




}