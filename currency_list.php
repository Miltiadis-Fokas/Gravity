<?php
/*
    This program is free software; you can redistribute it
    under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
  //
  // class to manage the display of currency codes.
  // rjh@zaretto.com: 24-Apr-2011. 
class Currencies {

    static public $currencies = array(
        'AUD' => array('name' => "Australian Dollar", 'symbol' => "A$", 'ASCII' => "A&#36;"), 
        'CAD' => array('name' => "Canadian Dollar", 'symbol' => "C$", 'ASCII' => "C&#36;"),
        'CZK' => array('name' => "Czech Koruna", 'symbol' => "Kc", 'ASCII' => ""),
        'DKK' => array('name' => "Danish Krone", 'symbol' => "Kr", 'ASCII' => ""),
        'EUR' => array('name' => "Euro", 'symbol' => "&#8364;", 'ASCII' => "&#8364;"),
        'HKD' => array('name' => "Hong Kong Dollar", 'symbol' => "$", 'ASCII' => "&#36;"),
        'HUF' => array('name' => "Hungarian Forint", 'symbol' => "Ft", 'ASCII' => ""),
        'ILS' => array('name' => "Israeli New Sheqel", 'symbol' => "?", 'ASCII' => "&#8361;"),
        'JPY' => array('name' => "Japanese Yen", 'symbol' => "¥", 'ASCII' => "&#165;"),
        'MXN' => array('name' => "Mexican Peso", 'symbol' => "$", 'ASCII' => "&#36;"),
        'NOK' => array('name' => "Norwegian Krone", 'symbol' => "Kr", 'ASCII' => ""),
        'NZD' => array('name' => "New Zealand Dollar", 'symbol' => "$", 'ASCII' => "NZD&#36;"),
        'PHP' => array('name' => "Philippine Peso", 'symbol' => "?", 'ASCII' => ""),
        'PLN' => array('name' => "Polish Zloty", 'symbol' => "zl", 'ASCII' => ""),
        'GBP' => array('name' => "Pound Sterling", 'symbol' => "£", 'ASCII' => "&#163;"),
        'SGD' => array('name' => "Singapore Dollar", 'symbol' => "$", 'ASCII' => "&#36;"),
        'SEK' => array('name' => "Swedish Krona", 'symbol' => "kr", 'ASCII' => ""),
        'CHF' => array('name' => "Swiss Franc", 'symbol' => "CHF", 'ASCII' => ""),
        'TWD' => array('name' => "Taiwan New Dollar", 'symbol' => "NT$", 'ASCII' => "NT&#36;"),
        'THB' => array('name' => "Thai Baht", 'symbol' => "?", 'ASCII' => "&#3647;"),
        'USD' => array('name' => "U.S. Dollar", 'symbol' => "$", 'ASCII' => "&#36;")
    );
    static public function getRecord($code = "USD") {
        if (isset(Currencies::$currencies[$code]))
        {
            return Currencies::$currencies[$code];
        }
        return null;
    }
    public function getSymbol($code)  {
        $v = Currencies::getRecord($code);
        if ($v != null){
            if (!empty($v["ASCII"])) {
                return (string) $v["ASCII"];
            }
            return (string) $v["symbol"];
        }
        return $code;
    }
    public function getName($code)  {
        $v = Currencies::getRecord($code);
        if ($v != null) 
            return $v["name"];
        else
            return $codel;
    }
}
