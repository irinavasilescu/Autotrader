<?php

namespace AppBundle\Menu;

use Knp\Menu\MenuFactory;

class Builder
{
    public function mainMenu(MenuFactory $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navbar-nav me-auto mb-2 mb-lg-0');
        $menu->addChild('Home', ['route' => 'homepage']);
        $menu->addChild('Offer', ['route' => 'offer']);
        return $menu;
    }
}