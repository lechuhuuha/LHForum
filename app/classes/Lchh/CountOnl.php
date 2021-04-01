<?php

namespace Lchh;

class CountOnl
{
    private $sessionName;
    private $remoteAdd;
    public function __construct(string $sessionName, \Lchh\RemoteAddress $remoteAdd)
    {
        $this->sessionName = $sessionName;
        $this->remoteAdd = $remoteAdd;
    }
    public function calOnl()
    {
        // Script Online Users and Visitors - http://coursesweb.net/php-mysql/

        $fileTxt = 'useron.txt'; //the file in which the online user are stores

        $timeOn = 120; // number of seconds to keep an user online

        $sep = '^^';    // characters used to separerate the username and time

        $vst_id = '-vst-'; // an indentifier to know which is the loggin user or visistor
        $bot_id = '-bot-'; // an identifier to know this is a bot crawler
        $remoteAdd = new \Lchh\RemoteAddress();
        $uvon = isset($_SESSION[$this->sessionName]) ? $_SESSION[$this->sessionName] : $remoteAdd->getIpAdress() . $vst_id;
        if ($this->isBotDetected()) {
            $uvon = $_SERVER['HTTP_USER_AGENT'];
        }
        $rgxvst = '/^([0-9\.]*)' . $vst_id . '/i';         // regexp to recognize the line with visitors
        $nrvst = 0; // to store the number of the visistors
        $today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm

        // sets the row with the current user /visitor that must be added in $fileTxt(and current TimpStamp) 
        $addRow[] = $uvon . $sep . time();

        // check if the file from $fileTxt exists and is writable
        if (is_writeable($fileTxt)) {

            //get into an array the lines added in $fileTxt
            $ar_rows = file($fileTxt, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Number of rows
            $nrrows = count($ar_rows);

            // If there is at least one line , parse the $ar_rows array
            if ($nrrows > 0) {

                for ($i = 0; $i < $nrrows; $i++) {

                    // get each line and separate the user  /visitor and the timestamp
                    $ar_line = explode($sep, $ar_rows[$i]);

                    // add in $addRow array the records in last $timeOn seconds
                    if ($ar_line[0] != $uvon && (intval($ar_line[1]) + $timeOn) >= time()) {
                        $addRow[] = $ar_rows[$i];
                    }
                }
            }
        }

        $nruvon = count($addRow); // total online
        $usron = ''; // to  store the name of logged users

        // traverse $addRow to get the number of visitors and users
        for ($i = 0; $i < $nruvon; $i++) {
            if (preg_match($rgxvst, $addRow[$i])) $nrvst++;
            else {
                // gets and stores the user's name
                $ar_usron = explode($sep, $addRow[$i]);
                $usron .= '<br> - <i> ' . $ar_usron[0] . '</i>';
            }
        }
        $nrusr = $nruvon - $nrvst; // gets the users (total - visisitors)

        //Html code to display data 
        $reout = '<div id="uvon"><h4>Online : ' . $nruvon . '</h4>Visitors : ' . $nrvst . '<br/> Users : ' . $nrusr . $usron . '</div>';

        // Write data in $fileTxt
        if (!file_put_contents($fileTxt, implode("\n", $addRow))) $reout = 'ERROR : FILE NOTS EXISTED OR NOT WRITEABLE';

        // if access from <script>, with GET 'uvon=showon', adds the string to return into a JS statement
        // in this way the script can also be included in .html files
        if (isset($_GET['uvon']) && $_GET['uvon'] == 'showon') $reout == "document.write('$reout')";
        return [
            'online' => $nruvon,
            'visitors' => $nrvst,
            'totalUsers' => $nrusr,
            'username' => $usron
        ];
    }
    public function getRemoteAddr()
    {
        $uvon = isset($_SESSION['username']) ? $_SESSION['username'] : $this->remoteAdd->getIpAdress();
        return $uvon;
    }
    public function isBotDetected()
    {

        if (preg_match('/abacho|accona|AddThis|AdsBot|ahoy|AhrefsBot|AISearchBot|alexa|altavista|anthill|appie|applebot|arale|araneo|AraybOt|ariadne|arks|aspseek|ATN_Worldwide|Atomz|baiduspider|baidu|bbot|bingbot|bing|Bjaaland|BlackWidow|BotLink|bot|boxseabot|bspider|calif|CCBot|ChinaClaw|christcrawler|CMC\/0\.01|combine|confuzzledbot|contaxe|CoolBot|cosmos|crawler|crawlpaper|crawl|curl|cusco|cyberspyder|cydralspider|dataprovider|digger|DIIbot|DotBot|downloadexpress|DragonBot|DuckDuckBot|dwcp|EasouSpider|ebiness|ecollector|elfinbot|esculapio|ESI|esther|eStyle|Ezooms|facebookexternalhit|facebook|facebot|fastcrawler|FatBot|FDSE|FELIX IDE|fetch|fido|find|Firefly|fouineur|Freecrawl|froogle|gammaSpider|gazz|gcreep|geona|Getterrobo-Plus|get|girafabot|golem|googlebot|\-google|grabber|GrabNet|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|HTTrack|ia_archiver|iajabot|IDBot|Informant|InfoSeek|InfoSpiders|INGRID\/0\.1|inktomi|inspectorwww|Internet Cruiser Robot|irobot|Iron33|JBot|jcrawler|Jeeves|jobo|KDD\-Explorer|KIT\-Fireball|ko_yappo_robot|label\-grabber|larbin|legs|libwww-perl|linkedin|Linkidator|linkwalker|Lockon|logo_gif_crawler|Lycos|m2e|majesticsEO|marvin|mattie|mediafox|mediapartners|MerzScope|MindCrawler|MJ12bot|mod_pagespeed|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|NationalDirectory|naverbot|NEC\-MeshExplorer|NetcraftSurveyAgent|NetScoop|NetSeer|newscan\-online|nil|none|Nutch|ObjectsSearch|Occam|openstat.ru\/Bot|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pingdom|pinterest|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|rambler|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Scrubby|Search\-AU|searchprocess|search|SemrushBot|Senrigan|seznambot|Shagseeker|sharp\-info\-agent|sift|SimBot|Site Valet|SiteSucker|skymob|SLCrawler\/2\.0|slurp|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|spider|suke|tach_bw|TechBOT|TechnoratiSnoop|templeton|teoma|titin|topiclink|twitterbot|twitter|UdmSearch|Ukonline|UnwindFetchor|URL_Spider_SQL|urlck|urlresolver|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|wapspider|WebBandit\/1\.0|webcatcher|WebCopier|WebFindBot|WebLeacher|WebMechanic|WebMoose|webquest|webreaper|webspider|webs|WebWalker|WebZip|wget|whowhere|winona|wlm|WOLP|woriobot|WWWC|XGET|xing|yahoo|YandexBot|YandexMobileBot|yandex|yeti|Zeus/i', $_SERVER['HTTP_USER_AGENT'])) {
            return true; // 'Above given bots detected'
        }

        return false;
    } // End :: isBotDetected()
}
