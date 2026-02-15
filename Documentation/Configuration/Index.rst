..  include:: /Includes.rst.txt

..  _configuration:

=============
Configuration
=============

TypoScript
==========

Include the static template to enable automatic frontend script rendering.
The extension registers two TypoScript objects:

.. list-table::
   :header-rows: 1
   :widths: 30 25 45

   * - Object
     - Placement
     - Description
   * - ``lib.cookiebotHeadScript``
     - ``page.headerData.261487170``
     - Renders the banner script in ``<head>``
   * - ``lib.cookiebotBodyScript``
     - ``page.footerData.261487170``
     - Renders the declaration script before ``</body>``

Backend module
==============

1. Navigate to **Web > Cookiebot** in the TYPO3 backend.
2. Select a page within a site that has a root template.
3. Paste the Cookiebot **banner script** (for ``<head>``) and
   **declaration script** (for ``<body>``).
4. Click **Save**.

Scripts are stored in the ``sys_template`` record of the site root page
via custom fields ``tx_ok_cookiebot_banner_script`` and
``tx_ok_cookiebot_declaration_script``.
