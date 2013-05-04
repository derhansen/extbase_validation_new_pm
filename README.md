TYPO3 Extbase form validation examples
======================================

## What is it?

This is a demo TYPO3 extension refered in my blog article regarding Extbase form validation.

## What does it do?

This TYPO3 extension shows the following:

* How to use own validators to validate domain models and add custom error to several properties
* How to create a multiple step form, add validation and handle post domain model validation

Please note, that this extension requires the new property mapper to be switched on (default since TYPO3 6.1).

config.tx_extbase.features.rewrittenPropertyMapper = 1

## How to use

Copy the repositories content to typoconf/ext/validation_examples_new and install the extension.