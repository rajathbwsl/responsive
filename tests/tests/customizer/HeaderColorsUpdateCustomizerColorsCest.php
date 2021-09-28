<?php 
use \Page\Customizer\AdminLogin;
use \Page\Customizer\Customizer;
use \Page\Customizer\Home;
use Codeception\Module\WebDriver;
use Codeception\Module\Assert;

class HeaderColorsUpdateCustomizerColorsCest
{
    public function _before(CustomizerTester $I)
    {
    }

    // tests
    public function tryToTest(CustomizerTester $I, AdminLogin $AdminLoginPage, Customizer $CustomizerPage, Home $HomaPage)
    {
    	$I->amGoingTo('Login as Admin');
    	$AdminLoginPage->adminLogin($I);

    	//Update colors in customizer
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_header_colors_Background_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_Background_Color_Input,'#456789');
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_header_colors_Border_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_Border_Color_Input,'#456789');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_header_colors_SiteTitle_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_SiteTitle_Color_Input,'#987654');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_header_colors_SiteTagline_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_SiteTagline_Color_Input,'#789456');
        $I->wait(1);
        $I->wait(3);//For refresihng page

        //Check updated customizer values
        $I->amGoingTo('Check Updated Colors within customizer');
        $I->executeJS('jQuery("iframe").attr("name", "new_name")');
        $I->switchToIFrame("new_name");
        $headerBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$headerBGColor);

        $headerBorderColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$headerBorderColor);

        $siteTitleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1.site-title > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 118, 84, 1)',$siteTitleColor);

        $siteTaglineColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$siteTaglineColor);
        $I->switchToIFrame();
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);

        //Check Updated Colors without customizer
        $I->amGoingTo('Check Updated Header Colors without customizer');
        $I->amOnPage($HomaPage->url);
        $I->seeElement($HomaPage->header);
        $headerBGColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('background-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$headerBGColor);

        $headerBorderColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('#masthead'))->getCSSValue('border-bottom-color');
        });
        $I->assertEquals('rgba(69, 103, 137, 1)',$headerBorderColor);

        $siteTitleColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('h1.site-title > a'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(152, 118, 84, 1)',$siteTitleColor);

        $siteTaglineColor = $I->executeInSelenium(function(\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver){
            return $webdriver->findElement(WebDriverBy::cssSelector('.site-description'))->getCSSValue('color');
        });
        $I->assertEquals('rgba(120, 148, 86, 1)',$siteTaglineColor);

        //Revert back customizer values to Original Colors
        //Open Customizer
        $I->amGoingTo('Open Customizer');
        $I->amOnPage($CustomizerPage->url);
        $I->click($CustomizerPage->customizer_header);
        $I->wait(1);
        $I->click($CustomizerPage->customizer_header_colors);
        $I->wait(1);
        
        $I->click($CustomizerPage->customizer_header_colors_Background_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_Background_Color_Input,'#ffffff');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_header_colors_Border_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_Border_Color_Input,'#eaeaea');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_header_colors_SiteTitle_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_SiteTitle_Color_Input,'#333333');
        $I->wait(1);

        $I->click($CustomizerPage->customizer_header_colors_SiteTagline_Color);
        $I->wait(1);
        $I->fillField($CustomizerPage->customizer_header_colors_SiteTagline_Color_Input,'#999999');
        $I->wait(1);
        $I->click($CustomizerPage->publishButton);
        $I->wait(1);
    }
}
