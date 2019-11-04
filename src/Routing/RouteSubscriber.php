<?php

namespace Drupal\enhanced_user\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    foreach ($collection->all() as $route) {
      if (strpos($route->getPath(), '/jsonapi') === 0 ) {
        $route->setRequirement('_user_is_logged_in', 'TRUE');
      }
    }
  }
}
