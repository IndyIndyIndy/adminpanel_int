<?php
namespace ChristianEssl\AdminpanelInt\Modules;

/***
 *
 * This file is part of the "AdminpanelInt" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Christian Eßl <indy.essl@gmail.com>, https://christianessl.at
 *
 ***/

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Adminpanel\ModuleApi\AbstractSubModule;
use TYPO3\CMS\Adminpanel\ModuleApi\ContentProviderInterface;
use TYPO3\CMS\Adminpanel\ModuleApi\DataProviderInterface;
use TYPO3\CMS\Adminpanel\ModuleApi\ModuleData;
use TYPO3\CMS\Adminpanel\ModuleApi\ResourceProviderInterface;

/**
 * Show info array for _INT objects on the page
 */
class IntInfo extends AbstractSubModule implements DataProviderInterface, ContentProviderInterface, ResourceProviderInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return 'info_intinfo';
    }

    /**
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->getLanguageService()->sL(
            'LLL:EXT:adminpanel_int/Resources/Private/Language/locallang.xlf:label'
        );
    }

    /**
     * @param ModuleData $moduleData
     *
     * @return string
     */
    public function getContent(ModuleData $moduleData): string
    {
        return serialize($GLOBALS['TSFE']->config['INTincScript']);
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \TYPO3\CMS\Adminpanel\ModuleApi\ModuleData
     */
    public function getDataToStore(ServerRequestInterface $request): ModuleData
    {
        return new ModuleData([
            'intInfo' => $GLOBALS['TSFE']->config['INTincScript']
        ]);
    }

    /**
     * @return array
     */
    public function getJavaScriptFiles(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getCssFiles(): array
    {
        return [];
    }

}