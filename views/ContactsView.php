<?php

class ContactsView {

    private $peoples;

    function __construct($peoples)
    {   
        $this->peoples = $peoples;
    }

    private function getLayout() {

        ob_start();
        include_once('../views/layout/mainLayout.php');
        return ob_get_clean();
    }

    private function getContent() {

        $content = '<h3>Peoples</h3>';
        
        $content = $content . "<table class='table table-striped table-hover'>";
        
        foreach ($this->peoples as $people) {

            $content = $content . "
                <tr class='clickable'>
                    <th><a href='contact?id={$people->getId()}'>{$people->getFirstName()}</a></th>
                    <th>{$people->getLastname()}</th>
                </tr>
            ";
            
        }
        $content = $content . "</table>";


        return $content;
    }

    public function render() {

        echo str_replace('{{content}}', $this->getContent(), $this->getLayout());
    }

}