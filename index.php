<?php
require_once 'phphtml/PHPHtml.php';

// Container
$container = new PHPHtmlElement();

// Heading
$heading = new PHPHtmlHeading('My Title', 1);

// Text
$text = new PHPHtmlText('Bold, underline, italic and strike');
$text
    ->setBold()
    ->setUnderline()
    ->setItalic()
    ->setStrike();

// Image
$image = new PHPHtmlImage('http://icons.iconarchive.com/icons/iconshock/finding-nemo/256/dory-icon.png', "Dory");

// Form
$form = new PHPHtmlForm('get');

// Fieldset
$field = new PHPHtmlElement('fieldset');
$legend = (new PHPHtmlText('Register'))->setTagName('legend');

// Name
$label_name = new PHPHtmlLabel('First Name', 'name');
$input_name = new PHPHtmlInput('name');
$input_name->setRequired(true);
$label_name
    ->append($input_name)
    ->addParent();

// Last Name
$label_last = new PHPHtmlLabel('Last Name', 'lastName');
$input_last = new PHPHtmlInput('lastName');
$label_last
    ->append($input_last)
    ->addParent();

// E-mail
$label_email = new PHPHtmlLabel('E-mail', 'email');
$input_email = new PHPHtmlInputEmail('email');
$label_email
    ->append($input_email)
    ->addParent();

// Gender
$label_gender = new PHPHtmlLabel('Gender', 'gender');
$input_gender = new PHPHtmlSelect(array('m' => 'Male', 'f' => 'Female'), 'gender');
$input_gender
    ->addEmptyOption('[Select]')
    ->setSelected('m');
$label_gender
    ->append($input_gender)
    ->addParent();

// Button Submit
$submit = new PHPHtmlButton('Submit', 'submit');
$submit->addParent();

$field->append(
    $legend,
    $label_name,
    $label_last,
    $label_email,
    $label_gender,
    $submit
);

$form->append($field);

$container->append($heading, $text, $form, $image);

echo $container;