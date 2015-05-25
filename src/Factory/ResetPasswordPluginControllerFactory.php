<?php
/**
 * Service Factory for PluginController
 *
 * This file contains the factory needed to generate a PluginController.
 *
 * PHP version 5.3
 *
 * LICENSE: BSD
 *
 * @category  Reliv
 * @package   RcmResetPassword
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      https://github.com/reliv
 */

namespace RcmLogin\Factory;

use RcmLogin\Controller\ResetPasswordPluginController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service Factory for PluginController
 *
 * Factory for PluginController.
 *
 * @category  Reliv
 * @package   RcmResetPassword
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      https://github.com/reliv
 */
class ResetPasswordPluginControllerFactory implements FactoryInterface
{
    /**
     * Create Service
     *
     * @param ServiceLocatorInterface $controllerMgr Zend Controller Manager
     *
     * @return PluginController
     */

    public function createService(ServiceLocatorInterface $controllerMgr)
    {
        /** @var \Zend\Mvc\Controller\ControllerManager $cm For IDE */
        $cm = $controllerMgr;

        /** @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $cm->getServiceLocator();

        $config = $serviceLocator->get('config');

        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');

        /** @var \App\Controller\TemplateMailer $templateMailer */
        $templateMailer = $serviceLocator->get('templateMailer');

        /**
         * @var \RcmUser\Service\RcmUserService $rcmUserManager
         */
        $rcmUserManager = $serviceLocator->get(
            'RcmUser\Service\RcmUserService'
        );

        return new ResetPasswordPluginController(
            $entityManager,
            $config,
            $templateMailer,
            $rcmUserManager
        );
    }
}
