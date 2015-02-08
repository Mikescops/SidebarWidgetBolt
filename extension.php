<?php
// Google Analytics extension for Bolt

namespace ErupsisWidget;

use Bolt\Extensions\Snippets\Location as SnippetLocation;

class Extension extends \Bolt\BaseExtension
{

    function info() {

        $data = array(
            'name' =>"Erupsis Widget",
            'description' => "A small extension to add message in the backend sidebar.",
            'author' => "Bob den Otter",
            'link' => "http://bolt.cm",
            'version' => "0.1",
            'required_bolt_version' => "1.0",
            'highest_bolt_version' => "1.0",
            'type' => "Snippet, Widget",
            'first_releasedate' => "2012-10-10",
            'latest_releasedate' => "2013-01-27",
        );

        return $data;

    }

    function initialize() {

        if($this->config['widget']) {
            $this->addWidget('dashboard', 'right_first', 'erupsisWidget', $additionalhtml, 3600);
        }

    }


    function erupsisWidget()
    {

        //\Dumper::dump($this->config);

        $this->app['twig.loader.filesystem']->addPath(__DIR__, 'ErupsisWidget');
        $html = $this->app['render']->render("@ErupsisWidget/widget.twig", array(
            'caption' => $this->config['caption'],
            'contents' => $this->config['contents']
        ));

        return new \Twig_Markup($html, 'UTF-8');

    }


}
