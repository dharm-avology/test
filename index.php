<?php

/*
 * This file is part of the Panther project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);


use Symfony\Component\Panther\Client;

require __DIR__.'/vendor/autoload.php'; // Composer's autoloader

try
{

    // $client = Client::createChromeClient();
    // Or, if you care about the open web and prefer to use Firefox
    $client = Client::createFirefoxClient();

    $client->request('GET', 'https://shopee.com.my/Bonia-Women-Elegance-BNB10456-2612-i.312471716.3165300822?sp_atk=c1a62170-1217-4142-bd36-999c2a2d482d&xptdk=c1a62170-1217-4142-bd36-999c2a2d482d'); // Yes, this website is 100% written in JavaScript
    //$client->clickLink('Get started');

    // Wait for an element to be present in the DOM (even if hidden)
    $crawler = $client->waitFor('._3g8My-');
    // Alternatively, wait for an element to be visible 
    $crawler = $client->waitForVisibility('._3g8My-');
    $crawler = $client->waitForVisibility('._1V_Jxg');
    $crawler = $client->waitForVisibility('.aGIJCo');

    echo $crawler->filter('._3g8My-')->text();
    echo"<br>";
    echo $crawler->filter('._1V_Jxg')->text();
    echo"<br>";
    echo $crawler->filter('.aGIJCo')->attr('style');
 

}
catch (Exception $e) {
    echo $e->getMessage();
} finally {
    $client->quit();
}
exec("kill -9 $(lsof -t -i:9515)");