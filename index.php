<?php
require_once 'phphtml/PHPHtml.php';

// Container
$container = new PHPHtmlElement();

// Text
$text = new PHPHtmlText('Hello');
$text->setBold();

// Form
$form = new PHPHtmlForm('get');

// Fieldset
$field = new PHPHtmlElement('fieldset');
$legend = new PHPHtmlElement('legend');

// Name
$label_name = new PHPHtmlLabel('First Name', 'name');
$input_name = new PHPHtmlInput('name');
$input_name->setRequired(true);
$label_name->append($input_name);

// Last Name
$label_last = new PHPHtmlLabel('Last Name', 'lastName');
$input_last = new PHPHtmlInput('lastName');
$label_last->append($input_last);

// E-mail
$label_email = new PHPHtmlLabel('E-mail', 'email');
$input_email = new PHPHtmlInputEmail('email');
$label_email->append($input_email);

// Gender
$label_gender = new PHPHtmlLabel('Gender', 'gender');
$input_gender = new PHPHtmlSelect(array('m' => 'Male', 'f' => 'Female'), 'gender');
$input_gender->addEmptyOption('[Select]');
$input_gender->setSelected('m');
$label_gender->append($input_gender);

// Button Submit
$submit = new PHPHtmlButton('Submit', 'submit');

$field->append(
    $legend->append('Register'),
    $label_name->asChildOf(PHPHtml::MAIN_TAG),
    $label_last->asChildOf(PHPHtml::MAIN_TAG),
    $label_email->asChildOf(PHPHtml::MAIN_TAG),
    $label_gender->asChildOf(PHPHtml::MAIN_TAG),
    $submit->asChildOf(PHPHtml::MAIN_TAG)
);

$form->append($field);

$container->append($text, $form);

echo $container;