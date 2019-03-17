# Upgrading To 3.0

Version 3.0 has a single difference compared to the 2.2 version:

The `__default` const is now uppercase `__DEFAULT` in order to fully comply with the PSR-1
standard.

This is a **BC** so if you want to use version 3.0, you have to check your codebase for enums that
have `__default` constants defined and rename them to `__DEFAULT`.

If you don't want to do this, you can **safely keep using the 2.x versions**.

2.x and 3.x versions will be maintained parallel, so **any future updates will go to both branches**.
