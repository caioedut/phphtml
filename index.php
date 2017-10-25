<?php
require_once 'phphtml/PHPHtml.php';

// Form
$form = new PHPHtmlForm('get');

// Fieldset
$field = new PHPHtmlElement('fieldset');
$legend = new PHPHtmlElement('legend');

// Name
$label_name = new PHPHtmlLabel('name');
$input_name = new PHPHtmlInput('name');
$input_name->setRequired(true);
$label_name->append('First Name', $input_name);

// Last Name
$label_last = new PHPHtmlLabel('lastName');
$input_last = new PHPHtmlInput('lastName');
$label_last->append('Last Name', $input_last);

// E-mail
$label_email = new PHPHtmlLabel('email');
$input_email = new PHPHtmlInputEmail('email');
$label_email->append('E-mail', $input_email);

// Gender
$label_gender = new PHPHtmlLabel('gender');
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

echo $form;