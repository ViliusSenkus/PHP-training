<?php

// https://github.com/thephpleague/climate - manual

include_once 'vendor/autoload.php';

echo \Vil\App\Klase::veiksmas();


$climate = new \League\CLImate\CLImate;

$climate->red('Whoa now this text is red.');
$climate->blue('Blue? Wow!');

exec('mode con', $output);

?>