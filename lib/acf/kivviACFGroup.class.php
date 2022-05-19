<?php

class kivviACFGroup
{

    public $params = array(
        'key' => false,
        'title' => false,
        'fields' => array(),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'kivvi-components-hidden',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'description' => '',
        'show_admin' => true
    );



    public function __construct($newparams)
    {
        $params = array_merge($this->params, $newparams);

        if (!$params["key"] || !$params["title"]) {
            return;
        }
        $this->params["key"] = $params["key"];
        $this->params["title"] = $params["title"];
        if ($params['show_admin']) {

            $this->addIntroAndTab();
        }
        foreach ($params as $key => $value) {

            switch ($key) {
                    // IGNORE THINGS THAT ARE ALREADY DONE

                    // ADD FIELDS TO THEIR OWN PLACE
                case 'fields':
                    foreach ($params["fields"] as $field) {

                        $this->addField($field);
                    }
                    break;

                default:
                    $this->params[$key] = $value;
            }
        }
        if ($params['show_admin']) {

            $this->addAdminFields();
        }
        if ($params["key"] == "kivvi_button") {
        }
    }


    public function addField($field)
    {
        $f = new kivviACFField($field);
        $this->params["fields"][] = $f->getParams();
    }

    public function addIntroAndTab()
    {
        $introFields = array(
            array(
                'key' => $this->params["key"] . '_intro',
                'label' => $this->params["title"],
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => $this->params["key"] . '_tab',
                'label' => $this->params["title"] . ' Details',
                'name' => $this->params["key"] . '_tab',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            )
        );
        foreach ($introFields as $field) {
            $f = new kivviACFField($field);
            $this->params["fields"][] = $f->getParams();
        }
    }

    public function addAdminFields()
    {
        $adminFields = array(
            array(
                'key' => $this->params["key"] . '_admin_tab',
                'label' => $this->params["title"] . ' Admin',
                'name' => $this->params["key"] . '_admin_tab',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => $this->params["key"] . '_admin',
                'label' => 'Admin',
                'name' => $this->params["key"] . '_admin',
                'type' => 'clone',
                'clone' => array(
                    0 => 'kivvi_admin',
                ),
                'display' => 'group',
                'prefix_name' => 1,

            ),
        );

        foreach ($adminFields as $field) {
            $f = new kivviACFField($field);
            $this->params["fields"][] = $f->getParams();
        }
    }

    public function registerFieldGroup()
    {
        if (!function_exists('acf_add_local_field_group') || !$this->params["key"] || !$this->params["title"]) {
            trigger_error(sprintf(__('Error adding field group')), E_USER_ERROR);
        }
        acf_add_local_field_group($this->params);
    }
}
