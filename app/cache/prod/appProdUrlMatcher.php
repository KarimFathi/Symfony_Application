<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/platform')) {
            // kaiim_platform_home
            if ($pathinfo === '/platform') {
                return array (  '_controller' => 'Kaiim\\PlatformBundle\\Controller\\AdvertController::indexAction',  '_route' => 'kaiim_platform_home',);
            }

            if (0 === strpos($pathinfo, '/platform/ad')) {
                // kaiim_platform_view
                if (0 === strpos($pathinfo, '/platform/advert') && preg_match('#^/platform/advert/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'kaiim_platform_view')), array (  '_controller' => 'Kaiim\\PlatformBundle\\Controller\\AdvertController::viewAction',));
                }

                // kaiim_platform_add
                if ($pathinfo === '/platform/add') {
                    return array (  '_controller' => 'Kaiim\\PlatformBundle\\Controller\\AdvertController::addAction',  '_route' => 'kaiim_platform_add',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
