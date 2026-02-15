..  include:: /Includes.rst.txt

..  _installation:

============
Installation
============

Composer
========

.. code-block:: bash

   composer require oliverkroener/ok-cookiebot

Local path repository
=====================

Add to your root ``composer.json``:

.. code-block:: json

   {
       "repositories": [
           {
               "type": "path",
               "url": "packages/ok_cookiebot"
           }
       ]
   }

Then run:

.. code-block:: bash

   composer require oliverkroener/ok-cookiebot:@dev

Activate TypoScript
===================

After installation, include the static TypoScript template
**[kroener.DIGITAL] Cookiebot** in your site's template record.
