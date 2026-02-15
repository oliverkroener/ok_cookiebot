<?php

declare(strict_types=1);

namespace OliverKroener\OkCookiebotCookieConsent\Rendering;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class CookiebotScriptRenderer
{
    public ContentObjectRenderer $cObj;

    public function __construct(
        private readonly SiteFinder $siteFinder,
        private readonly ConnectionPool $connectionPool,
    ) {}

    /**
     * Retrieves the specified script from the active sys_template.
     *
     * @param string $content The current content (unused)
     * @param array<string, mixed> $conf Configuration array, expecting 'type' => 'head' or 'body'
     */
    public function renderBannerScript(string $content, array $conf): string
    {
        $type = isset($conf['type']) ? strtolower($conf['type']) : 'head';

        if (!in_array($type, ['head', 'body'], true)) {
            return '';
        }

        $pageId = $this->getPageId();
        if ($pageId === 0) {
            return '';
        }

        try {
            $site = $this->siteFinder->getSiteByPageId($pageId);
        } catch (\TYPO3\CMS\Core\Exception\SiteNotFoundException) {
            return '';
        }

        $siteRootPid = $site->getRootPageId();

        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('sys_template');
        $scripts = $queryBuilder
            ->select('tx_ok_cookiebot_banner_script', 'tx_ok_cookiebot_declaration_script')
            ->from('sys_template')
            ->where(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($siteRootPid, Connection::PARAM_INT))
            )
            ->executeQuery()
            ->fetchAssociative();

        if ($scripts === false) {
            return '';
        }

        if ($type === 'head') {
            return $scripts['tx_ok_cookiebot_banner_script'] ?? '';
        }

        return $scripts['tx_ok_cookiebot_declaration_script'] ?? '';
    }

    private function getPageId(): int
    {
        $routing = $this->cObj->getRequest()->getAttribute('routing');
        if ($routing !== null && method_exists($routing, 'getPageId')) {
            return $routing->getPageId();
        }

        return 0;
    }
}
