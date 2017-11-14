<?php
namespace AppBundle\Twig;


class AppPagerExtension extends \Twig_Extension {

    public function getName()
    {
        return 'app_pager_extension';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'show_pager',
                array($this, 'ShowPagerFunction'),
                array(
                    'is_safe' => array('html'),
                    'needs_environment' => true,
                )
            ),
        );
    }

    /**
     *
     * @param \Twig_Environment $environment
     * @param int $current_page
     * @param int $per_page
     * @param int $page_count
     * @return string
     */
    public function ShowPagerFunction(\Twig_Environment $Array)
    {

        $Val = "";
        foreach ($Array as $Name=>$Value) {
            $Val .= '<a tabindex="0" '.(isset($Value['link'])?'href="'.$Value['link'].'"':"").'>'.$Name.'</a>';
            if (count($Value['childes']) > 0) {
                $Val .= '<ol>';
                $Val .= '<li>'.GenerateMenu($Value['childes']).'</li>';
                $Val .= '</ol>';
            }
        }
        echo '<pre>';
        die('test');
      //  return $Val;

     //   echo GenerateMenu($menuArray);

        $renderArray = array(
            'current_page' => $current_page,
            'page_count' => $page_count,
            'route' => $route,
        );
        return $environment->render('AppBundle:TwigExtension:pager.html.twig', $renderArray);

    }
}