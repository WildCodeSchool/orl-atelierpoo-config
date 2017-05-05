<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 05/05/17
 * Time: 15:28
 */

namespace ModFeed\Controller;


class BaseControler
{
    /**
     * @var \Twig_Environment
     */
    private $view;

    /**
     * @return \Twig_Environment
     */
    public function getView(): \Twig_Environment
    {
        return $this->view;
    }

    /**
     * @param \Twig_Environment $view
     * @return BaseControler
     */
    public function setView(\Twig_Environment $view): BaseControler
    {
        $this->view = $view;
        return $this;
    }

    public function __construct(\Twig_Environment $twig)
    {
        $this->setView($twig);
    }
}