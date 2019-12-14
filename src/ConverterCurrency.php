<?php

namespace CConverter;

class ConverterCurrency
{
	/**
	 * country code and currency code contains gold, silver and bitcoin currency
	 *
         * @var array
         */
	protected static $countrys = array(
        'AED' => 'AE',
		'AFN' => 'AF',
		'ALL' => 'AL',
		'AMD' => 'AM',
		'ANG' => 'AN',
		'AOA' => 'AO',
		'ARS' => 'AR',
		'AUD' => 'AU',
		'AWG' => 'AW',
		'AZN' => 'AZ',
		'BAM' => 'BA',
		'BBD' => 'BB',
		'BDT' => 'BD',
		'BGN' => 'BG',
		'BHD' => 'BH',
		'BIF' => 'BI',
		'BMD' => 'BM',
		'BND' => 'BN',
		'BOB' => 'BO',
		'BRL' => 'BR',
		'BSD' => 'BS',
		'BTC' => 'BTC',
		'BTN' => 'BT',
		'BWP' => 'BW',
		'BYN' => 'BY',
		'BYR' => 'BY',
		'BZD' => 'BZ',
		'CAD' => 'CA',
		'CDF' => 'CD',
		'CHF' => 'LI',
		'CLF' => 'CL',
		'CLP' => 'CL',
		'CNY' => 'CN',
		'COP' => 'CO',
		'CRC' => 'CR',
		'CUC' => 'CU',
		'CUP' => 'CU',
		'CVE' => 'CV',
		'CZK' => 'CZ',
		'DJF' => 'DJ',
		'DKK' => 'DK',
		'DOP' => 'DO',
		'DZD' => 'DZ',
		'EGP' => 'EG',
		'ERN' => 'ER',
		'ETB' => 'ET',
		'EUR' => 'AD',
		'FJD' => 'FJ',
		'FKP' => 'FK',
		'GBP' => 'IO',
		'GEL' => 'GE',
		'GGP' => 'GG',
		'GHS' => 'GH',
		'GIP' => 'GI',
		'GMD' => 'GM',
		'GNF' => 'GN',
		'GTQ' => 'GT',
		'GYD' => 'GY',
		'HKD' => 'HK',
		'HNL' => 'HN',
		'HRK' => 'HR',
		'HTG' => 'HT',
		'HUF' => 'HU',
		'IDR' => 'ID',
		'ILS' => 'IL',
		'IMP' => 'IM',
		'INR' => 'IN',
		'IQD' => 'IQ',
		'IRR' => 'IR',
		'ISK' => 'IS',
		'JEP' => 'JE',
		'JMD' => 'JM',
		'JOD' => 'JO',
		'JPY' => 'JP',
		'KES' => 'KE',
		'KGS' => 'KG',
		'KHR' => 'KH',
		'KMF' => 'KM',
		'KPW' => 'KP',
		'KRW' => 'KR',
		'KWD' => 'KW',
		'KYD' => 'KY',
		'KZT' => 'KZ',
		'LAK' => 'LA',
		'LBP' => 'LB',
		'LKR' => 'LK',
		'LRD' => 'LR',
		'LSL' => 'LS',
		'LTL' => 'LT',
		'LVL' => 'LV',
		'LYD' => 'LY',
		'MAD' => 'MA',
		'MDL' => 'MD',
		'MGA' => 'MG',
		'MKD' => 'MK',
		'MMK' => 'MM',
		'MNT' => 'MN',
		'MOP' => 'MO',
		'MRO' => 'MR',
		'MUR' => 'MU',
		'MVR' => 'MV',
		'MWK' => 'MW',
		'MXN' => 'MX',
		'MYR' => 'MY',
		'MZN' => 'MZ',
		'NAD' => 'NA',
		'NGN' => 'NG',
		'NIO' => 'NI',
		'NOK' => 'AQ',
		'NPR' => 'NP',
		'NZD' => 'CK',
		'OMR' => 'OM',
		'PAB' => 'PA',
		'PEN' => 'PE',
		'PGK' => 'PG',
		'PHP' => 'PH',
		'PKR' => 'PK',
		'PLN' => 'PL',
		'PYG' => 'PY',
		'QAR' => 'QA',
		'RON' => 'RO',
		'RSD' => 'RS',
		'RUB' => 'RU',
		'RWF' => 'RW',
		'SAR' => 'SA',
		'SBD' => 'SB',
		'SCR' => 'SC',
		'SDG' => 'SD',
		'SEK' => 'SE',
		'SGD' => 'SG',
		'SHP' => 'SH',
		'SLL' => 'SL',
		'SOS' => 'SO',
		'SRD' => 'SR',
		'STD' => 'ST',
		'SVC' => 'SV',
		'SYP' => 'SY',
		'SZL' => 'SZ',
		'THB' => 'TH',
		'TJS' => 'TJ',
		'TMT' => 'TM',
		'TND' => 'TN',
		'TOP' => 'TO',
		'TRY' => 'TR',
		'TTD' => 'TT',
		'TWD' => 'TW',
		'TZS' => 'TZ',
		'UAH' => 'UA',
		'UGX' => 'UG',
		'USD' => 'AS',
		'UYU' => 'UY',
		'UZS' => 'UZ',
		'VEF' => 'VE',
		'VND' => 'VN',
		'VUV' => 'VU',
		'WST' => 'WS',
		'XAF' => 'BJ',
		'XAG' => 'XAG',
		'XAU' => 'XAU',
		'XCD' => 'AI',
		'XDR' => 'TB',
		'XOF' => 'NE',
		'XPF' => 'PF',
		'YER' => 'YE',
		'ZAR' => 'ZA',
		'ZMK' => 'ZM',
		'ZMW' => 'ZM',
		'ZWL' => 'ZW'
    );
	
	/**
	 * check currency code and transform country code to currency code
         *
	 * @param  string             $data
         * @return string|array|bool
         */
	public static function getCurrency($data)
	{
		$base = array_flip(self::$countrys);
		if(strlen($data)==2){
			if(array_key_exists($data, $base)) {
				foreach($base as $key => $value){
					if($key==$data) $output = $value;
				}
				if(empty($output)) $output = false;
			}else{
				$output = false;
			}
		}else if(strlen($data)==3){
			foreach($base as $key => $value){
				if($value==$data) $output = $value;
			}
			if(empty($output)) $output = false;
		}else{
			$output = false;
		}
		return $output;
	}
}
