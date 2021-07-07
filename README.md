[![pipeline status](https://gitlab.crossknowledge.com/ip/feedback-data-encrypter-bundle/badges/master/pipeline.svg)](https://gitlab.crossknowledge.com/ip/feedback-data-encrypter-bundle/commits/master)
[![coverage report](https://gitlab.crossknowledge.com/ip/feedback-data-encrypter-bundle/badges/master/coverage.svg)](https://gitlab.crossknowledge.com/ip/feedback-data-encrypter-bundle/commits/master)


CrossKnowledge FeedbackDataEncrypter Bundle
===============================

The CrossKnowledge/FeedbackDataEncrypter aims to convert subtitles files from and to different formats.

Installation
------------

Add the bundle to your project:
```php
// composer.json

"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/guirod/FeedbackDataEncrypterBundle.git"
        }
    ]
```

```bash
composer require crossknowledge/feedback-data-encrypter-bundle:^1.0.0
```
Enable bundle in your kernel:
```php
class AppKernel	extends Kernel
{
  public function registerBundles()
  {
	  $bundles = array(
      ...
      new \CrossKnowledge\FeedbackDataEncrypterBundle\CrossKnowledgeFeedbackDataEncrypterBundle(),
		);
    ...
```

Now, to encrypt data, you can use the following service in your controller:
```php
  $this->get('crossknowledge.feedback_data_encrypter')->encrypt($data, $key);
```

To decrypt data, you can use the following service in your controller:
```php
  $this->get('crossknowledge.feedback_data_encrypter')->decrypt($data, $key);
```

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

About
-----

CrossKnowledgeDataEncryoterBundle is a [CrossKnowledge](https://crossknowledge.com) initiative.
See also the list of [contributors](https://gitlab.com/CrossKnowledge/FeedbackDataEncrypterBundle/contributors).
A couple of "distribution" (travis,readme.md, etc..) files are inspired from FriendsOfSymfony/FOSUserBundle's.

Contributions
-------------

Contributions are more than welcome.
We will try to integrate them. As long as there is no BC, anything can be suggested.


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/CrossKnowledge/FeedbackDataEncrypterBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
