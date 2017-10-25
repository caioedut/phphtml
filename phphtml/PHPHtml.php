<?php
require_once 'PHPHtmlElement.php';

require_once 'PHPHtmlText.php';
require_once 'PHPHtmlHeading.php';

require_once 'PHPHtmlImage.php';

require_once 'PHPHtmlForm.php';
require_once 'PHPHtmlButton.php';
require_once 'PHPHtmlLabel.php';
require_once 'PHPHtmlInput.php';
require_once 'PHPHtmlSelect.php';
require_once 'PHPHtmlInputEmail.php';

abstract class PHPHtml
{
    const MAIN_TAG = 'div';
    const LINE_BREAK = "\n";
}