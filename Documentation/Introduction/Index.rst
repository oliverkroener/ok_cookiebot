..  include:: /Includes.rst.txt

..  _introduction:

============
Introduction
============

What does it do?
================

The **Cookiebot Cookie Consent** extension provides a TYPO3 backend module for
managing Cookiebot cookie consent scripts. Editors can paste their Cookiebot
banner script and declaration script directly in the TYPO3 backend, and the
extension automatically renders them in the frontend.

Features
========

-  **Backend module** in the "Web" section with page tree navigation for
   per-site Cookiebot script management
-  **Two script fields**: banner script (rendered in ``<head>``) and
   declaration script (rendered before ``</body>``)
-  **Per-site configuration**: scripts are stored per site root in
   ``sys_template`` records
-  **Automatic frontend rendering** via TypoScript ``USER`` objects
   (``lib.cookiebotHeadScript`` / ``lib.cookiebotBodyScript``)
-  **Multi-language backend**: English and German translations
-  **Custom SVG icon** for the backend module

Requirements
============

-  TYPO3 12.4 LTS, 13.4 LTS, or 14.x
-  PHP (follows TYPO3 core requirements)
