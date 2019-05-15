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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Show info array for USER_INT objects on the page
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
        $view = GeneralUtility::makeInstance(StandaloneView::class);
        $templateNameAndPath = 'EXT:adminpanel_int/Resources/Private/Templates/Info/IntInfo.html';
        $view->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName($templateNameAndPath));
        $view->assignMultiple($moduleData->getArrayCopy());
        return $view->render();
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
