<?php

namespace Anezi\Bundle\BootstrapSelectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DocsController extends Controller
{
    public function indexAction()
    {
        $headers = array(
            array(
                'id' => 'installation',
                'children' => array(
                    array(
                        'id' => 'systemRequirements'
                    ),
                    array(
                        'id' => 'composerRequirements'
                    ),
                    array(
                        'id' => 'enableAssetsInstaller'
                    ),
                    array(
                        'id' => 'bundleActivation'
                    ),
                    array(
                        'id' => 'projectUpdate'
                    ),
                )
            ),
            array(
                'id' => 'usage',
                'children' => array(
                    array(
                        'id' => 'twigAssets'
                    ),
                    array(
                        'id' => 'docs'
                    )
                )
            ),
            array(
                'id' => 'license'
            )
        );
        return $this->render(
            'BootstrapSelectBundle:docs:index.html.twig',
            array(
                'headers' => $headers,
                'title' => 'BootstrapSelect',
                'composer_version' => '~2.0',
                'current_version' => '2.0.0'
            )
        );
    }
}
