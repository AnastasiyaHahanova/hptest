<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/test.html.twig');
    }
    /**
     * @Route("/check", name="check", methods={"GET","POST"})
     */
    public function check(Request $request)
    {
        $answers = $request->request->all();
        $validation = $this->validate($answers);
        if ($validation)
        {
            $message = 'Please fill in all fields';
            return $this->render('test/test.html.twig',[
                'message' => $message
            ]);
        }
        $result = $this->checkTest($answers);
        $right_answers = ['curse' => 'Avada Kedavra', 'bird' => 'Fawkes'];
        return $this->render('test/result.html.twig', [
            'errors' => $result['errors'],
            'right_answers' => $right_answers,
            'points' => $result['points']
        ]);
    }
    public function checkTest($answers)
    {
        $points = 0;
        $errors = [];
        //Question 1
        if ($answers['faculties'] == 'four')
        {
            $points++;
        }
        else
        {
            $errors[$answers['faculties']] = "red";
        }
        //Question 2
        if (in_array('diadem',$answers['horcrux']))
        {
            $points++;
        }
        if (in_array('diary',$answers['horcrux']))
        {
            $points++;
        }
        if (in_array('hat',$answers['horcrux']))
        {
            $errors['hat'] = 'red';
        }
        if (in_array('sword',$answers['horcrux']))
        {
            $errors['sword'] = "red";
        }
        //Question 3
        if ($answers['curse'] == 'Avada Kedavra' || $answers['curse'] == 'avada kedavra' )
        {
            $points++;
        }
        else
        {
            $errors['error_curse'] = $answers['curse'];
            $errors['curse'] = 'red';
        }
        //Question 4

        if ($answers['fear'] == 'spiders' || $answers['fear'] == 'spider')
        {
            $points++;
        }
        else
        {
            $errors[$answers['fear']] = "red" ;
        }
        //Question 5
        if ($answers['bird'] == 'Fawkes' || $answers['curse'] == 'fawkes' )
        {
            $points++;
        }
        else
        {
            $errors['bird_name'] = $answers['bird'];
            $errors['bird'] = 'red';
        }
        //Question 6
        if (in_array('stone',$answers['hallows']))
        {
            $points++;
        }
        if (in_array('wand',$answers['hallows']))
        {
            $points++;
        }
        if (in_array('cloak',$answers['hallows']))
        {
            $points++;
        }
        if (in_array('wine',$answers['hallows']))
        {
            $errors['wine'] = 'red';
        }
        $result = ['errors' => $errors, 'points' => $points];
        return $result;
    }
    public function validate($answers)
    {
        $error = false;
        if (!isset($answers['horcrux']))
        {
            $error = true;
        }
        if (!isset($answers['hallows']))
        {
            $error = true;
        }
        return $error;
    }
}
